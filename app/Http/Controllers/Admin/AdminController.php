<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusCategory;
use App\Models\Destination;
use App\Models\Bus;
use App\Models\Schedule;
use App\Models\TicketPrice;
use App\Models\Booking;
use App\Models\Seat;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function buses()
    {
        $buses = Bus::with(['category', 'destination', 'schedules', 'ticketPrice'])
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = BusCategory::all();
        $destinations = Destination::all();

        return view('admin.buses.index', compact('buses', 'categories', 'destinations'));
    }

    public function createFullBusEntry()
    {
        $categories = BusCategory::all();
        $destinations = Destination::all();
        $buses = Bus::all(); // For dropdown of existing buses

        return view('admin.buses.create', compact('categories', 'destinations', 'buses'));
    }

   
public function storeFullBusEntry(Request $request)
{
    $request->validate([
        'existing_bus_id' => 'nullable|exists:buses,id',
        'bus_name' => 'required_without:existing_bus_id|string',
        'bus_number' => 'required|string',
        'driver_phone' => 'required|string',
        'bus_category_id' => 'required|exists:bus_categories,id',

        'destination_id' => 'nullable|exists:destinations,id',
        'from' => 'required_without:destination_id|string',
        'to' => 'required_without:destination_id|string',

        'date' => 'required|date',
        'departure_time' => 'required',
        'arrival_time' => 'required',
        'return_departure_time' => 'required',
        'return_arrival_time' => 'required',

        'price' => 'required|numeric',
        'vat_percentage' => 'required|numeric|min:0|max:100',
    ]);

    // Handle destination
    if ($request->destination_id) {
        $mainDest = Destination::findOrFail($request->destination_id);
    } else {
        $mainDest = Destination::firstOrCreate([
            'from' => $request->from,
            'to' => $request->to
        ]);
    }

    $returnDest = Destination::firstOrCreate([
        'from' => $mainDest->to,
        'to' => $mainDest->from
    ]);

    // Handle bus creation
    if ($request->existing_bus_id) {
        $mainBus = Bus::findOrFail($request->existing_bus_id);
    } else {
        $mainBus = Bus::firstOrCreate(
            ['bus_number' => $request->bus_number, 'destination_id' => $mainDest->id],
            [
                'bus_name' => $request->bus_name,
                'bus_category_id' => $request->bus_category_id,
                'driver_phone' => $request->driver_phone,
            ]
        );
    }

    // Create return bus (always new)
    $returnBus = Bus::firstOrCreate(
        ['bus_number' => $request->bus_number . '-RT', 'destination_id' => $returnDest->id],
        [
            'bus_name' => $mainBus->bus_name . ' Return',
            'bus_category_id' => $request->bus_category_id,
            'driver_phone' => $request->driver_phone,
        ]
    );

    // Create seats if not exist
    if ($mainBus->seats()->count() == 0) $mainBus->generateSeats();
    if ($returnBus->seats()->count() == 0) $returnBus->generateSeats();

    // Create schedules
    for ($i = 0; $i < 7; $i++) {
        $date = Carbon::parse($request->date)->addDays($i);

        Schedule::firstOrCreate([
            'bus_id' => $mainBus->id,
            'date' => $date,
        ], [
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
        ]);

        Schedule::firstOrCreate([
            'bus_id' => $returnBus->id,
            'date' => $date,
        ], [
            'departure_time' => $request->return_departure_time,
            'arrival_time' => $request->return_arrival_time,
        ]);
    }

    // Ticket price with VAT
    $basePrice = $request->price;
    $vat = $request->vat_percentage;
    $totalPrice = $basePrice + ($basePrice * $vat / 100);

    TicketPrice::updateOrCreate([
        'bus_id' => $mainBus->id,
        'destination_id' => $mainDest->id,
    ], [
        'price' => $basePrice,
        'vat_percentage' => $vat,
        'total_price' => $totalPrice,
    ]);

    TicketPrice::updateOrCreate([
        'bus_id' => $returnBus->id,
        'destination_id' => $returnDest->id,
    ], [
        'price' => $basePrice,
        'vat_percentage' => $vat,
        'total_price' => $totalPrice,
    ]);

    return redirect()->route('admin.buses')->with('success', 'Bus and round trip created successfully!');
}


    public function editBus($id)
    {
        $bus = Bus::with(['category', 'destination', 'ticketPrice', 'schedules'])->findOrFail($id);
        $categories = BusCategory::all();
        $destinations = Destination::all();
        return view('admin.buses.edit', compact('bus', 'categories', 'destinations'));
    }

    public function updateBus(Request $request, $id)
    {
        $request->validate([
            'bus_name' => 'required|string',
            'bus_number' => 'required|string',
            'driver_phone' => 'required|string',
            'bus_category_id' => 'required|exists:bus_categories,id',
            'destination_id' => 'required|exists:destinations,id',
            'price' => 'required|numeric'
        ]);

        $bus = Bus::findOrFail($id);

        $bus->update([
            'bus_name' => $request->bus_name,
            'bus_number' => $request->bus_number,
            'driver_phone' => $request->driver_phone,
            'bus_category_id' => $request->bus_category_id,
            'destination_id' => $request->destination_id,
        ]);

        if ($bus->ticketPrice) {
            $bus->ticketPrice->update(['price' => $request->price]);
        } else {
            TicketPrice::create([
                'bus_id' => $bus->id,
                'destination_id' => $request->destination_id,
                'price' => $request->price
            ]);
        }

        return redirect()->route('admin.buses')->with('success', 'Bus updated successfully!');
    }

    public function deleteBus($id)
    {
        $bus = Bus::findOrFail($id);

        foreach ($bus->schedules as $schedule) {
            $schedule->bookings()->delete();
            $schedule->delete();
        }

        $bus->ticketPrice()->delete();
        $bus->delete();

        return back()->with('success', 'Bus deleted successfully.');
    }

    public function bookings()
    {
        $bookings = Booking::with('schedule.bus')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function createBooking()
    {
        $schedules = Schedule::with('bus')->get();
        return view('admin.bookings.create', compact('schedules'));
    }
    public function getSeats($scheduleId)
    {
        $schedule = Schedule::with('bus.seats')->findOrFail($scheduleId);
    
        if (!$schedule->bus || $schedule->bus->seats->isEmpty()) {
            return response()->json(['error' => 'No seats found'], 404);
        }
    
        return response()->json($schedule->bus->seats);
    }

    public function storeBooking(Request $request)
{
    $request->validate([
        'schedule_id' => 'required|exists:schedules,id',
        'user_name' => 'required|string|max:255',
        'user_phone' => 'required|string|max:15',
        'seat_number' => 'required|integer|min:1'
    ]);

    $schedule = Schedule::with('bus')->findOrFail($request->schedule_id);

    $seat = Seat::where('bus_id', $schedule->bus_id)
    ->where('seat_number', $request->seat_number)
    ->first();

    if (!$seat || $seat->status !== 'empty') {
        return back()->withErrors(['seat_number' => 'This seat is already booked or invalid.']);
    }

    Booking::create([
        'schedule_id' => $schedule->id,
        'user_name' => $request->user_name,
        'user_phone' => $request->user_phone,
        'seat_number' => $request->seat_number,
    ]);

    $seat->update(['status' => 'full']);

    return redirect()->route('admin.bookings')->with('success', 'Booking successful!');
}
    // public function getSeats($scheduleId)
    // {
    //     $schedule = Schedule::with('bus.seats')->findOrFail($scheduleId);
    //     return response()->json($schedule->bus->seats);
    // }

    public function confirmPayment($id)
    {
        Booking::findOrFail($id)->update(['payment_status' => 'confirmed']);
        return back()->with('success', 'Payment Confirmed');
    }

    public function showSeats($busId)
    {
        $bus = Bus::with('seats')->findOrFail($busId);
        return view('admin.seats.show', compact('bus'));
    }
}

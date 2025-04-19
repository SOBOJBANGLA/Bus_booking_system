<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\BusCategory;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function showSearchForm()
    {
        $categories = BusCategory::all();
        return view('front.search_form', compact('categories'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'date' => 'required|date',
            'category' => 'nullable|exists:bus_categories,id',
        ]);

        $destinations = Destination::where('from', 'like', "%{$request->from}%")
            ->where('to', 'like', "%{$request->to}%")
            ->pluck('id');

        $buses = Bus::whereIn('destination_id', $destinations)
            ->when($request->category, fn($q) => $q->where('bus_category_id', $request->category))
            ->with(['category', 'destination'])
            ->get();

        return view('front.search_results', compact('buses', 'request'));
    }

    public function showSchedule($bus_id, $date)
    {
        $schedules = Schedule::where('bus_id', $bus_id)
            ->whereDate('date', $date)
            ->with('bus')
            ->get();

        return view('front.schedules', compact('schedules', 'date'));
    }

    public function bookingForm($schedule_id)
    {
        $schedule = Schedule::with('bus.category')->findOrFail($schedule_id);
        $price = $schedule->bus->ticketPrice->price ?? 0;

        return view('front.booking_form', compact('schedule', 'price'));
    }

    public function storeBooking(Request $request, $schedule_id)
    {
        $request->validate([
            'user_name' => 'required|string',
            'user_phone' => 'required|string',
            'seat_number' => 'required|integer',
        ]);

        Booking::create([
            'schedule_id' => $schedule_id,
            'user_name' => $request->user_name,
            'user_phone' => $request->user_phone,
            'seat_number' => $request->seat_number,
            'payment_status' => 'pending',
        ]);

        return redirect()->route('front.confirmation')->with('success', 'Booking submitted. Payment will be confirmed manually.');
    }
}

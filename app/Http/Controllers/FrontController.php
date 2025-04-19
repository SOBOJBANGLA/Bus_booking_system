<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request){
       
        return view('front.home');
    }

    public function about(Request $request){
       
        return view('front.about');
    }

    public function blog(Request $request){
       
        return view('front.blog');
    }

    public function travel(Request $request){
       
        return view('front.travel');
    }

    public function redirectToBooking(Request $request)
    {
        $request->validate([
            'category' => 'required|in:bus,plane,train',
            'from'     => 'required|string',
            'to'       => 'required|string',
            'date'     => 'required|date',
        ]);

        // Store values temporarily in session
        session([
            'search.category' => $request->category,
            'search.from'     => $request->from,
            'search.to'       => $request->to,
            'search.date'     => $request->date,
        ]);

        return redirect()->route('booking.form', $request->category);
    }

    public function showBookingForm($category)
    {
        if (!in_array($category, ['bus', 'plane', 'train'])) {
            abort(404);
        }

        $data = session('search');
        return view('front.booking', compact('category', 'data'));
    }

    public function storeBooking(Request $request, $category)
    {
        $request->validate([
            'user_name'  => 'required|string',
            'user_phone' => 'required|string',
        ]);

        Booking::create([
            'category'    => $category,
            'from'        => session('search.from'),
            'to'          => session('search.to'),
            'date'        => session('search.date'),
            'user_name'   => $request->user_name,
            'user_phone'  => $request->user_phone,
        ]);

        return redirect()->route('home')->with('success', 'Booking completed successfully.');
    }


}

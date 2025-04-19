@extends('front.layouts.app')

@section('title','Home Page')

@section('content')
<section >
    <div class="banner-main">
        <img src="{{ asset('images/banner.jpg') }}" alt="#">
       <div class="container">
          <div class="text-bg">
             <h1>America<br><strong class="white">Amazing Tour</strong></h1>
             <div class="button_section"> <a class="main_bt" href="#">Read More</a>  </div>
             <h2>{{ ucfirst($category) }} Booking</h2>
             <div class="container">
             
                <form action="{{ route('booking.store', $category) }}" method="POST" class="main-form">
                    @csrf
                   <h3>Find Your Tour</h3>
                   <p>From: {{ $data['from'] }}</p>
                   <p>To: {{ $data['to'] }}</p>
                   <p>Date: {{ $data['date'] }}</p>
                   <div class="row">
                      <div class="col-md-9">
                         <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                               <label >Name:</label>
                               <input class="form-control" placeholder="" type="text" name="user_name">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <label >Phone:</label>
                                <input class="form-control" placeholder="" type="text" name="user_phone">
                             </div>
                             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <label ></label>
                                <button type="submit" class="btn btn-warning">Confirm Booking</button>
                              </div>
                         </div>
                      </div>
                      
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </section>

@endsection

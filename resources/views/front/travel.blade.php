@extends('front.layouts.app')

@section('title','Home Page')

@section('content')
  <!-- traveling -->
  <div id="travel" class="traveling">
   <div class="container">
      <div class="row">
         <div class="col-md-12 ">
            <div class="titlepage">
               <h2>Select Offers For Traveling</h2>
               <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span> 
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
               <i><img src="icon/travel-icon.png" alt="icon"/></i>
               <h3>Different Countrys</h3>
               <p> going to use a passage of Lorem Ipsum, you need to be </p>
               <div class="read-more">
                  <a  href="#">Read More</a>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
               <i><img src="icon/travel-icon2.png" alt="icon"/></i>
               <h3>Mountains Tours</h3>
               <p> going to use a passage of Lorem Ipsum, you need to be </p>
               <div class="read-more">
                  <a  href="#">Read More</a>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
               <i><img src="icon/travel-icon3.png" alt="icon"/></i>
               <h3>Bus Tours</h3>
               <p> going to use a passage of Lorem Ipsum, you need to be </p>
               <div class="read-more">
                  <a  href="#">Read More</a>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
               <i><img src="icon/travel-icon4.png" alt="icon"/></i>
               <h3>Summer Rest</h3>
               <p> going to use a passage of Lorem Ipsum, you need to be </p>
               <div class="read-more">
                  <a  href="#">Read More</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end traveling -->
@endsection

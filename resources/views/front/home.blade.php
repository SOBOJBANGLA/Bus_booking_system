@extends('front.layouts.app')

@section('title','Home Page')

@section('content')
<br><br>
      <div>
         <form action="{{ route('search') }}" method="POST" class="main-form">
            @csrf
            <h3>Find Your Tour</h3>
            <div class="row">
               <div class="col-md-9">
                  <div class="row">
                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <label >Category</label>
                        <select class="form-control" name="category">
                           <option>Any</option>
                           <option value="bus">Bus</option>
                           <option value="plane">Plane</option>
                           <option value="train">Train</option>
                        </select>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <label >From:</label>
                        <input class="form-control" placeholder="From" type="text" name="from">
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <label >To:</label>
                        <input class="form-control" placeholder="To" type="text" name="to">
                     </div>
                    
                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <label >Date</label>
                        <input class="form-control" placeholder="Any" type="date" name="date">
                     </div>
                    
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                  <button type="submit" class="btn btn-warning">Search</button>
               </div>
            </div>
         </form>

         @if(session('success'))
          <p>{{ session('success') }}</p>
         @endif
      </div>
      
      
      <!--London -->
      <div class="London">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Weekend in New York, London</h2>
                     <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span> 
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="London-img">
               <figure><img src="images/London.jpg" alt="img"/></figure>
            </div>
         </div>
      </div>
      <!-- end London -->
      <!--Tours -->
      <div class="Tours">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>The Best Tours</h2>
                     <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span> 
                  </div>
               </div>
            </div>
            <section id="demos">
               <div class="row">
                  <div class="col-md-12">
                     <div class="owl-carousel owl-theme">
                        <div class="item">
                           <img class="img-responsive" src="images/1.jpg" alt="#" />
                           <h3>Holiday Tour</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                        <div class="item">
                           <img class="img-responsive" src="images/2.jpg" alt="#" />
                           <h3>New York</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                        <div class="item">
                           <img class="img-responsive" src="images/3.jpg" alt="#" />
                           <h3>London</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                        <div class="item">
                           <img class="img-responsive" src="images/2.jpg" alt="#" />
                           <h3>Holiday Tour</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <!-- end Tours -->
      <!-- Amazing -->
      <div class="amazing">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="amazing-box">
                     <h2>Amazing London Tour</h2>
                     <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</span>
                     <a href="#">Book Now</a><a href="#">Get More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end Amazing -->
@endsection

@extends('front.layouts.app')

@section('title','Home Page')

@section('content')
 <!-- our blog -->
 <div id="blog" class="blog">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Blog</h2>
               <span>Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span> 
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="blog-box">
               <figure><img src="images/blog-image0.jpg" alt="#"/>
                  <span>4 Feb 2019</span>
               </figure>
               <div class="travel">
                  <span>Post  By :  Travel  Agency</span> 
                  <p><strong class="Comment"> 06 </strong>  Comment</p>
                  <p><strong class="like">05 </strong>Like</p>
               </div>
               <h3>London Amazing Tour</h3>
               <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web</p>
            </div>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="blog-box">
               <figure><img src="images/blog-image.jpg" alt="#"/>
                  <span>10 Feb 2019</span>
               </figure>
               <div class="travel">
                  <span>Post  By :  Travel  Agency</span> 
                  <p><strong class="Comment"> 06 </strong>  Comment</p>
                  <p><strong class="like">05 </strong>Like</p>
               </div>
               <h3>London Amazing Tour</h3>
               <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web</p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end our blog -->
@endsection

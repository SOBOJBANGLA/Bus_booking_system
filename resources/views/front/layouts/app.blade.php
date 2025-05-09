<!doctype html>
<html lang="en">
	<head>
        <!-- basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>Eforlad travel</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <!-- fevicon -->
        <link rel="icon" href="images/fevicon.png" type="image/gif" />
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
     </head>

	 <body class="main-layout">
      
        <div class="loader_bg">
            <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
           
         </div>

         @include('front.layouts.header')

         @yield('content')

         @include('front.layouts.footer')

         <script src="{{ asset('js/jquery.min.js') }}"></script>
         <script src="{{ asset('js/popper.min.js') }}"></script>
         <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
         <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
         <script src="{{ asset('js/plugin.js') }}"></script>
         <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
         <script src="{{ asset('js/custom.js') }}"></script>
         <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script>
           $(document).ready(function() {
             var owl = $('.owl-carousel');
             owl.owlCarousel({
               margin: 10,
               nav: true,
               loop: true,
               responsive: {
                 0: {
                   items: 1
                 },
                 600: {
                   items: 2
                 },
                 1000: {
                   items: 3
                 }
               }
             })
           })
        </script>
       
     </body>
</html>
<!DOCTYPE HTML>
<html>
  <head>
    <title>@yield('judultitle') | RuangBaca</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('template/assets/css/main.css')}}">
    <link rel="icon" href="{{asset('template/images/shita.png')}}" type="image/png">
    <link href="{{asset('template/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  
  <body style="background-color: white">
    @include('user.layouts.navbar')
    @include('user.layouts.menu')
    @include('user.layouts.banner')
    @include('user.layouts.konten')
    @include('user.layouts.footer')
  </body>
</html> 


      
      
      
      
      
      
      
      
      

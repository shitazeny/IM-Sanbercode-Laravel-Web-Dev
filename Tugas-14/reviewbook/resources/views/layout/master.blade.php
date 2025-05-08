<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Company Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="{{asset('template/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('template/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{asset('template/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="{{asset('template/assets/css/main.css')}}" rel="stylesheet">

  </head>

  <body class="index-page">
    @include('partials.header')

    <main class="main">
      @include('partials.banner')
      @include('partials.konten')
      @include('partials.card') 
    </main>

    @include('partials.footer')
  </body>
</html>
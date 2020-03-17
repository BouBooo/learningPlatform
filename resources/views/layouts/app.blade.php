<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/elegant-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/907683f3ba.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Learning</title>
  </head>
  <body>
    <div class="main">
      @include('incs.loader')
      @include('incs.header')
      @yield('content')
    </div>

  
    <!-- Popper js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Active js -->
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/main.js"></script>  <!-- jQuery-2.2.4 js -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
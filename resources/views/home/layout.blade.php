<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- core:css -->
    <link rel="stylesheet" href="{{URL::to('users/assets/vendors/core/core.css')}}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{URL::to('users/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{URL::to('users/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('users/assets/css/style.min.css')}}">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="">
      @include('home.partials.header')
      @include('home.partials.slider')
      @yield('page')
      @include('home.partials.footer')
    </div>

    <!-- core:js -->
    <script src="{{ URL::to('users/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <script src="{{ URL::to('users/assets/js/script.js') }}"></script>
  </body>
</html>
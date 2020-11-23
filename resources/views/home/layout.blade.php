<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $PageConfig['config']->Title ?? "Branding Mockups"}}</title>
    <link rel="shortcut icon" href="{{URL::to('users/assets/images/logo.svg')}}" />

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

      @if(isset($PageConfig['self']->slider_id) && !empty($PageConfig['self']->slider_id))
        @include('home.partials.slider')
      @else
        @include('home.partials.banner')
      @endif

      @yield('content')

      @include('home.partials.footer')
    </div>

    <!-- core:js -->
    <script src="{{ URL::to('users/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <script src="{{ URL::to('users/assets/js/script.js') }}"></script>
  </body>
</html>
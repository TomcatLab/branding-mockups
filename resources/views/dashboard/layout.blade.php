<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Branding Mockups</title>
    <link rel="shortcut icon" href="{{URL::to('dashboard/assets/images/favicon.png')}}" />
    <!-- core:css -->
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/vendors/core/core.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->  
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/css/demo_1/style.css')}}">
    <!-- End layout styles -->
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/vendors/simplemde/simplemde.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/vendors/grapesjs/dist/css/grapes.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('dashboard/assets/vendors/jstree/dist/themes/default/style.min.css')}}" />
    
</head>
<body>
    <div class="main-wrapper">
        @if(isset($FullPage) && $FullPage)
        <div class="page-wrapper full-page">
            @yield('page')
        </div>
        @else
            @include('dashboard.partials.sidebar')
            <div class="page-wrapper">
                @include('dashboard.partials.navbar')

                <div class="page-content">
                    @yield('page')
                </div>

                @include('dashboard.partials.footer')
            </div>
        @endif
    </div>

    <!-- core:js -->
    <script src="{{URL::to('dashboard/assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{URL::to('dashboard/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <!-- end plugin js for this page -->
    <script src="{{URL::to('dashboard/assets/vendors/grapesjs/dist/grapes.min.js')}}"></script>
    <!-- inject:js -->
    <script src="{{URL::to('dashboard/assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{URL::to('dashboard/assets/js/dashboard.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/js/datepicker.js')}}"></script>
    <!-- end custom js for this page -->
    <script src="{{URL::to('dashboard/assets/vendors/jstree/dist/jstree.min.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/vendors/simplemde/simplemde.min.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/js/file-upload.js')}}"></script>
    <script src="{{URL::to('dashboard/assets/js/custome.js')}}"></script>
</body>
</html>
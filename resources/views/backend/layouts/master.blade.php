<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Admin Panel | Dentalax </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="">
    <meta name="description"
        content="">
    <meta name="keywords"
        content="" />
    <link rel="canonical" href="">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('backend/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('backend/assets/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset('backend/assets/img/favicon/safari-pinned-tab.svg')}}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="{{ asset('backend/assets/vendor/notyf/notyf.min.css')}}" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('backend/assets/css/volt.css" rel="stylesheet')}}">
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
</head>

<body>
    @include('backend.layouts.sidebar')
    <main class="content">
        @include('backend.layouts.top_nav')
        @yield('content')
        @include('backend.layouts.footer')
    </main>
    <!-- Core -->
    <script src="{{ asset('backend/assets/vendor/@popperjs/core/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('backend/assets/vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>
    <!-- Slider -->
    <script src="{{ asset('backend/assets/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
    <!-- Smooth scroll -->
    <script src="{{ asset('backend/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <!-- Charts -->
    <script src="{{ asset('backend/assets/vendor/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('backend/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>
    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('backend/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <!-- Vanilla JS Datepicker -->
    <script src="{{ asset('backend/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>
    <!-- Notyf -->
    <script src="{{ asset('backend/assets/vendor/notyf/notyf.min.js')}}"></script>
    <!-- Simplebar -->
    <script src="{{ asset('backend/assets/vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
    <!-- Volt JS -->
    <script src="{{ asset('backend/assets/assets/js/volt.js')}}"></script>
</body>

</html>

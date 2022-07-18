<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('mobile') }}/img/core-img/favicon.ico">
    <link rel="apple-touch-icon" href="{{ asset('mobile') }}/img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('mobile') }}/img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('mobile') }}/img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('mobile') }}/img/icons/icon-180x180.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('mobile') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('mobile') }}/css/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('mobile') }}/css/tiny-slider.css">
    <link rel="stylesheet" href="{{ asset('mobile') }}/css/baguetteBox.min.css">
    <link rel="stylesheet" href="{{ asset('mobile') }}/css/rangeslider.css">
    <link rel="stylesheet" href="{{ asset('mobile') }}/css/vanilla-dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('mobile') }}/css/apexcharts.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('mobile') }}/style.css">
    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body>
    @inertia
    <script src="{{ asset('mobile') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('mobile') }}/js/slideToggle.min.js"></script>
    <script src="{{ asset('mobile') }}/js/internet-status.js"></script>
    <script src="{{ asset('mobile') }}/js/tiny-slider.js"></script>
    <script src="{{ asset('mobile') }}/js/baguetteBox.min.js"></script>
    <script src="{{ asset('mobile') }}/js/countdown.js"></script>
    <script src="{{ asset('mobile') }}/js/rangeslider.min.js"></script>
    <script src="{{ asset('mobile') }}/js/vanilla-dataTables.min.js"></script>
    <script src="{{ asset('mobile') }}/js/index.js"></script>
    <script src="{{ asset('mobile') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('mobile') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('mobile') }}/js/dark-rtl.js"></script>
    <script src="{{ asset('mobile') }}/js/active.js"></script>
</body>

</html>

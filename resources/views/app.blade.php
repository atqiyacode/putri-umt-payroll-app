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
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" /> --}}
    <link rel="shortcut icon" href="{{ asset('/') }}assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('/assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-stylesheet" />
    <link href="{{ asset('/assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body>
    @inertia
    <!-- Vendor js -->
    <script src="{{ asset('/assets') }}/js/vendor.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('/assets') }}/js/app.min.js"></script>

</body>

</html>

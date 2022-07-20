<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('/assets') }}/src/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('/assets') }}/src/css/style.css">
    <link rel="stylesheet" href="{{ asset('/assets') }}/src/css/skin_color.css">
    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body class="hold-transition theme-primary ">
    @inertia

    <script src="{{ asset('/assets') }}/src/js/vendors.min.js"></script>
    <script src="{{ asset('/assets') }}/src/js/pages/chat-popup.js"></script>
    <script src="{{ asset('/assets') }}/icons/feather-icons/feather.min.js"></script>

</body>

</html>

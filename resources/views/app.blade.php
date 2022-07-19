<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets') }}/images/favicon.png" />
    <link href="{{ asset('/assets') }}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body>
    @inertia


    <script src="{{ asset('/assets') }}/vendor/global/global.min.js"></script>
    {{-- <script src="{{ asset('/assets') }}/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('/assets') }}/js/custom.min.js"></script>
    <script src="{{ asset('/assets') }}/js/deznav-init.js"></script>
    <script src="{{ asset('/assets') }}/js/demo.js"></script>
    <script src="{{ asset('/assets') }}/js/styleSwitcher.js"></script>
    <script src="{{ asset('/assets') }}/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });
    </script> --}}

</body>

</html>

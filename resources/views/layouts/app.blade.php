<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Krusty Bread - @yield("title")</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" />
</head>

<body>
    <!-- container-scroller -->
    <div class="container-scroller">
        <!-- container-fluid -->
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <!-- content -->
            @yield('content')
            <!-- content -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- container-scroller -->

    <!-- Scripts -->
    <script src="{{ asset('dashboard/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/template.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/settings.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/todolist.js') }}"></script>
</body>

</html>
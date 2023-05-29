<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
        @stack('style')
    </head>
<body>
    @include('layout.navbar')
    @yield('content')
    @yield('modal')
    @stack('script')
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
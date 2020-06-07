<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'PMS') }}</title>

        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-reboot.min.css') }}">
    </head>
    <body>
        <div id="contents" class="container">
            <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="{{ route('contents') }}">Performance Monitoring System (PMS)</a>
            </nav>

            <div class="main-contents">
                @yield('main-contents')
            </div>
        </div>

        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('webtitle')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    @include('auth.layouts.header')
        @yield('content')
    @include('auth.layouts.footer')
</body>
</html>
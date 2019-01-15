<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>App Name - @yield('title')</title>
    @yield('style')
</head>
<body>

<div class="container">
    @yield('content')
</div>

@yield('script')
</body>
</html>
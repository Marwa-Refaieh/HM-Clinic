<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('demo.demo-layouts.head')
</head>

<body>
    @yield('content')
    @include('demo.demo-layouts.footer')
    @include('demo.demo-layouts.scripts')
</body>

</html>

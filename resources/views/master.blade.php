<!doctype html>
<html lang="en">
@include('include.style')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @include('include.navbar')
    @yield('content')
    @include('include.script')
</body>

</html>

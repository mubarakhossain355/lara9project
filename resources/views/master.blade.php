<!doctype html>
<html lang="en">
@include('include.style')


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>

<body>
    @include('include.navbar')
    <div class="container">
        @if (session('status'))
            <div class="bg-success text-white">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>
    @include('include.script')
</body>

</html>

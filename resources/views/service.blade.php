@extends('master')

@section('content')
    <h2>
        @for ($index = 0; $index < 4; $index++)
            {{ $services[$index] }}<br>
        @endfor
    </h2>
@endsection

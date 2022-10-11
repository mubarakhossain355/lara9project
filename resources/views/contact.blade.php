@extends('master')

@section('content')
    <h2>{{ $page_name }}</h2>
    {{-- @if ($product_count < 10)
        <p>Product is Reducing Please refill</p>
    @else
        <p>Product Count: {{ $product_count }}</p>
    @endif

    @switch($color)
        @case('black')
            <p>Black color is available</p>
        @break

        @case('green')
            <p>Green color is available</p>
        @break

        @case('red')
            <p>Red color is available</p>
        @break

        @default
            <p>Out of Stock</p>
    @endswitch --}}
    @forelse ($products as $key => $product)
        <ul>
            <li>{{ $key }}</li>
            <li>{{ $product['name'] }}</li>
            <li>{{ $product['color'] }}</li>
            <li>{{ $product['price'] }}</li>
        </ul>
    @empty
        <p>No products found</p>
    @endforelse
@endsection

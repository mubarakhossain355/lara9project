@extends('master')
@section('title', 'Category-Show')

@section('content')
    <div class="row">
        <div class="col-8 m-auto">
            <h2>{{ $category->name }}</h2>
            <p>{{ $category->created_at->format('d-m-Y H:i A') }}</p>
        </div>
    </div>

@endsection

@extends('master')
@section('title', 'Sub-Category-edit')

@section('content')
    <div class="row">
        <div class="col-8 m-auto">
            <h2>{{ $subcategory->name }}</h2>
            <h2>{{ $subcategory->category->name }}</h2>
            <p>{{ $subcategory->created_at->format('d-m-Y H:i A') }}</p>
        </div>
    </div>

@endsection

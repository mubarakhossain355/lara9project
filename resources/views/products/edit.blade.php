@extends('master')
@section('title', 'Edit Products')

@section('content')

    <div class="row">
        <div class="d-flex justify-content-end">
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-info"> Product Index</a>
        </div>
        <div class="col-8 m-auto">
            <div class="card">
                <h2 class="card-title p-3">Products Form</h2>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label"> Select Category Name</label>
                            <select class="form-select" name="category_id">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select Sub Category Name</label>
                            <select class="form-select" name="subcategory_id">
                                <option selected>Open this select menu</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                        @if ($subcategory->id == $product->subcategory_id) selected @endif>{{ $subcategory->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Name</label>
                            <input type="text" class="form-control"value="{{ $product->name }}" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}"
                                min="0">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Description</label>
                            <textarea name="description" id="" cols="30" rows="10" value="{{ $product->description }}"
                                class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update Products</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

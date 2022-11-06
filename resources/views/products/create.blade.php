@extends('master')
@section('title', 'Create Products')

@section('content')

    <div class="row">
        <div class="col-8 m-auto">
            <div class="card">
                <h2 class="card-title p-3">Products Form</h2>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label"> Select Category Name</label>
                            <select class="form-select" name="category_id">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select Sub Category Name</label>
                            <select class="form-select" name="subcategory_id">
                                <option selected>Open this select menu</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Price</label>
                            <input type="number" class="form-control" name="price" min="0">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Products Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add New Products</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

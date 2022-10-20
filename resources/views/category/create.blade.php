@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="category-name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category-name"
                            placeholder="Please provide Category Name">
                    </div>
                    <div class="mb-3">
                        <label for="slug-name" class="form-label">Slug Name</label>
                        <input type="text" class="form-control" name="category_slug" id="slug-name"
                            placeholder="Please provide Slug Name">
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Active/Inactive
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

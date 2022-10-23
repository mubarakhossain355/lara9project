@extends('master')
@section('title', 'Sub-Category-create')

@section('content')
    <div class="row">

        <div class="col-6 m-auto my-3">
            <div class="card p-4">
                <form action="{{ route('sub-category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                            <option selected>Open this select menu</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach


                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Sub Category Name</label>
                        <input type="text" name="subCategory_name"
                            class="form-control @error('subCategory_name')
                            is-invalid
                             @enderror">
                        @error('subCategory_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Active/Inactive
                        </label>

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                @if (session('status'))
                    <div class="bg-success text-white">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="category-name" class="form-label">Category Name</label>
                        <input type="text"
                            class="form-control 
                        @error('category_name')
                        is-invalid
                         @enderror"
                            name="category_name" id="category-name" placeholder="Please provide Category Name">
                        @error('category_name')
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
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

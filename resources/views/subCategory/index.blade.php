@extends('master')
@section('title', 'Sub-Category-list')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end my-4">
            <a href="{{ route('sub-category.create') }}" class="btn btn-sm btn-success">Create Sub Category</a>
        </div>
        <div class="col-8 m-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id No.</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Sub Category Name</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <th scope="row">{{ $subcategory->id }}</th>
                            <td>{{ $subcategory->category->name }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('sub-category.edit', $subcategory->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('sub-category.show', $subcategory->id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection

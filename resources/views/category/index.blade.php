@extends('master')
@section('title', 'Category-list')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end my-4">
            <a href="{{ route('category.create') }}" class="btn btn-sm btn-success">Create Category</a>
        </div>
        <div class="col-8 m-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id No.</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('category.show', $category->id) }}"
                                    class="btn btn-sm btn-primary">View</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection

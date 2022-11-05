@extends('master')
@section('title', 'Sub-Category-list')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end my-4">
            <a href="{{ route('sub-category.create') }}" class="btn btn-sm btn-success">Create Sub Category</a>
        </div>
        <h2 class="text-center py-5">Normal Data</h2>
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
                                <a href="{{ route('sub-category.edit', $subcategory->id) }}"
                                    class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('sub-category.show', $subcategory->id) }}"
                                    class="btn btn-sm btn-primary">View</a>
                                <form action="{{ route('sub-category.destroy', $subcategory->id) }}" method="POST">
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

    <div class="row">
        <h2 class="text-center py-5">Deleted data</h2>
        <div class="col-8 m-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id No.</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Sub Category Name</th>
                        <th scope="col">Created Date</th>deletedsubcategories
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deletedsubcategories as $subcategory)
                        <tr>
                            <th scope="row">{{ $subcategory->id }}</th>
                            <td>{{ $subcategory->category->name }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('sub-category.restore', $subcategory->id) }}"
                                    class="btn btn-sm btn-info">Restore</a>

                                <form action="{{ route('sub-category.forceDelete', $subcategory->id) }}" method="GET">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Force Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection

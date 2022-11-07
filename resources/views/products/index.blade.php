@extends('master')
@section('title', 'Products-list')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end my-4">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">Create Products</a>
        </div>

        <div class="col-8 m-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id No.</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Sub Category Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->subcategory->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>

                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn  btn-info p-2">Edit</a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn  btn-primary p-2">View</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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

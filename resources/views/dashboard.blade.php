@extends('layouts.dashboard_layout')
@section('dashboard_content')
    <style>
        td {
            width: 20%;
        }
    </style>
        @if (session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="table table-responsive" style="overflow-x: auto;">
            <table class="table table-hover mt-3 cart-table">
                <thead>
                    <tr class="head">
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="data">
                            <td class="close-img-cell">
                                <form action="/product/delete/{{ $product['id'] }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button style="border: none; background: none;" type="button" title="Remove product"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product['id'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $product['id'] }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $product['id'] }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $product['id'] }}">Delete Product</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure that you want to delete {{ $product['name'] }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <img class="products-img" src="{{ $product['image_1'] }}" alt="product">
                            </td>
                            <td class="product-title">{{ $product['name'] }}</td>
                            <td>${{ $product['price'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>
                                @php
                                    $description = substr($product['description'], 0, 50);
                                @endphp
                                {{ $description }}.. <a class="text-primary" href="plants/{{ $product['id'] }}">See More</a>
                            </td>
                            <td>{{ $product['rate'] }}</td>
                            <td>
                                <form action="/dashboard/update/{{$product['id']}}" method="post" style="display:inline;">
                                    @csrf
                                    @method("PUT")
                                    <button class="green-btn" type="button" title="edit product"
                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $product['id'] }}">
                                        Update
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $product['id'] }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $product['id'] }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel{{ $product['id'] }}">Edit Product</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{$product['name']}}" >
                                                    <label class="form-label">Product price</label>
                                                    <input type="number" name="price" class="form-control" value="{{$product['price']}}">
                                                    <label class="form-label">Product Description</label>
                                                    <textarea name="description"class="form-control" rows="4">{{$product['description']}}</textarea>
                                                    <label class="form-label">Image URL</label>
                                                    <input type="text" name="image_1" class="form-control" value="{{$product['image_1']}}">
                                                    <label class="form-label">Product Category</label>
                                                    <input type="text" name="category" class="form-control" value="{{$product['category']}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="/dashboard/add" method="post" style="display:inline;">
                @csrf
                <button class="green-btn" type="button" title="Add product"
                    data-bs-toggle="modal" data-bs-target="#addModal">
                    + Add new product
                </button>
                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1"
                    aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addModalLabel">Add Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control">
                                <label class="form-label">Product price</label>
                                <input type="number" name="price" class="form-control">
                                <label class="form-label">Product Description</label>
                                <textarea name="description"class="form-control"></textarea>
                                <label class="form-label">Image URL</label>
                                <input type="text" name="image_1" class="form-control">
                                <label class="form-label">Product Category</label>
                                <input type="text" name="category" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
@endsection

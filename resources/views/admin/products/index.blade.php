@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title">All Products</h3>
            <a href="/admin/products/create" class="btn btn-primary btn-sm ml-auto">Add Product</a>
        </div>
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->count())
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="/uploads/{{ $product->image }}" width="80" alt="{{ $product->name }}">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/products/edit/{{ $product->id }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="/admin/products/delete/{{ $product->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

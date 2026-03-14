@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/admin/products/store" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product-name">Name</label>
                    <input type="text" name="name" id="product-name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="product-category">Category</label>
                    <select name="category_id" id="product-category" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="product-subcategory">Subcategory</label>
                    <select name="subcategory_id" id="product-subcategory" class="form-control" required>
                        @foreach($subcategories as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="product-description">Description</label>
                    <textarea name="description" id="product-description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="product-price">Price</label>
                    <input type="number" name="price" id="product-price" class="form-control" value="{{ old('price') }}" required>
                </div>

                <div class="form-group">
                    <label for="product-image">Image</label>
                    <input type="file" name="image" id="product-image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/admin/products" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/categories">Categories</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/admin/categories/update/{{ $category->id }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category-name">Name</label>
                    <input type="text" name="name" id="category-name" class="form-control" value="{{ old('name', $category->name) }}" required>
                </div>

                <div class="form-group">
                    <label>Current Image</label>
                    <div>
                        @if($category->image)
                            <img src="/uploads/{{ $category->image }}" width="100" alt="{{ $category->name }}">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="category-image">Change Image</label>
                    <input type="file" name="image" id="category-image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/admin/categories" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

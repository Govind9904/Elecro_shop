@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Subcategory</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/subcategories">Subcategories</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/admin/subcategories/store">
                @csrf
                <div class="form-group">
                    <label for="subcategory-category">Category</label>
                    <select name="category_id" id="subcategory-category" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="subcategory-name">Subcategory Name</label>
                    <input type="text" name="name" id="subcategory-name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/admin/subcategories" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

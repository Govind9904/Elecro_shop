@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Subcategories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Subcategories</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title">All Subcategories</h3>
            <a href="/admin/subcategories/create" class="btn btn-primary btn-sm ml-auto">Add Subcategory</a>
        </div>
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($subcategories->count())
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                                <td>{{ $subcategory->name }}</td>
                                <td>
                                    <a href="/admin/subcategories/edit/{{ $subcategory->id }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="/admin/subcategories/delete/{{ $subcategory->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Delete this subcategory?')">Delete</a>
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

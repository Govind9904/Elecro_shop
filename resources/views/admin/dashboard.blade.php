@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Products</h5>
                    <p class="card-text">Create, update, and organize your product catalog.</p>
                    <a href="/admin/products" class="btn btn-primary btn-sm">Go to Products</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Orders</h5>
                    <p class="card-text">Review customer orders and update status.</p>
                    <a href="/admin/orders" class="btn btn-primary btn-sm">Go to Orders</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Site Settings</h5>
                    <p class="card-text">Update contact details and site information.</p>
                    <a href="/admin/settings" class="btn btn-primary btn-sm">Go to Settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

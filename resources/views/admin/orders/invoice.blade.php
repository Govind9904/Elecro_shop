@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Invoice</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/orders">Orders</a></li>
                    <li class="breadcrumb-item active">Invoice #{{ $order->id }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order Information</h3>
        </div>
        <div class="card-body">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Items</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price * $item->qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="mt-3">Total Amount: {{ $order->total }}</h4>

            <div class="mt-3">
                <a href="/admin/orders/invoice-download/{{ $order->id }}" class="btn btn-primary">Download PDF</a>
                <button type="button" class="btn btn-secondary" onclick="window.print()">Print Invoice</button>
                <a href="/admin/orders/{{ $order->id }}" class="btn btn-info">Back to Order</a>
            </div>
        </div>
    </div>
</div>
@endsection

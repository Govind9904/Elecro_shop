@extends('frontend.layouts.app')
@section('title','Checkout')
@section('content')

<section class="page-hero">
    <div class="container">
        <h2>Checkout</h2>
        <div class="breadcrumb-lite">Home / Checkout</div>
    </div>
</section>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="checkout-card">
                <div class="section-title text-start">
                    <span>Billing Details</span>
                    <h2 class="h4 mb-0">Complete Your Order</h2>
                </div>
                <form action="{{ url('checkout/place-order') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-brand mt-4">Place Order</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="order-summary">
                <h5 class="fw-bold mb-3">Your Order</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($cart))
                        @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td class="text-end">₹{{ number_format($item['price'],2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Shipping charge</td>
                            <td>-</td>
                            <td>₹0.00</td>
                        </tr>
                        <tr>
                            <td>Delivery Charge</td>
                            <td>-</td>
                            <td>₹0.00</td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="3" class="text-center text-muted">No order found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                @if(!empty($cart))
                <div class="summary-item fw-bold">
                    <span>Total</span>
                    <span>₹{{ number_format($total,2) }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
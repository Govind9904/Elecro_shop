@extends('frontend.layouts.app')
@section('title','Checkout')
@section('content')

<section class="page-hero reveal">
    <div class="container">
        <h2>Checkout</h2>
        <div class="breadcrumb-lite">Home / Checkout</div>
    </div>
</section>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="checkout-card reveal">
                <div class="section-title text-start">
                    <span>Billing Details</span>
                    <h2 class="h4 mb-0">Complete Your Order</h2>
                </div>
                <form action="{{ url('place-order') }}" method="POST" class="mt-4">
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
            <div class="order-summary reveal delay-2">
                <h5 class="fw-bold mb-3">Your Order</h5>
                <div class="summary-item">
                    <span>Subtotal</span>
                    <span>Calculated in cart</span>
                </div>
                <div class="summary-item">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                <div class="summary-item fw-bold">
                    <span>Total</span>
                    <span>At checkout</span>
                </div>
                <hr>
                <p class="text-muted mb-3">Secure payment with trusted gateways.</p>
                <button class="btn btn-outline-brand w-100" type="button">
                    <i class="fa-solid fa-lock me-2"></i> Secure Checkout
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
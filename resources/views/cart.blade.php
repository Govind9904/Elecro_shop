@extends('frontend.layouts.app')

@section('title','Cart')
@section('content')

<section class="page-hero reveal">
    <div class="container">
        <h2>Shopping Cart</h2>
        <div class="breadcrumb-lite">Home / Cart</div>
    </div>
</section>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="table-theme reveal">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $subtotal = 0; @endphp
                        @forelse(session('cart', []) as $id=>$item)
                        @php $lineTotal = $item['price'] * $item['quantity']; $subtotal += $lineTotal; @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>₹{{ number_format($item['price'],2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>₹{{ number_format($lineTotal,2) }}</td>
                            <td class="text-end">
                                <a href="/cart/remove/{{ $id }}" class="btn btn-outline-brand btn-sm">
                                    Remove
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Your cart is empty.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="order-summary reveal delay-2">
                <h5 class="fw-bold mb-3">Order Summary</h5>
                <div class="summary-item">
                    <span>Subtotal</span>
                    <span>₹{{ number_format($subtotal ?? 0,2) }}</span>
                </div>
                <div class="summary-item">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                <div class="summary-item fw-bold">
                    <span>Total</span>
                    <span>₹{{ number_format($subtotal ?? 0,2) }}</span>
                </div>
                <a href="/checkout" class="btn btn-brand w-100 mt-3">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

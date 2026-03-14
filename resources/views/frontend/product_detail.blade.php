@extends('frontend.layouts.app')
@section('title',$product->name)
@section('css')
<style>
    .page-hero.page-hero--product {
        background: linear-gradient(120deg, rgba(240, 125, 31, 0.12), rgba(255, 255, 255, 0.9));
        position: relative;
        overflow: hidden;
    }

    .page-hero.page-hero--product::after {
        content: "";
        position: absolute;
        right: -80px;
        top: -120px;
        width: 280px;
        height: 280px;
        background: rgba(240, 125, 31, 0.18);
        border-radius: 50%;
    }

    .product-detail-card {
        background: #fff;
        border-radius: 22px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
    }

    .product-media {
        position: relative;
        background: #fff8ef;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 360px;
        padding: 2rem;
    }

    .product-media img {
        width: 100%;
        max-width: 420px;
        height: auto;
        border-radius: 16px;
        box-shadow: 0 18px 30px rgba(25, 25, 25, 0.12);
    }

    .product-summary {
        padding: 2.2rem;
    }

    .product-summary .price-tag {
        font-size: 1.6rem;
    }

    .product-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem 1.5rem;
        color: var(--muted);
        font-size: 0.95rem;
    }

    .product-meta span {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
    }

    .qty-control {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #fff4e8;
        border-radius: 999px;
        padding: 0.35rem;
    }

    .qty-control .qty-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: none;
        background: #fff;
        color: var(--brand);
        font-weight: 700;
        box-shadow: 0 6px 12px rgba(240, 125, 31, 0.2);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .qty-control .qty-btn:disabled {
        opacity: 0.5;
        box-shadow: none;
        cursor: not-allowed;
    }

    .qty-control .qty-btn:not(:disabled):hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 18px rgba(240, 125, 31, 0.25);
    }

    .qty-control .qty-input {
        width: 64px;
        border: none;
        background: transparent;
        font-weight: 600;
        text-align: center;
    }

    @media (max-width: 991px) {
        .product-media {
            min-height: 280px;
        }

        .product-summary {
            padding: 1.6rem;
        }
    }
</style>
@endsection

@section('content')

<section class="page-hero reveal page-hero--product">
    <div class="container text-center">
        <h2>{{ $product->name }}</h2>
        <div class="breadcrumb-lite">Home / Product</div>
    </div>
</section>

<div class="container pb-5">
    <div class="product-detail-card reveal">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6">
                <div class="product-media">
                    <img src="{{ asset('uploads/'.$product->image) }}" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-summary">
                    <h3 class="fw-bold">{{ $product->name }}</h3>
                    <p class="text-muted">{{ $product->description }}</p>
                    <h4 class="price-tag mb-3">
                        ₹<span id="total-price">{{ number_format($product->price,2) }}</span>
                    </h4>

                    <div class="product-meta mb-4">
                        <span><i class="fa-solid fa-tag"></i> ID: #{{ $product->id }}</span>
                    </div>

                    <input type="hidden" id="product-price" value="{{ $product->price }}">
                    <form action="{{ url('cart/add/'.$product->id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">Quantity</label>
                            <div class="qty-control">
                                <button type="button" class="qty-btn qty-minus" disabled>-</button>
                                <input
                                    type="text"
                                    name="quantity"
                                    value="1"
                                    readonly
                                    class="qty-input" />
                                <button type="button" class="qty-btn qty-plus">+</button>
                            </div>
                        </div>
                        <button class="btn btn-brand">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        let price = parseFloat($('#product-price').val());

        function updatePrice(qty) {
            let total = price * qty;
            $('#total-price').text(total.toFixed(2));
        }

        $('.qty-plus').click(function() {
            let qty = parseInt($('.qty-input').val());
            qty++;
            $('.qty-input').val(qty);
            $('.qty-minus').prop('disabled', false);
            updatePrice(qty);
        });

        $('.qty-minus').click(function() {
            let qty = parseInt($('.qty-input').val());
            if (qty > 1) {
                qty--;
                $('.qty-input').val(qty);
                if (qty == 1) {
                    $('.qty-minus').prop('disabled', true);
                }
                updatePrice(qty);
            }
        });
    });
</script>
@endsection
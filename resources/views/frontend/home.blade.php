@extends('frontend.layouts.app')
@section('title','Home')
@section('css')
<style>
    .home-hero {
        padding: 2.5rem 0 1.5rem;
    }

    .hero-panel {
        background: #f7f7f7;
        border-radius: 16px;
        padding: 2.2rem 2.5rem;
        min-height: 420px;
        height: 100%;
        display: flex;
        align-items: stretch;
        gap: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--card-shadow);
    }

    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: var(--brand);
        opacity: 0.4;
    }

    .carousel-indicators .active {
        opacity: 1;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: var(--brand);
        border-radius: 50%;
        padding: 1.2rem;
        background-size: 50% 50%;
        box-shadow: 0 8px 16px rgba(240, 125, 31, 0.25);
    }

    .hero-panel::after {
        content: "";
        position: absolute;
        right: -60px;
        top: -60px;
        width: 220px;
        height: 220px;
        background: rgba(240, 125, 31, 0.18);
        border-radius: 50%;
    }

    .hero-kicker {
        letter-spacing: 2px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #7a7a7a;
        text-transform: uppercase;
    }

    .hero-copy {
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: space-between;
        text-align: center;
    }

    .hero-cta {
        margin-top: auto;
        align-self: center;
    }

    .hero-headline {
        font-size: 2.4rem;
        font-weight: 700;
        line-height: 1.12;
        color: #3b3b3b;
    }

    .hero-note {
        color: var(--muted);
        margin-top: 0.6rem;
        font-size: 1.05rem;
    }

    .hero-media img {
        max-width: 520px;
        width: 100%;
        height: auto;
        filter: drop-shadow(0 18px 28px rgba(0, 0, 0, 0.18));
    }

    .side-offer {
        background: #f7f7f7;
        border-radius: 16px;
        padding: 1.4rem 1.6rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        box-shadow: var(--card-shadow);
    }

    .side-offer h4 {
        font-size: 1.2rem;
        font-weight: 700;
        margin: 0.4rem 0;
    }

    .side-offer .offer-tag {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--accent-red);
    }

    .side-offer img {
        width: 110px;
        height: 110px;
        object-fit: contain;
    }

    .promo-strip {
        margin-top: 1.5rem;
    }

    .promo-card h5 {
        font-weight: 700;
    }

    .promo-card .discount {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--accent-red);
    }

    .home-products {
        padding: 2.5rem 0 3rem;
    }

    .products-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .products-header h2 {
        font-weight: 700;
        margin: 0;
    }

    .pill-group {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem;
    }

    .pill {
        background: #f4f4f4;
        color: #4a4a4a;
        padding: 0.5rem 1.1rem;
        border-radius: 999px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s ease;
    }

    .pill.active,
    .pill:hover {
        background: var(--brand);
        color: #fff;
    }

    .product-card .badge-circle {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--brand);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.7rem;
    }

    .product-card .badge-circle.sale {
        background: var(--accent-red);
    }

    .product-card .product-meta {
        color: var(--brand);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .product-card .price-row {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin-top: 0.35rem;
    }

    .product-card .price-row del {
        color: #c2c2c2;
    }

    @media (max-width: 991px) {
        .hero-panel {
            flex-direction: column;
            text-align: center;
            padding: 2rem;
        }

        .hero-media img {
            max-width: 280px;
        }
    }
</style>
@endsection

@section('content')

@php
$heroSliders = $sliders;
$sideItems = $products->take(2);
$promoItems = $products->slice(2, 2);
$avgPrice = max(1, (float) $products->avg('price'));
@endphp

<section class="home-hero">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                @if($heroSliders->count() > 0)
                <div id="heroCarousel" class="carousel slide reveal" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($heroSliders as $index => $slider)
                        <button type="button"
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($heroSliders as $index => $slider)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="hero-panel">
                                <div class="hero-copy">
                                    <div class="hero-kicker">{{ $slider->title ?? 'Special Offer' }}</div>
                                    <h1 class="hero-headline">{{ $slider->heading }}</h1>
                                    <p class="hero-note">{{ $slider->description }}</p>
                                    <a href="{{ url('/products') }}" class="btn btn-brand mt-3 hero-cta">
                                        Shop Now
                                    </a>
                                </div>
                                <div class="hero-media d-none d-lg-block">
                                    <img src="{{ asset('uploads/'.$slider->image) }}" alt="{{ $slider->heading }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @else
                <div class="hero-panel reveal">
                    <div class="hero-copy">
                        <div class="hero-kicker">Special Offer</div>
                        <h1 class="hero-headline">On Selected Laptops & Desktop Or Smartphone</h1>
                        <p class="hero-note">Terms and condition apply</p>
                        <a href="{{ url('/products') }}" class="btn btn-brand mt-3 hero-cta">Shop Now</a>
                    </div>
                    <div class="hero-media d-none d-lg-block">
                        <img src="{{ asset('uploads/'.$products->first()->image ?? '') }}" alt="Featured product">
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4 d-flex flex-column gap-4">
                @foreach($sideItems as $index => $item)
                <div class="side-offer reveal {{ $index === 1 ? 'delay-1' : '' }}">
                    <div>
                        <div class="text-muted">Find The Best</div>
                        <h4>{{ $item->name }}</h4>
                        <div class="offer-tag">{{ $index === 0 ? '40%' : '20%' }} Off</div>
                    </div>
                    <img src="{{ asset('uploads/'.$item->image) }}" alt="{{ $item->name }}">
                </div>
                @endforeach
            </div>
        </div>

        <div class="row g-4 promo-strip">
            @foreach($promoItems as $promo)
            @php
            $saveAmount = max(1, round($promo->price * 0.2));
            @endphp
            <div class="col-md-6">
                <div class="promo-card reveal">
                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div>
                            <div class="text-muted mb-1">Find The Best For You!</div>
                            <h5>{{ $promo->name }}</h5>
                            <div class="discount">Save ₹{{ number_format($saveAmount, 0) }}</div>
                        </div>
                        <img src="{{ asset('uploads/'.$promo->image) }}" alt="{{ $promo->name }}" style="width:120px;height:120px;object-fit:contain;">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="home-products">
    <div class="container">
        <div class="products-header reveal">
            <h2>Our Products</h2>
            <div class="pill-group">
                <a href="{{ url('/products') }}" class="pill active">All Products</a>
                @foreach($categories as $cat)
                <a href="{{ url('products/'.$cat->name) }}" class="pill">{{ $cat->name }}</a>
                @endforeach
            </div>
        </div>

        <div class="row g-4">
            @foreach($products as $index => $product)
            @php
            $isNew = $product->created_at && $product->created_at->gt(now()->subDays(14));
            $isSale = !$isNew && $product->price < ($avgPrice * 0.85);
                @endphp
                <div class="col-sm-6 col-xl-3">
                <div class="product-card reveal {{ $index % 2 === 0 ? 'delay-1' : '' }}">
                    <div class="position-relative">
                        <img src="{{ asset('uploads/'.$product->image) }}" alt="{{ $product->name }}">
                        @if($isNew || $isSale)
                        <span class="badge-circle {{ $isSale ? 'sale' : '' }}">
                            {{ $isSale ? 'Sale' : 'New' }}
                        </span>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="product-meta">{{ $product->slug }}</div>
                        <h6 class="fw-bold mt-2">{{ $product->name }}</h6>
                        <div class="price-row">
                            @if($isSale)
                            <del>₹{{ number_format($product->price * 1.2, 2) }}</del>
                            @endif
                            <span class="price-tag">₹{{ number_format($product->price, 2) }}</span>
                        </div>
                        <a href="{{ url('product/'.$product->slug) }}" class="btn btn-outline-brand btn-sm mt-3">
                            Add To Cart
                        </a>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
</section>

@endsection
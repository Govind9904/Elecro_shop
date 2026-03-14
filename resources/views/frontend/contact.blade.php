@extends('frontend.layouts.app')
@section('title','Contact')
@section('content')

<section class="page-hero reveal">
    <div class="container">
        <h2>Contact Us</h2>
        <div class="breadcrumb-lite">Home / Contact</div>
    </div>
</section>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="checkout-card reveal">
                <h5 class="fw-bold mb-3">Contact Details</h5>
                <p class="mb-2"><strong>Address:</strong> {{ $setting->address ?? 'N/A' }}</p>
                <p class="mb-2"><strong>Phone:</strong> {{ $setting->phone ?? 'N/A' }}</p>
                <p class="mb-0"><strong>Email:</strong> {{ $setting->email ?? 'N/A' }}</p>
                <div class="row g-3 mt-3">
                    <div class="col-6">
                        <div class="feature-card">
                            <i class="fa-solid fa-location-dot"></i>
                            <h6 class="mt-2 mb-0">Visit Us</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="feature-card">
                            <i class="fa-solid fa-headset"></i>
                            <h6 class="mt-2 mb-0">Support</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="checkout-card reveal delay-2">
                <h5 class="fw-bold mb-3">Find Us On Map</h5>
                @if($setting->map)
                {!! $setting->map !!}
                @else
                <div class="text-muted">Map is not available.</div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
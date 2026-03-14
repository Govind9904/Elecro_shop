@extends('frontend.layouts.app')
@section('title','Products')
@section('content')

<section class="page-hero reveal">
    <div class="container">
        <h2>Our Products</h2>
        <div class="breadcrumb-lite">Home / Shop</div>
    </div>
</section>

<div class="container pb-5">
    <div class="row g-4">

        <!-- Categories -->
        <div class="col-lg-3">
            <div class="sidebar-card reveal">
                <h5 class="fw-bold mb-3">Categories</h5>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item border-0">
                        <a href="{{ url('/products') }}"
                            class="text-decoration-none 
                            {{ request()->segment(2) == null ? 'text-danger fw-bold' : 'text-dark' }}">
                            All Products
                        </a>
                    </li>

                    @foreach($categories as $cat)

                    <li class="list-group-item border-0">

                        <a href="{{ url('products/'.$cat->name) }}"
                            class="text-decoration-none
                            {{ request()->segment(2) == $cat->name ? 'text-danger fw-bold' : 'text-dark' }}">

                            {{ $cat->name }}

                        </a>

                    </li>

                    @endforeach

                </ul>

            </div>
        </div>

        <!-- Products -->
        <div class="col-lg-9">
            <div class="row g-4">

                @foreach($products as $product)

                <div class="col-md-6 col-xl-4">
                    <div class="product-card reveal">

                        <img src="{{ asset('uploads/'.$product->image) }}" alt="{{ $product->name }}">

                        <div class="card-body">

                            <h6 class="text-muted mb-1">
                                {{ $product->slug }}
                            </h6>

                            <h5 class="fw-bold">
                                {{ $product->name }}
                            </h5>

                            <div class="d-flex align-items-center justify-content-between mt-2">

                                <span class="price-tag">
                                    ₹{{ number_format($product->price, 2) }}
                                </span>

                                <a href="{{ url('product/'.$product->slug) }}"
                                    class="btn btn-outline-brand btn-sm">
                                    View
                                </a>

                            </div>

                        </div>

                    </div>
                </div>

                @endforeach

            </div>

            <!-- Pagination -->
            <div class="pagination-theme mt-4 d-flex justify-content-between align-items-center flex-wrap">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>
</div>

@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}"
    });
</script>
@endif

@endsection
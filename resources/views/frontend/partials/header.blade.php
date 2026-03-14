<header class="site-header">
    <nav class="navbar navbar-expand-lg topbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <span class="all-categories">Electro</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#siteNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="siteNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Shop</a></li>
                    <li class="nav-item">
                        <a href="/cart" class="nav-link">
                            Cart ({{ count((array) session('cart')) }})
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/checkout') }}">Checkout</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                    <li class="nav-item ms-lg-2">
                        <span class="phone-pill"><i class="fa-solid fa-phone"></i>{{ $contact->phone }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
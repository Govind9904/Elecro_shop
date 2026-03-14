<footer class="footer-area">
    <div class="container">
        <div class="row footer-top text-center text-md-start">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="footer-pill"><i class="fa-solid fa-location-dot"></i></div>
                <h6>Address</h6>
                <p class="mb-0">{{ $contact->address }}</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="footer-pill"><i class="fa-solid fa-envelope"></i></div>
                <h6>Mail Us</h6>
                <p class="mb-0">{{ $contact->email }}</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="footer-pill"><i class="fa-solid fa-phone"></i></div>
                <h6>Telephone</h6>
                <p class="mb-0">{{ $contact->phone }}</p>
            </div>
            <div class="col-md-3">
                <div class="footer-pill"><i class="fa-solid fa-globe"></i></div>
                <h6>Website</h6>
                <p class="mb-0">{{ $contact->email }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <h6>Newsletter</h6>
                <p>Join the newsletter to get the latest product updates and offers.</p>
                <div class="newsletter-input">
                    <input type="email" placeholder="Enter your email">
                    <button type="button">SignUp</button>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h6>Customer Service</h6>
                <ul class="list-unstyled">
                    <li><a class="text-decoration-none text-light" href="#">Contact Us</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Returns</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Site Map</a></li>
                    <li><a class="text-decoration-none text-light" href="#">My Account</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 mb-4">
                <h6>Information</h6>
                <ul class="list-unstyled">
                    <li><a class="text-decoration-none text-light" href="#">About Us</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Delivery Info</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Privacy Policy</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 mb-4">
                <h6>Extras</h6>
                <ul class="list-unstyled">
                    <li><a class="text-decoration-none text-light" href="#">Brands</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Gift Certificates</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Wishlist</a></li>
                    <li><a class="text-decoration-none text-light" href="#">Order History</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="footer-bottom">
    &copy; {{ date('Y') }} Electro Shop. All Rights Reserved.
</div>
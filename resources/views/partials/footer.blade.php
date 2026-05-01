<footer id="footer">
    <div class="container">
        <div class="row justify-content-between align-items-start">

            <div class="col-md-5">
                <div class="footer-item">
                    <div class="company-brand">
                        <img src="{{ asset('images/main-logo.png') }}" alt="logo" class="footer-logo">
                        <p class="footer-description">
                            Booksaw is an online bookstore where readers can explore books, discover articles,
                            and shop their favorite titles in one place.
                        </p>

                        <div class="footer-social">
                            <a href="#"><i class="icon icon-facebook"></i></a>
                            <a href="#"><i class="icon icon-twitter"></i></a>
                            <a href="#"><i class="icon icon-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-menu">
                    <h5>Account</h5>
                    <ul class="menu-list">
                        <li class="menu-item"><a href="{{ route('account') }}">Account</a></li>
<li class="menu-item"><a href="{{ route('cart.index') }}">Cart</a></li>
<li class="menu-item"><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-menu">
                    <h5>Contact</h5>
                    <ul class="menu-list">
                        <li class="menu-item"><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li class="menu-item"><a href="mailto:info@booksaw.com">info@booksaw.com</a></li>
                        <li class="menu-item"><a href="tel:+970000000000">+970 00 000 0000</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© {{ date('Y') }} Booksaw. All rights reserved.</p>
        </div>
    </div>
</footer>

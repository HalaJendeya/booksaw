<div id="header-wrap">
    <header id="header">
        <div class="container-fluid">
            <div class="header-inner">

                <div class="main-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/main-logo.png') }}" alt="logo">
                    </a>
                </div>

                <nav id="navbar">
                    <div class="main-menu stellarnav">
                        <ul class="menu-list">
                            <li class="menu-item has-sub {{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}" class="nav-link home-dropdown-toggle">
                                    Home <span class="home-menu-arrow">▾</span>
                                </a>
                                <ul>
                                    <li><a href="{{ route('home') }}#featured-books">Featured</a></li>
                                    <li><a href="{{ route('home') }}#best-seller">Best Seller</a></li>
                                    <li><a href="{{ route('home') }}#popular-books">Popular</a></li>
                                    <li><a href="{{ route('home') }}#quote-of-the-day">Quote of the Day</a></li>
                                    <li><a href="{{ route('home') }}#special-offer">Offer</a></li>
                                    <li><a href="{{ route('home') }}#subscribe">Newsletter</a></li>
                                    <li><a href="{{ route('home') }}#download-app">Download App</a></li>
                                </ul>
                            </li>

                            <li class="menu-item {{ request()->routeIs('shop') || request()->routeIs('books.show') ? 'active' : '' }}">
                                <a href="{{ route('shop') }}" class="nav-link">Shop</a>
                            </li>

                            <li class="menu-item {{ request()->routeIs('articles.index') || request()->routeIs('articles.show') ? 'active' : '' }}">
                                <a href="{{ route('articles.index') }}" class="nav-link">Articles</a>
                            </li>

                            <li class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                            </li>

                            <li class="menu-item {{ request()->routeIs('cart.index') ? 'active' : '' }}">
                                <a href="{{ route('cart.index') }}" class="nav-link">Cart</a>
                            </li>

                            <li class="menu-item {{ request()->routeIs('account') ? 'active' : '' }}">
                                <a href="{{ route('account') }}" class="nav-link">Account</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="header-actions">
                    <div class="action-menu">
                        <div class="search-bar">
                            <a href="#" class="search-button search-toggle header-action-link" data-selector="#header-wrap">
                                <i class="icon icon-search"></i>
                            </a>
                            <form role="search" method="get" class="search-box">
                                <input class="search-field text search-input" placeholder="Search" type="search" name="search">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

            </div>
        </div>
    </header>
</div>

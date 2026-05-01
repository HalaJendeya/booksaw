<div id="header-wrap">

    <div class="top-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="social-links">
                        <ul>
                            <li><a href="#"><i class="icon icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon icon-behance-square"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="right-element">
                        <a href="#" class="user-account for-buy">
                            <i class="icon icon-user"></i><span>Account</span>
                        </a>

                        <a href="{{ route('cart.index') }}" class="cart for-buy">
                            <i class="icon icon-clipboard"></i><span>Cart</span>
                        </a>

                        <div class="action-menu">
                            <div class="search-bar">
                                <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                    <i class="icon icon-search"></i>
                                </a>
                                <form role="search" method="get" class="search-box">
                                    <input class="search-field text search-input" placeholder="Search" type="search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <header id="header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/main-logo.png') }}" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="col-md-10">
                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>

                                <li class="menu-item {{ request()->routeIs('shop') || request()->routeIs('books.show') ? 'active' : '' }}">
                                    <a href="{{ route('shop') }}" class="nav-link">Shop</a>
                                </li>

                                <li class="menu-item has-sub">
                                    <a href="#pages" class="nav-link">Pages</a>
                                    <ul>
                                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                            <a href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="{{ request()->routeIs('shop') || request()->routeIs('books.show') ? 'active' : '' }}">
                                            <a href="{{ route('shop') }}">Shop</a>
                                        </li>
                                        <li class="{{ request()->routeIs('articles.index') || request()->routeIs('articles.show') ? 'active' : '' }}">
                                            <a href="{{ route('articles.index') }}">Articles</a>
                                        </li>
                                        <li class="{{ request()->routeIs('cart.index') ? 'active' : '' }}">
                                            <a href="{{ route('cart.index') }}">Cart</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item {{ request()->routeIs('home') && request()->fullUrlIs(route('home') . '#featured-books') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}#featured-books" class="nav-link">Featured</a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('home') }}#popular-books" class="nav-link">Popular</a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('home') }}#special-offer" class="nav-link">Offer</a>
                                </li>

                                <li class="menu-item {{ request()->routeIs('articles.index') || request()->routeIs('articles.show') ? 'active' : '' }}">
                                    <a href="{{ route('articles.index') }}" class="nav-link">Articles</a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('home') }}#download-app" class="nav-link">Download App</a>
                                </li>
                            </ul>

                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </header>

</div>

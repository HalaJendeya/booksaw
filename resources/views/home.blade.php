@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- billboard --}}
    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    <div class="main-slider pattern-overlay">
                        @foreach ($sliderBooks as $book)
                            <div class="slider-item">
                                <div class="banner-content">
                                    <h2 class="banner-title">{{ $book->title }}</h2>
                                    <p>{{ $book->description ?? 'Discover this amazing book in our collection.' }}</p>
                                    <div class="btn-wrap">
                                        <a href="{{ route('books.show', $book->slug) }}"
                                            class="btn btn-outline-accent btn-accent-arrow">
                                            Read More
                                            <i class="icon icon-ns-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!--banner-content-->
                                <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}"
                                    class="banner-image">
                            </div><!--slider-item-->
                        @endforeach
                    </div>

                    <button class="next slick-arrow">
                        <i class="icon icon-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>

    </section>

    {{-- client holder --}}
    <section id="client-holder" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="logo-wrap">
                        <div class="grid">
                            <a href="#"><img src="{{ asset('images/client-image1.png') }}" alt="client"></a>
                            <a href="#"><img src="{{ asset('images/client-image2.png') }}" alt="client"></a>
                            <a href="#"><img src="{{ asset('images/client-image3.png') }}" alt="client"></a>
                            <a href="#"><img src="{{ asset('images/client-image4.png') }}" alt="client"></a>
                            <a href="#"><img src="{{ asset('images/client-image5.png') }}" alt="client"></a>
                        </div>
                    </div><!--image-holder-->
                </div>
            </div>
        </div>
    </section>

    {{-- featured books --}}
    <section id="featured-books" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Featured Books</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">

                            @foreach ($featuredBooks as $book)
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <a href="{{ route('books.show', $book->slug) }}">
                                                <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}"
                                                    class="product-item">
                                            </a>
                                            <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="add-to-cart" data-product-tile="add-to-cart">
                                                    Add to Cart
                                                </button>
                                            </form>
                                            <form action="{{ route('wishlist.add', $book->id) }}" method="POST"
                                                class="wishlist-form">
                                                @csrf
                                                <button type="submit" class="wishlist-btn" title="Add to Wishlist">
                                                    <i class="icon icon-heart">♥</i>
                                                </button>
                                            </form>
                                        </figure>
                                        <figcaption>
                                            <h3>
                                                <a href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                            </h3>
                                            <span>{{ $book->author }}</span>
                                            <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                        </figcaption>
                                    </div>
                                </div>
                            @endforeach

                        </div><!--ft-books-slider-->
                    </div><!--grid-->

                </div><!--inner-content-->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="btn-wrap align-right">
                        <a href="#" class="btn-accent-arrow">View all products <i
                                class="icon icon-ns-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- best selling --}}
    <section id="best-seller" class="best-seller padding-large">
        <div class="container">
            <div class="section-header align-center">
                <h2 class="section-title">Best Sellers</h2>
            </div>

            <div class="row">
                @forelse($bestSellers as $book)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-item">
                            <figure class="product-style">
                                <a href="{{ route('books.show', $book->slug) }}">
                                    <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}"
                                        class="product-item">
                                </a>
                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="add-to-cart" data-product-tile="add-to-cart">
                                        Add to Cart
                                    </button>
                                </form>
                                <form action="{{ route('wishlist.add', $book->id) }}" method="POST" class="wishlist-form">
                                    @csrf
                                    <button type="submit" class="wishlist-btn" title="Add to Wishlist">
                                        <i class="icon icon-heart">♥</i>
                                    </button>
                                </form>
                            </figure>

                            <figcaption>
                                <h3>
                                    <a href="{{ route('books.show', $book->slug) }}">
                                        {{ $book->title }}
                                    </a>
                                </h3>
                                <span>{{ $book->author }}</span>
                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                            </figcaption>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No best seller books available right now.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- popular books --}}
    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Popular Books</h2>
                    </div>

                    <ul class="tabs">
                        <li data-tab-target="#all-genre" class="active tab">All Genre</li>
                        <li data-tab-target="#business" class="tab">Business</li>
                        <li data-tab-target="#technology" class="tab">Technology</li>
                        <li data-tab-target="#romantic" class="tab">Romantic</li>
                        <li data-tab-target="#adventure" class="tab">Adventure</li>
                        <li data-tab-target="#fictional" class="tab">Fictional</li>
                    </ul>

                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">
                                @foreach ($popularBooks as $book)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('books.show', $book->slug) }}">
                                                    <img src="{{ asset('images/' . $book->image) }}"
                                                        alt="{{ $book->title }}" class="product-item">
                                                </a>
                                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                                <form action="{{ route('wishlist.add', $book->id) }}" method="POST"
                                                    class="wishlist-form">
                                                    @csrf
                                                    <button type="submit" class="wishlist-btn" title="Add to Wishlist">
                                                        <i class="icon icon-heart">♥</i>
                                                    </button>
                                                </form>
                                            </figure>
                                            <figcaption>
                                                <h3>
                                                    <a
                                                        href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                                </h3>
                                                <span>{{ $book->author }}</span>
                                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="business" data-tab-content>
                            <div class="row">
                                @foreach ($businessBooks as $book)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('books.show', $book->slug) }}">
                                                    <img src="{{ asset('images/' . $book->image) }}"
                                                        alt="{{ $book->title }}" class="product-item">
                                                </a>
                                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </figure>
                                            <figcaption>
                                                <h3>
                                                    <a
                                                        href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                                </h3>
                                                <span>{{ $book->author }}</span>
                                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="technology" data-tab-content>
                            <div class="row">
                                @foreach ($technologyBooks as $book)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('books.show', $book->slug) }}">
                                                    <img src="{{ asset('images/' . $book->image) }}"
                                                        alt="{{ $book->title }}" class="product-item">
                                                </a>
                                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </figure>
                                            <figcaption>
                                                <h3>
                                                    <a
                                                        href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                                </h3>
                                                <span>{{ $book->author }}</span>
                                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="romantic" data-tab-content>
                            <div class="row">
                                @foreach ($romanticBooks as $book)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('books.show', $book->slug) }}">
                                                    <img src="{{ asset('images/' . $book->image) }}"
                                                        alt="{{ $book->title }}" class="product-item">
                                                </a>
                                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </figure>
                                            <figcaption>
                                                <h3>
                                                    <a
                                                        href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                                </h3>
                                                <span>{{ $book->author }}</span>
                                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="adventure" data-tab-content>
                            <div class="row">
                                @foreach ($adventureBooks as $book)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('books.show', $book->slug) }}">
                                                    <img src="{{ asset('images/' . $book->image) }}"
                                                        alt="{{ $book->title }}" class="product-item">
                                                </a>
                                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </figure>
                                            <figcaption>
                                                <h3>
                                                    <a
                                                        href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                                </h3>
                                                <span>{{ $book->author }}</span>
                                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="fictional" data-tab-content>
                            <div class="row">
                                @foreach ($fictionalBooks as $book)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('books.show', $book->slug) }}">
                                                    <img src="{{ asset('images/' . $book->image) }}"
                                                        alt="{{ $book->title }}" class="product-item">
                                                </a>
                                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </figure>
                                            <figcaption>
                                                <h3>
                                                    <a
                                                        href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                                </h3>
                                                <span>{{ $book->author }}</span>
                                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div><!--inner-tabs-->

            </div>
        </div>
    </section>

    {{-- quotation --}}
    <section id="quote-of-the-day" class="quotation padding-large">
        <div class="inner-content">
            <div class="container">
                <div class="row">
                    <div class="section-header align-center">
                        <h2 class="section-title">Quote of the Day</h2>
                    </div>
                    <div class="quotation-content text-center">
                        @if ($quote)
                            <blockquote>
                                <q>{{ $quote->quote }}</q>
                                @if ($quote->author)
                                    <div class="author-name">— {{ $quote->author }}</div>
                                @endif
                            </blockquote>
                        @else
                            <blockquote>
                                <q>A room without books is like a body without a soul.</q>
                                <div class="author-name">— Cicero</div>
                            </blockquote>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- special offer --}}
    <section id="special-offer" class="bookshelf pb-5 mb-5">

        <div class="section-header align-center">
            <div class="title">
                <span>Grab your opportunity</span>
            </div>
            <h2 class="section-title">Books with offer</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="product-list" data-aos="fade-up">
                        <div class="grid product-grid">
                            @foreach ($offerBooks as $book)
                                <div class="product-item">
                                    <figure class="product-style">
                                        <a href="{{ route('books.show', $book->slug) }}">
                                            <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}"
                                                class="product-item">
                                        </a>
                                        <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="add-to-cart" data-product-tile="add-to-cart">
                                                Add to Cart
                                            </button>
                                        </form>
                                        <form action="{{ route('wishlist.add', $book->id) }}" method="POST"
                                            class="wishlist-form">
                                            @csrf
                                            <button type="submit" class="wishlist-btn" title="Add to Wishlist">
                                                <i class="icon icon-heart">♥</i>
                                            </button>
                                        </form>
                                    </figure>
                                    <figcaption>
                                        <h3>
                                            <a href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                        </h3>
                                        <span>{{ $book->author }}</span>
                                        <div class="item-price">$ {{ number_format($book->price, 2) }}</div>
                                    </figcaption>
                                </div>
                            @endforeach
                        </div><!--grid-->
                    </div>
                </div><!--inner-content-->
            </div>
        </div>
    </section>

    {{-- subscribe --}}
    <section id="subscribe">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="title-element">
                                <h2 class="section-title divider">Subscribe to our newsletter</h2>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="subscribe-content" data-aos="fade-up">
                                <p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit
                                    adipiscing enim pharetra hac.</p>
                                <form id="form">
                                    <input type="text" name="email" placeholder="Enter your email addresss here">
                                    <button class="btn-subscribe">
                                        <span>send</span>
                                        <i class="icon icon-send"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- latest blog --}}
    <section id="latest-blog" class="py-5 my-5">
        <div class="container">

            <div class="section-header align-center">
                <div class="title">
                    <span>Read our latest updates</span>
                </div>
                <h2 class="section-title">Latest Articles</h2>
            </div>

            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4">
                        <article class="column" data-aos="fade-up">
                            <figure>
                                <a href="{{ route('articles.show', $article->slug) }}" class="image-hvr-effect">
                                    <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}"
                                        class="post-image">
                                </a>
                            </figure>

                            <div class="post-item">
                                <div class="meta-date">
                                    {{ $article->published_at?->format('M d, Y') }}
                                </div>
                                <h3>
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>

                                {{-- <div class="links-element">
                                <div class="categories">{{ $article->category }}</div>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="icon icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon icon-behance-square"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- download app --}}
    <section id="download-app" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-5">
                            <figure>
                                <img src="{{ asset('images/device.png') }}" alt="phone" class="single-image">
                            </figure>
                        </div>

                        <div class="col-md-7">
                            <div class="app-info">
                                <h2 class="section-title divider">Download our app now !</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus
                                    liberolectus nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna.
                                    Adipiscing fames semper erat ac in suspendisse iaculis.</p>
                                <div class="google-app">
                                    <img src="{{ asset('images/google-play.jpg') }}" alt="google play">
                                    <img src="{{ asset('images/app-store.jpg') }}" alt="app store">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

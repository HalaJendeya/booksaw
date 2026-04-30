@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <section class="py-5 my-5 shop-page" id="shop-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Browse our collection</span>
                        </div>
                        <h2 class="section-title">Shop</h2>
                    </div>

                    <div class="shop-toolbar">
                        {{-- <form action="{{ route('shop') }}" method="GET" class="shop-search-form">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif

                            <div class="shop-search-wrapper">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search books..." class="shop-search-input">
                                <button type="submit" class="shop-search-button">Search</button>
                            </div>
                        </form> --}}

                        <div class="shop-filter-tabs">
                            <a href="{{ route('shop') }}"
                                class="shop-filter-tab {{ !request('category') ? 'active' : '' }}">
                                All
                            </a>

                            @foreach ($categories as $category)
                                <a href="{{ route('shop', ['category' => $category->slug, 'search' => request('search')]) }}"
                                    class="shop-filter-tab {{ request('category') === $category->slug ? 'active' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        @forelse($books as $book)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <a href="{{ route('books.show', $book->slug) }}">
                                            <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}"
                                                class="product-item">
                                        </a>
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                            Add to Cart
                                        </button>
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
                        @empty
                            <div class="col-md-12 text-center">
                                <p>No books found.</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Wishlist')

@section('content')
<section class="wishlist-page padding-large">
    <div class="container">
        <div class="section-header align-center">
            <div class="title">
                <span>Your saved books</span>
            </div>
            <h2 class="section-title">My Wishlist</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($books->count())
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-3">
                        <div class="product-item">
                            <figure class="product-style">
                                <a href="{{ route('books.show', $book->slug) }}">
                                    <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}" class="product-item">
                                </a>
                            </figure>

                            <figcaption>
                                <h3>
                                    <a href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                                </h3>
                                <span>{{ $book->author }}</span>
                                <div class="item-price">$ {{ number_format($book->price, 2) }}</div>

                                <form action="{{ route('wishlist.remove', $book->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-accent btn-accent-arrow">
                                        Remove
                                    </button>
                                </form>
                            </figcaption>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="wishlist-empty text-center">
                <p>You have no books in your wishlist yet.</p>
                <a href="{{ route('shop') }}" class="btn btn-outline-accent btn-accent-arrow">
                    Browse Books
                    <i class="icon icon-ns-arrow-right"></i>
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

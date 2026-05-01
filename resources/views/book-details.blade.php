@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <section class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="book-details-back">
    <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('shop') }}" class="back-button-link">
        <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>
    </a>
</div>
                <div class="col-md-5">
                    <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}" class="img-fluid">
                </div>


                <div class="col-md-7">
                    <h1>{{ $book->title }}</h1>
                    <p><strong>Author:</strong> {{ $book->author }}</p>
                    <p><strong>Category:</strong> {{ $book->category?->name }}</p>
                    <p><strong>Price:</strong> $ {{ number_format($book->price, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $book->stock }}</p>
                    <p>{{ $book->description }}</p>

                    <div class="book-details-cart-btn">
    <form action="{{ route('cart.add', $book->id) }}" method="POST">
        @csrf
        <button type="submit" class="add-to-cart" data-product-tile="add-to-cart">
            Add to Cart
        </button>
    </form>
</div>
                </div>

            </div>
        </div>
    </section>
@endsection

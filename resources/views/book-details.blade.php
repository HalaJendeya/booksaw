@extends('layouts.app')

@section('title', $book->title)

@section('content')
<section class="py-5 my-5">
    <div class="container">
        <div class="row align-items-center">

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

                <button class="btn btn-primary">Add to Cart</button>
            </div>

        </div>
    </div>
</section>
@endsection

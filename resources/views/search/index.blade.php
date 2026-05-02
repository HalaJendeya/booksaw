@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<section class="search-results padding-large">
    <div class="container">
        <div class="section-header align-center">
            <h2 class="section-title">Search Results</h2>
            @if($query)
                <p>Results for: "<strong>{{ $query }}</strong>"</p>
            @endif
        </div>

        @if(!$query)
            <div class="text-center">
                <p>Please enter a search term.</p>
            </div>
        @else
            <div class="mb-5">
                <h3>Books</h3>

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
                                    </figcaption>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No books found.</p>
                @endif
            </div>

            <div>
                <h3>Articles</h3>

                @if($articles->count())
                    <div class="row">
                        @foreach($articles as $article)
                            <div class="col-md-4">
                                <article class="column">
                                    <figure>
                                        <a href="{{ route('articles.show', $article->slug) }}" class="image-hvr-effect">
                                            <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="post-image">
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
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No articles found.</p>
                @endif
            </div>
        @endif
    </div>
</section>
@endsection

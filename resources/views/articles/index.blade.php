@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<section class="py-5 my-5">
    <div class="container">
        <div class="section-header align-center">
            <div class="title">
                <span>Read our articles</span>
            </div>
            <h2 class="section-title">Articles</h2>
        </div>

        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <article class="column" data-aos="fade-up">
                        <figure>
                            <a href="{{ route('articles.show', $article->slug) }}" class="image-hvr-effect">
                                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="post-image">
                            </a>
                        </figure>

                        <div class="post-item">
                            <div class="meta-date">{{ $article->published_at?->format('M d, Y') }}</div>
                            <h3>
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p>{{ $article->excerpt }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

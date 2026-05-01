@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <section class="py-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="book-details-back">
                    <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('shop') }}"
                        class="back-button-link">
                        <button class="prev slick-arrow">
                            <i class="icon icon-arrow-left"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="section-header align-center">
                        <div class="title">
                            <span>{{ $article->category }}</span>
                        </div>
                        <h2 class="section-title">{{ $article->title }}</h2>
                        <div class="meta-date">{{ $article->published_at?->format('M d, Y') }}</div>
                    </div>

                    <div class="mb-4">
                        <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid">
                    </div>

                    <div class="article-content">
                        <p>{{ $article->content }}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

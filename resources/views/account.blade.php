@extends('layouts.app')

@section('title', 'My Account')

@section('content')
<section class="account-page padding-large">
    <div class="container">
        <div class="section-header align-center">
            <div class="title">
                <span>Your personal space</span>
            </div>
            <h2 class="section-title">My Account</h2>
        </div>

        <div class="account-box">
            @auth
                <div class="account-info">
                    <h3>Welcome, {{ auth()->user()->name }}</h3>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                </div>
            @else
                <div class="account-info">
                    <h3>Welcome to your account</h3>
                    <p>You are currently browsing as a guest.</p>
                    <p>Later you can connect this page to login and registration.</p>
                </div>
            @endauth

            <div class="account-links">
                <a href="{{ route('wishlist.index') }}" class="account-card">
                    <h4>Wishlist</h4>
                    <p>View your saved books.</p>
                </a>

                <a href="{{ route('cart.index') }}" class="account-card">
                    <h4>Cart</h4>
                    <p>Check your shopping cart.</p>
                </a>

                <a href="{{ route('shop') }}" class="account-card">
                    <h4>Shop</h4>
                    <p>Continue browsing books.</p>
                </a>

                <a href="{{ route('contact') }}" class="account-card">
                    <h4>Contact</h4>
                    <p>Get in touch with us.</p>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

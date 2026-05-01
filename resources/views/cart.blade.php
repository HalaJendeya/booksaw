@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<section class="py-5 my-5 cart-page" id="cart-page">
    <div class="container">
        <div class="section-header align-center">
            <div class="title">
                <span>Your selected books</span>
            </div>
            <h2 class="section-title">Shopping Cart</h2>
        </div>

        @if(session('success'))
            <div class="cart-alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->count())
            <div class="cart-table-wrap">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th scope="col">Book</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-center">Subtotal</th>
                            <th scope="col" class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <div class="cart-book-info">
                                        <a href="{{ route('books.show', $item->book->slug) }}" class="cart-book-image">
                                            <img src="{{ asset('images/' . $item->book->image) }}" alt="{{ $item->book->title }}">
                                        </a>

                                        <div class="cart-book-details">
                                            <h3>
                                                <a href="{{ route('books.show', $item->book->slug) }}">
                                                    {{ $item->book->title }}
                                                </a>
                                            </h3>
                                            <span>{{ $item->book->author }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="cart-price text-center">
                                    ${{ number_format($item->book->price, 2) }}
                                </td>

                                <td class="text-center">
    <div class="cart-quantity-cell">
        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="cart-quantity-form">
            @csrf
            @method('PATCH')

            <input
                type="text"
                name="quantity"
                value="{{ $item->quantity }}"
                inputmode="numeric"
                class="cart-quantity-input"
            >

            <button type="submit" class="cart-update-btn">Update</button>
        </form>
    </div>
</td>

                                <td class="cart-subtotal text-center">
                                    ${{ number_format($item->book->price * $item->quantity, 2) }}
                                </td>

                                <td class="text-center">
    <div class="cart-remove-cell">
        <form action="{{ route('cart.remove', $item->id) }}" method="POST"
              onsubmit="return confirm('Remove this item from cart?');"
              class="cart-remove-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="cart-remove-btn" aria-label="Remove item">&times;</button>
        </form>
    </div>
</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-summary">
                <div class="cart-summary-card">
                    <h4>Cart Total</h4>
                    <div class="cart-summary-total">${{ number_format($total, 2) }}</div>
                    <a href="javascript:void(0)" class="btn-accent-arrow">
    Proceed to Checkout <i class="icon icon-ns-arrow-right"></i>
</a>
                </div>
            </div>
        @else
            <div class="cart-empty-state">
                <p>Your cart is empty.</p>
                <a href="{{ route('shop') }}" class="btn-accent-arrow">
                    Continue Shopping <i class="icon icon-ns-arrow-right"></i>
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

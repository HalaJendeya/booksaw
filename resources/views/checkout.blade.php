@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <section class="py-5 my-5">
        <div class="container">
            <div class="section-header align-center">
                <div class="title"><span>Almost there</span></div>
                <h2 class="section-title">Checkout</h2>
            </div>

            <form action="{{ route('orders.place') }}" method="POST">
                @csrf
                <div class="row">

                    {{-- Shipping Info --}}
                    <div class="col-md-7">
                        <div class="card p-4 mb-4">
                            <h4 class="mb-4">Shipping Information</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name *</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', auth()->user()?->name) }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address *</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', auth()->user()?->email) }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}">
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>City *</label>
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                        value="{{ old('city') }}" required>
                                    @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Country *</label>
                                <input type="text" name="country"
                                    class="form-control @error('country') is-invalid @enderror"
                                    value="{{ old('country', 'Palestine') }}" required>
                                @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Full Address *</label>
                                <textarea name="address" rows="3"
                                    class="form-control @error('address') is-invalid @enderror"
                                    required>{{ old('address') }}</textarea>
                                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Order Notes (optional)</label>
                                <textarea name="notes" rows="2" class="form-control"
                                    placeholder="Any special instructions?">{{ old('notes') }}</textarea>
                            </div>
                        </div>

                        {{-- Payment Method --}}
                        <div class="card p-4">
                            <h4 class="mb-4">Payment Method</h4>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod"
                                    checked>
                                <label class="form-check-label" for="cod">
                                    <strong>Cash on Delivery</strong> — Pay when your order arrives
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="card" value="card">
                                <label class="form-check-label" for="card">
                                    <strong>Credit / Debit Card</strong>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Order Summary --}}
                    <div class="col-md-5">
                        <div class="card p-4">
                            <h4 class="mb-4">Order Summary</h4>

                            @foreach ($cartItems as $item)
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ asset('images/' . $item->book->image) }}" alt="{{ $item->book->title }}"
                                        style="width:50px; height:65px; object-fit:cover; margin-right:12px;">
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold" style="font-size:14px;">{{ $item->book->title }}</div>
                                        <div class="text-muted" style="font-size:12px;">{{ $item->book->author }}</div>
                                        <div style="font-size:13px;">x{{ $item->quantity }}</div>
                                    </div>
                                    <div class="fw-bold">
                                        ${{ number_format($item->book->price * $item->quantity, 2) }}
                                    </div>
                                </div>
                            @endforeach

                            <hr>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                                <span>Total</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>

                            <button type="submit" class="btn-accent-arrow w-100">
                                Place Order <i class="icon icon-ns-arrow-right"></i>
                            </button>

                            <a href="{{ route('cart.index') }}" class="d-block text-center mt-3 text-muted">
                                ← Back to Cart
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection

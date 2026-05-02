<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/account', [AccountController::class, 'index'])->name('account');
// Route::view('/contact', 'contact')->name('contact');

Route::get('/shop', [BookController::class, 'index'])->name('shop');

Route::get('/account', [AccountController::class, 'index'])->name('account');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add/{book}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::delete('/wishlist/remove/{book}', [WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/books/{slug}', [BookController::class, 'show'])->name('books.show');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'place'])->name('orders.place');
Route::get('/orders/{order}/success', [OrderController::class, 'success'])->name('orders.success');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

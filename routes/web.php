<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [BookController::class, 'index'])->name('shop');
Route::get('/books/{slug}', [BookController::class, 'show'])->name('books.show');

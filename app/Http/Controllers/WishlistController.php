<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);

        $books = Book::whereIn('id', array_keys($wishlist))->get();

        return view('wishlist.index', compact('books'));
    }

    public function add(Book $book)
    {
        $wishlist = session()->get('wishlist', []);

        if (!isset($wishlist[$book->id])) {
            $wishlist[$book->id] = [
                'id' => $book->id,
                'title' => $book->title,
            ];
        }

        session()->put('wishlist', $wishlist);

        return back()->with('success', 'Book added to wishlist successfully.');
    }

    public function remove(Book $book)
    {
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$book->id])) {
            unset($wishlist[$book->id]);
            session()->put('wishlist', $wishlist);
        }

        return back()->with('success', 'Book removed from wishlist.');
    }
}

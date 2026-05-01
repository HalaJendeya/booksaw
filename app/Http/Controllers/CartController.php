<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $sessionId = session()->getId();

        $cartItems = CartItem::with('book')
            ->where('session_id', $sessionId)
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->book->price * $item->quantity;
        });

        return view('cart', compact('cartItems', 'total'));
    }

    public function add(Book $book)
    {
        $sessionId = session()->getId();

        $cartItem = CartItem::where('session_id', $sessionId)
            ->where('book_id', $book->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'book_id' => $book->id,
                'quantity' => 1,
                'session_id' => $sessionId,
            ]);
        }

        return redirect()->back()->with('success', 'Book added to cart successfully.');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        if ($cartItem->session_id !== session()->getId()) {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove(CartItem $cartItem)
    {
        if ($cartItem->session_id !== session()->getId()) {
            abort(403);
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function checkout()
    {
        $sessionId = session()->getId();

        $cartItems = CartItem::with('book')
            ->where('session_id', $sessionId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(fn($item) => $item->book->price * $item->quantity);

        return view('checkout', compact('cartItems', 'total'));
    }

    public function place(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'payment_method' => 'required|in:cod,card',
            'notes' => 'nullable|string|max:1000',
        ]);

        $sessionId = session()->getId();

        $cartItems = CartItem::with('book')
            ->where('session_id', $sessionId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(fn($item) => $item->book->price * $item->quantity);

        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'payment_method' => $request->payment_method,
            'total' => $total,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            $order->items()->create([
                'book_id' => $item->book_id,
                'book_title' => $item->book->title,
                'book_author' => $item->book->author,
                'book_image' => $item->book->image,
                'price' => $item->book->price,
                'quantity' => $item->quantity,
            ]);
        }

        // Clear cart
        CartItem::where('session_id', $sessionId)->delete();

        // Send confirmation email
        Mail::to($order->email)->send(new OrderConfirmationMail($order));

        return redirect()->route('orders.success', $order->id);
    }

    public function success(Order $order)
    {
        return view('orders.success', compact('order'));
    }
}

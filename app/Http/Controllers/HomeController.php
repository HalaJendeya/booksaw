<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredBooks = Book::where('is_featured', true)
            ->orderBy('title')
            ->take(4)
            ->get();

        $popularBooks = Book::where('is_best_seller', true)
            ->orderBy('title')
            ->take(8)
            ->get();

        $businessBooks = Book::whereHas('category', function ($query) {
                $query->where('slug', 'business');
            })
            ->orderBy('title')
            ->take(8)
            ->get();

        $technologyBooks = Book::whereHas('category', function ($query) {
                $query->where('slug', 'technology');
            })
            ->orderBy('title')
            ->take(8)
            ->get();

        $romanticBooks = Book::whereHas('category', function ($query) {
                $query->where('slug', 'romantic');
            })
            ->orderBy('title')
            ->take(8)
            ->get();

        $adventureBooks = Book::whereHas('category', function ($query) {
                $query->where('slug', 'adventure');
            })
            ->orderBy('title')
            ->take(8)
            ->get();

        $fictionalBooks = Book::whereHas('category', function ($query) {
                $query->where('slug', 'fictional');
            })
            ->orderBy('title')
            ->take(8)
            ->get();

        $offerBooks = Book::where('is_on_offer', true)
            ->orderBy('title')
            ->take(5)
            ->get();

        return view('home', compact(
            'featuredBooks',
            'popularBooks',
            'businessBooks',
            'technologyBooks',
            'romanticBooks',
            'adventureBooks',
            'fictionalBooks',
            'offerBooks'
        ));
    }
}

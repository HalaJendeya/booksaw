<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->q);

        $books = collect();
        $articles = collect();

        if ($query !== '') {
            $books = Book::where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->get();

            $articles = Article::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->orWhere('category', 'like', "%{$query}%")
                ->get();
        }

        return view('search.index', compact('query', 'books', 'articles'));
    }
}

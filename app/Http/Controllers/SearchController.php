<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $books = Book::where('title', 'like', '%'.$request->search.'%')->get();
        return view('components.user.search.index', compact('books'));
    }

    public function searchAjax(Request $request)
    {
        $search = $request->input('search');

        $books = Book::where('title', 'like', '%'.$search.'%')->orWhere('title', '%'.$search.'%')->get();

        return view('components.user.search.result', compact('books'));
    }
}

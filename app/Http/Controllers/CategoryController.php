<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id) {
        $books = Book::query()
            ->where('category_id', $id)
            ->get();
        return view('components.user.book.category-book',
                compact('books'));
    }
}

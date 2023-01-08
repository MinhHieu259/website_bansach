<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BookService;

class BookController extends Controller
{
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index() {
        $books = $this->bookService->findAll();
        return view('components.admin.books.index', compact('books'));
    }
}

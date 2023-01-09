<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_book = Book::all();


        return view('components.user.home', compact("all_book"));
    }

    public function detail ($id)
    {
        $book = Book::find($id);
        return view('components.user.book.detail', compact("book"));
    }
    public function accessDenied()
    {
        return view('errors.access-denied');
    }
}

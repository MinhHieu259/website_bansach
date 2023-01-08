<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Category;

class BookService
{
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    function findAll() {
        try {
            $categories = $this->category->get();
            return $categories ?? [];
        } catch (\Throwable $e) {
            report($e);
            return [];
        }
    }
}

<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Category;
use App\Models\Image;

class BookService
{
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    function findAll() {
        try {
            $books = $this->book->get();
            return $books ?? [];
        } catch (\Throwable $e) {
            report($e);
            return [];
        }
    }

    function save($data)
    {
        try {

            return true;
        } catch (\Throwable $e) {
            report($e);
            return false;
        }
    }

    function saveImages($list)
    {
        try {
            foreach ($list as $item) {
                Image::create($item);
            }
            return true;
        } catch (\Throwable $e) {
            report($e);
            return false;
        }
    }
}

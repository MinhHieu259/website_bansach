<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Image;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\PublisherService;

class BookController extends Controller
{
    public function __construct(BookService $bookService,
                                CategoryService $categoryService,
                                PublisherService $publisherService
    )
    {
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
        $this->publisherService = $publisherService;
    }

    public function index() {
        $books = Book::query()->paginate(5);

        return view('components.admin.books.index',
                    compact('books'));
    }

    public function create() {
        $categories = $this->categoryService->findAll();
        $publishers = $this->publisherService->findAll();
        return view('components.admin.books.create',
                    compact('categories', 'publishers'));
    }

    public function store(BookRequest $request) {
        if($request->has('file_upload')) {
            $file = $request->file_upload;
            $fileName = time().rand(1,100).'-'.'book'.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $request->merge(['book_avatar' => $fileName]);
        }

        $book = Book::create($request->all());
        $bookId = $book->id;

        $listFile = [];
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = $bookId.'_'.time().rand(1,100).'-'.'image'.'.'. $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $name);
                $listFile[] = [
                    'book_id' => $bookId,
                    'image' => $name
                ];
            }
            $this->bookService->saveImages($listFile);
        }
        return redirect()->route('admin.books');
    }

    public function show(Book $book) {
        $categories = $this->categoryService->findAll();
        $publishers = $this->publisherService->findAll();
        return view('components.admin.books.edit',
                compact('book','categories', 'publishers'));
    }

    public function update(BookRequest $request, Book $book) {
        $ids = json_decode($request->ids);
        if(!empty($ids)) {
            foreach ($ids as $id) {
                $imgFind = Image::find($id);
                unlink(public_path('uploads/'.$imgFind->image));
                $imgFind->delete();
            }
        }
        if($request->has('file_upload')) {
            // remove images
            $newBook = Book::find($book->id);
            if($newBook->book_avatar) {
                unlink(public_path('uploads/'.$newBook->book_avatar));
            }

            $file = $request->file_upload;
            $fileName = time().rand(1,100).'-'.'book'.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $request->merge(['book_avatar' => $fileName]);
        }

        $book->update($request->all());
        $bookId = $book->id;

        $listFile = [];
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = $bookId.'_'.time().rand(1,100).'-'.'image'.'.'. $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $name);
                $listFile[] = [
                    'book_id' => $bookId,
                    'image' => $name
                ];
            }
            $this->bookService->saveImages($listFile);
        }

        return redirect()->route('admin.books');
    }

    public function destroy(Book $book) {
        if($book->book_avatar) {
            unlink(public_path('uploads/'.$book->book_avatar));
        }
        foreach ($book->images as $image) {
            unlink(public_path('uploads/'.$image->image));
        }
        $book->delete();
        return redirect()->route('admin.books');
    }
}

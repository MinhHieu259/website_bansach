<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PublisherController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [PageController::class, 'index'])->name('homeAdmin');

    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}/edit', [CategoryController::class, 'show'])->name('admin.categories.edit');
        Route::put('/{category}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{category}/destroy', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::prefix('publishers')->group(function() {
        Route::get('/', [PublisherController::class, 'index'])->name('admin.publishers');
        Route::get('/create', [PublisherController::class, 'create'])->name('admin.publishers.create');
        Route::post('/store', [PublisherController::class, 'store'])->name('admin.publishers.store');
        Route::get('/{publisher}/edit', [PublisherController::class, 'show'])->name('admin.publishers.edit');
        Route::put('/{publisher}/update', [PublisherController::class, 'update'])->name('admin.publishers.update');
        Route::delete('/{publisher}/destroy', [PublisherController::class, 'destroy'])->name('admin.publishers.destroy');
    });


    Route::prefix('books')->group(function() {
        Route::get('/', [BookController::class, 'index'])->name('admin.books');
        Route::get('/create', [BookController::class, 'create'])->name('admin.books.create');
        Route::post('/store', [BookController::class, 'store'])->name('admin.books.store');
        Route::get('/{book}/edit', [BookController::class, 'show'])->name('admin.books.edit');
        Route::put('/{book}/update', [BookController::class, 'update'])->name('admin.books.update');
        Route::delete('/{book}/destroy', [BookController::class, 'destroy'])->name('admin.books.destroy');
    });
});


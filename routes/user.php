<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/detail/{id}', [App\Http\Controllers\PageController::class, 'detail'])->name('home.detail-book');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/order/{bookId}/addToCart', [CartController::class, 'addToCart'])->name('order.add');
    Route::post('/order/updateCart', [CartController::class, 'updateCart'])->name('order.update');
    Route::get('/order/deleteItemCart/{cart}', [CartController::class, 'delete'])->name('order.delete');
    //order
    Route::get('/order/{order}/check-out', [OrderController::class, 'checkOut'])->name('order.checkOut');
    Route::post('/order/place-order/{order}', [OrderController::class, 'placeOrder'])->name('order.place-order');
});

Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category');
Route::post('/search-result', [SearchController::class, 'search'])->name('search');
Route::get('/searchAjax', [SearchController::class, 'searchAjax'])->name('searchAjax');




//Authentication
//Login Basic
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/do-register', [AuthController::class, 'doRegister'])->name('doRegister');
Route::post('/do-login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Login Social
// Login Google
Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Login Facebook
Route::get('login/facebook', [AuthController::class, 'redirectFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [AuthController::class, 'handleFacebookCallback']);

//Forgot Password

<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');

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

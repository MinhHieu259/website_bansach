<?php

use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('loginPage');

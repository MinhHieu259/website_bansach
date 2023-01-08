<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('access-denied', [PageController::class, 'accessDenied'])->name('deniedAccess');

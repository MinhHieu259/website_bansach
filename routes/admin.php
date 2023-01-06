<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('homeAdmin');
});


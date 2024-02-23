<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('categories', CategoryController::class);
});
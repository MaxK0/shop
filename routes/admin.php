<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class);
});
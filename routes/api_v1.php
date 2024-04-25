<?php

use App\Http\Controllers\Api\V1\AuthorizationController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.v1.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('login', [AuthorizationController::class, 'login'])->name('login');
        Route::post('register', [AuthorizationController::class, 'register'])->name('register');
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', [UserController::class, 'authUser'])->name('user.auth');
    });
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
});

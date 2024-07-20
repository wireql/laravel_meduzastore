<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CodeController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product');
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add/{id}', [CartController::class, 'store']);
Route::post('/cart/delete/{id}', [CartController::class, 'delete']);

Route::middleware(['guest'])->group(function () {
    Route::post('/auth', [CodeController::class, 'check']);
    Route::post('/auth/code', [CodeController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin');
});
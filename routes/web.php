<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CodeController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::middleware(['guest'])->group(function () {
    Route::post('/auth', [CodeController::class, 'check']);
    Route::post('/auth/code', [CodeController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
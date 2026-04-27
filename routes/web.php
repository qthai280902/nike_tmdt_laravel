<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// B2C Catalog Routes
Route::prefix('catalog')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/products', [ProductController::class, 'index'])->name('catalog.index');
    Route::get('/products/{slug}', [ProductController::class, 'show'])->name('catalog.show');
});

Route::get('/checkout', [ProductController::class, 'index'])->name('checkout.index'); // Placeholder for view

// Auth Routes
Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

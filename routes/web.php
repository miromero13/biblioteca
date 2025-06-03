<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [AuthController::class, 'home'])->middleware('auth');
Route::get('/home', [BookController::class, 'index'])->name('home');
Route::get('/category/{id}', [BookController::class, 'showCategoryBooks'])->name('books.category');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/categories', [BookController::class, 'storeCategory'])->name('categories.store');

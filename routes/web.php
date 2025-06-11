<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Vista de presentación
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Ruta para la pantalla de carga (autologin)
Route::get('/loading', [AuthController::class, 'loading'])->name('loading')->middleware('auth');


// Rutas protegidas por autenticación
// Rutas para las subcategorías y los libros de la subcategoría
Route::middleware('auth')->group(function () {
    Route::get('/home', [BookController::class, 'index'])->name('home');
    Route::get('/category/{id}/subcategories', [BookController::class, 'showCategorySubcategories'])->name('categories.subcategories');
    Route::get('/subcategory/{id}/books', [BookController::class, 'showSubcategoryBooks'])->name('subcategories.books');

    Route::post('/books', [BookController::class, 'storeBook'])->name('books.store');
    Route::post('/categories', [BookController::class, 'storeCategory'])->name('categories.store');
    Route::post('/subcategories', [BookController::class, 'storeSubcategory'])->name('subcategories.store');
});

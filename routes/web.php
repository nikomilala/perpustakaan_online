<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('can:create books');
Route::post('/books', [BookController::class, 'store'])->name('books.store')->middleware('can:create books');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware('can:update books');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update')->middleware('can:update books');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('can:delete books');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create')->middleware('can:create authors');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store')->middleware('can:create authors');
Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit')->middleware('can:update authors');
Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update')->middleware('can:update authors');
Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy')->middleware('can:delete authors');

Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index');
Route::get('/publishers/create', [PublisherController::class, 'create'])->name('publishers.create')->middleware('can:create publishers');
Route::post('/publishers', [PublisherController::class, 'store'])->name('publishers.store')->middleware('can:create publishers');
Route::get('/publishers/{publisher}', [PublisherController::class, 'show'])->name('publishers.show');
Route::get('/publishers/{publisher}/edit', [PublisherController::class, 'edit'])->name('publishers.edit')->middleware('can:update publishers');
Route::put('/publishers/{publisher}', [PublisherController::class, 'update'])->name('publishers.update')->middleware('can:update publishers');
Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy'])->name('publishers.destroy')->middleware('can:delete publishers');

Route::get('/orders/create/{book}', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/{order}/return', [OrderController::class, 'return'])->name('orders.return');
Route::get('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

#route user
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('can:create users');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('can:create users');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('can:update users');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('can:update users');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('can:delete users');

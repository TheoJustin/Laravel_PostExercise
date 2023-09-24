<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'startup'])->name('startup');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/login_post', [UserController::class, 'login_post'])->name('login_post');
Route::post('/register_post', [UserController::class, 'register_post'])->name('register_post');

Route::middleware(['role:guest,member,admin'])->group(function () {
    Route::get('/home', [BookController::class, 'home'])->name('home');
    Route::get('/books/view', [BookController::class, 'viewBooks'])->name('viewBooks');
    Route::get('/books/view/search', [BookController::class, 'searchBooks'])->name('searchBooks');
    Route::get('/books/add', [BookController::class, 'addBooks'])->name('addBooks');
    Route::post('/books/add_post', [BookController::class, 'addBooks_post'])->name('addBooks_post');
    Route::get('/books/update/{book_id}', [BookController::class, 'updateBooks'])->name('updateBooks');
    Route::put('/books/update/{book_id}/put', [BookController::class, 'updateBooksPut'])->name('updateBooksPut');
    Route::delete('/books/delete/{book_id}', [BookController::class, 'deleteBooks'])->name('deleteBooks');
});

Route::middleware(['role:member,admin'])->group(function () {
    Route::get('/alats/view', [AlatController::class, 'viewAlats'])->name('viewAlats');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/users/view', [UserController::class, 'viewUsers'])->name('viewUsers');
    Route::get('/users/update/{book_id}', [UserController::class, 'updateUsers'])->name('updateUsers');
    Route::put('/users/update/{book_id}/put', [UserController::class, 'updateUsersPut'])->name('updateUsersPut');
});

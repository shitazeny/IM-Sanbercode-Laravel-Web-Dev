<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;

Route::get('/', function() {
  return view('home');
})->name('home');

Route::get('/genre', [userController::class, 'showGenre'])->name('genre');
Route::get('/book', [userController::class, 'showBook'])->name('book');

Route::get('/login', [loginController::class, 'create'])->name('login');
Route::post('/login', [loginController::class, 'store']);

Route::get('/register', [registerController::class, 'create'])->name('register');
Route::post('/register', [registerController::class, 'store']);
Route::get('/logoutaksi', [loginController::class, 'logoutaksi'])->middleware('auth')->name('logoutaksi');

Route::get('/user/home', function () {
    return view('user.home');
})->name('user.home');

Route::get('/user/profile', [userController::class, 'showProfile'])->name('user.profile');
Route::put('/user/profile', [userController::class, 'updateProfile'])->name('user.profile.edit');

Route::get('/user/genre', [userController::class, 'showGenreUser'])->name('user.genre');
Route::get('/user/book', [userController::class, 'showBookUser'])->name('user.book');
Route::get('/user/book/{id}', [userController::class, 'showBookDetail'])->name('user.book.detail');
Route::post('/user/books/{id}/comments', [userController::class, 'storeComment'])->middleware('auth')->name('user.book.comment');


Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin.home');

Route::get('/admin/genre', [adminController::class, 'showGenre'])->name('admin.genre');
Route::put('/admin/genre/edit/{id}', [adminController::class, 'updateGenre'])->name('admin.genre.edit');
Route::delete('/admin/genre/delete/{id}', [adminController::class, 'deleteGenre'])->name('admin.genre.delete');
Route::post('/admin/genre/add', [adminController::class, 'addGenre'])->name('admin.genre.add');

Route::get('/admin/book', [adminController::class, 'showBook'])->name('admin.book');
Route::put('/admin/book/edit/{id}', [adminController::class, 'updateBook'])->name('admin.book.edit');
Route::delete('/admin/book/delete/{id}', [adminController::class, 'deleteBook'])->name('admin.book.delete');
Route::post('/admin/book/add', [adminController::class, 'addBook'])->name('admin.book.add');

Route::delete('/admin/user/delete/{id}', [adminController::class, 'deleteUser'])->name('admin.user.delete');
Route::get('/admin/user', [adminController::class, 'showUser'])->name('admin.user');

Route::get('/admin/comments', [adminController::class, 'showComments'])->name('admin.comments');
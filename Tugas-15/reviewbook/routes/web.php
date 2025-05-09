<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenresController;

Route::get('/', [DashboardController::class, 'showHome'])->name('home');
Route::get('/Register', [FormController::class, 'showRegister'])->name('register');
Route::post('/Register/Add', [FormController::class, 'addRegister'])->name('register.add');
Route::get('/Welcome', [FormController::class, 'showWelcome'])->name('welcome');

Route::get('/Genre', [GenresController::class, 'showGenre'])->name('genre');
Route::put('/Genre_Update/{id}', [GenresController::class, 'updateGenre'])->name('genre.update');
Route::delete('/Genre_Delete/{id}', [GenresController::class, 'deleteGenre'])->name('genre.delete');
Route::post('/Genre_Add', [GenresController::class, 'addGenre'])->name('genre.add');

Route::get('/Master', function() {
  return view('layouts.master');
});
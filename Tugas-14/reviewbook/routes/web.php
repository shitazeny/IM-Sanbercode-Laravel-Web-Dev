<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'showHome'])->name('home');
Route::get('/Register', [FormController::class, 'showRegister'])->name('register');
Route::post('/Register/Add', [FormController::class, 'addRegister'])->name('register.add');
Route::get('/Welcome', [FormController::class, 'showWelcome'])->name('welcome');

Route::get('/Master', function() {
  return view('layouts.master');
});
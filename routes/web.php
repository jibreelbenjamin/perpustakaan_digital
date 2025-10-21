<?php

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController; 
use Illuminate\Support\Facades\Route;



Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('user_role:admin,moderator,staff')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
});
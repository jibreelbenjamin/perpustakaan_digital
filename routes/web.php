<?php

use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController; 
use Illuminate\Support\Facades\Route;



Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('user_role:admin,moderator,staff')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/pinjaman', [BorrowingController::class, 'index'])->name('daftar.pinjaman');
    Route::post('/pinjaman', [BorrowingController::class, 'add'])->name('daftar.pinjaman.add');
    Route::get('/pinjaman/{id}/detail', [BorrowingController::class, 'show'])->name('daftar.pinjaman.detail');
    Route::put('/pinjaman/{id}/update', [BorrowingController::class, 'update'])->name('daftar.pinjaman.update');
    Route::post('/pinjaman/{id}/patch', [BorrowingController::class, 'markAs'])->name('daftar.pinjaman.patch');
    Route::delete('/pinjaman/delete', [BorrowingController::class, 'destroy'])->name('daftar.pinjaman.delete');
    Route::get('/pinjaman/load', [BorrowingController::class, 'loadData'])->name('pinjaman.load');
});
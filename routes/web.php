<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
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
    
    Route::get('/buku', [BookController::class, 'index'])->name('daftar.buku');
    Route::post('/buku', [BookController::class, 'add'])->name('daftar.buku.add');
    Route::get('/buku/{id}/detail', [BookController::class, 'show'])->name('daftar.buku.detail');
    Route::put('/buku/{id}/update', [BookController::class, 'update'])->name('daftar.buku.update');
    Route::delete('/buku/delete', [BookController::class, 'destroy'])->name('daftar.buku.delete');
    Route::get('/buku/load', [BookController::class, 'loadData'])->name('buku.load');
    
    Route::get('/kategori', [CategoryController::class, 'index'])->name('daftar.kategori');
    Route::post('/kategori', [CategoryController::class, 'add'])->name('daftar.kategori.add');
    Route::get('/kategori/{id}/detail', [CategoryController::class, 'show'])->name('daftar.kategori.detail');
    Route::put('/kategori/{id}/update', [CategoryController::class, 'update'])->name('daftar.kategori.update');
    Route::delete('/kategori/delete', [CategoryController::class, 'destroy'])->name('daftar.kategori.delete');
    Route::get('/kategori/load', [CategoryController::class, 'loadData'])->name('kategori.load');
    
    Route::get('/user', [UserController::class, 'index'])->name('daftar.user');
    Route::post('/user', [UserController::class, 'add'])->name('daftar.user.add');
    Route::get('/user/{id}/detail', [UserController::class, 'show'])->name('daftar.user.detail');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('daftar.user.update');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('daftar.user.delete');
    Route::get('/user/load', [UserController::class, 'loadData'])->name('user.load');
});
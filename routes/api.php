<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\BorrowingController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/book/select', [BookController::class, 'search']);
Route::get('/category/select', [CategoryController::class, 'search']);
Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::middleware('role:admin')->group(function () {
        Route::post('/users', [UserController::class, 'store']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
    });   
    
    Route::middleware('role:admin,moderator')->group(function () {        
        Route::post('/book', [BookController::class, 'store']);
        Route::put('/book/{id}', [BookController::class, 'update']);
        Route::delete('/book/{id}', [BookController::class, 'destroy']);
        
        Route::post('/category', [CategoryController::class, 'store']);
        Route::put('/category/{id}', [CategoryController::class, 'update']);
        Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
    });
    
    Route::get('/book', [BookController::class, 'index']);
    Route::get('/book/{id}', [BookController::class, 'show']);
    
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);
    
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}/password', [UserController::class, 'updatePassword']);
    
    Route::get('/borrow', [BorrowingController::class, 'index']);
    Route::post('/borrow', [BorrowingController::class, 'store']);
    Route::get('/borrow/{id}', [BorrowingController::class, 'show']);
    Route::put('/borrow/{id}', [BorrowingController::class, 'update']);
    Route::patch('/borrow/{id}', [BorrowingController::class, 'updateStatus']);
    Route::delete('/borrow/{id}', [BorrowingController::class, 'destroy']);
    
    Route::post('/logout', [AuthController::class, 'logout']);

});





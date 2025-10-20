<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store']);
        Route::get('/users/{id}', [UserController::class, 'search']);
        Route::post('/users/{id}', [UserController::class, 'update']);
        Route::post('/users/{id}/role', [UserController::class, 'updateRole']);
        Route::post('/users/{id}/password', [UserController::class, 'updatePassword']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
    });   

    Route::middleware('role:admin,moderator')->group(function () {
        Route::get('tes', function (){
            return 'ok';
        });
    });
    
});





<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\API\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WhishlistController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('user', [UserController::class, 'update']);
    Route::get('books', [BookController::class, 'all']);    
    Route::get('book/{id}', [BookController::class, 'get']);    
});

Route::middleware(['auth:api', 'role:user'])->group(function () {
    Route::post('wishlist', [WhishlistController::class, 'set']);
});

Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::get('users', [UserController::class, 'getUsers']);
    Route::get('user/{id}', [UserController::class, 'get']);
    Route::put('book', [BookController::class, 'create']);    
    Route::post('book', [BookController::class, 'update']);       
    Route::delete('book', [BookController::class, 'delete']);       
});
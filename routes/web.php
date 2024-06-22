<?php

use Illuminate\Support\Facades\Route;
use App\Http\API\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('/books', [BookController::class, 'all']);    
Route::get('/book/{id}', [BookController::class, 'get']);  
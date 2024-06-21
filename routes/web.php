<?php

use Illuminate\Support\Facades\Route;
use App\Http\API\Controllers\AuthController;

Route::get('/', function () {
    return response()->json(['success' => 'false'], 401);
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
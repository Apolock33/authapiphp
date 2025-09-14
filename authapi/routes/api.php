<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('eu', [AuthController::class, 'me']);
});

Route::middleware(['auth:api', 'nivel:admin'])->prefix('admin')->group(function () {
    Route::get('/testeauthnivel', [AuthController::class, 'testeAuthNivel']);
});

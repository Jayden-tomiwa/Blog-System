<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// routes/api.php
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;

// Public APIs for mobile
Route::prefix('mobile')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{slug}', [PostController::class, 'show']);
    Route::post('/posts/{slug}/comments', [PostController::class, 'storeComment']);
    Route::get('/posts/{slug}/comments', [PostController::class, 'getComments']);
});

// JWT Authentication APIs for admin
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::middleware(['auth:api'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/profile', [AuthController::class, 'profile']);
    });
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

// route default bawaan laravel
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ✅ route untuk posts
Route::get('/posts', [PostController::class, 'index']);

// Detail post berdasarkan slug
Route::get('/posts/{slug}', [PostController::class, 'show']);
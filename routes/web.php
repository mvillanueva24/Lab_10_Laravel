<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::view('/posts/create', 'create');
Route::post('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::get('/today', [PostController::class, 'today']);


//Route::get('/posts/{id}', [PostController::class, 'show']);

Auth::routes();

Route::get(
    '/home', 
    [App\Http\Controllers\PostController::class, 'index'])->name('home');

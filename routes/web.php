<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function(){
    return redirect('/posts');
});

Route::get('/home', function(){
    return redirect('/posts');
});

Route::get('/posts', [PostController::class, 'index']);
Route::view('/posts/create', 'posts.create');
Route::post('/posts', [PostController::class, 'store']); //Modifiqué la ruta de /posts a /posts/create
Route::get('/posts/myPosts', [PostController::class, 'userPosts']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::post('/comments', [CommentController::class, 'store']); //pide poner GET


//Route::get('/today', [PostController::class, 'today']);

//Route::get('/posts/{id}', [PostController::class, 'show']);

Auth::routes();

Route::get(
    '/home', 
    [App\Http\Controllers\PostController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PostController::class, 'index'])->name('home');
// Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');;
});
Route::get('/products/{slug}', [PostController::class, 'show'])->name('posts.show');
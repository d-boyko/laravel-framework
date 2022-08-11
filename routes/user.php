<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('/user')->group(function () {
    Route::redirect('/', '/user/posts')->name('user');
    Route::get('/posts', [PostController::class, 'index'])->name('users.posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('users.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('users.posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('users.posts.show');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('users.posts.edit');
    Route::post('/posts/edit/{post}', [PostController::class, 'edit'])->name('users.posts.edit');
    Route::put('/posts', [PostController::class, 'update'])->name('users.posts.update');
    Route::delete('/posts', [PostController::class, 'delete'])->name('users.posts.delete');
    Route::put('/posts', [PostController::class, 'like'])->name('users.posts.like');
});

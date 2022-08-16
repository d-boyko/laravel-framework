<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::prefix('user')->middleware('auth', 'active')->group(function () {
Route::prefix('user')->group(function () {
    Route::redirect('/', '/user/posts')->name('user');

    Route::get('posts', [PostController::class, 'index'])->name('user.posts');
    Route::get('posts/create', [PostController::class, 'create'])->name('user.posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('posts/{posts}', [PostController::class, 'show'])->name('user.posts.show');
    Route::get('posts/{posts}/edit', [PostController::class, 'edit'])->name('user.posts.edit');
    Route::put('posts/{posts}', [PostController::class, 'update'])->name('user.posts.update');
    Route::delete('posts/{posts}', [PostController::class, 'delete'])->name('user.posts.delete');
    Route::put('posts/{posts}/like', [PostController::class, 'like'])->name('user.posts.like');
});

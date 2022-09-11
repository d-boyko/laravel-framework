<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function() {
    Route::prefix('user')->group(function () {
        Route::redirect('/', '/user/posts');
        Route::get('posts', [PostController::class, 'index'])->name('posts');
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('posts/{posts}', [PostController::class, 'show'])->name('posts.show');
        Route::get('posts/{posts}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('posts/{posts}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('posts/{posts}', [PostController::class, 'delete'])->name('posts.delete');
        Route::put('posts/{posts}/like', [PostController::class, 'like'])->name('posts.like');
    });
});

Route::name('role-and-user.')->group(function() {
    Route::prefix('role-model')->group(function() {
        Route::get('find-roles/{userId}', [RoleController::class, 'getUserRoles'])->name('get-user-roles');
        Route::get('find-roles-with-cond/{userId}', [RoleController::class, 'getRolesWithConditions'])->name('conditions-with-roles-get');
        Route::get('get-pivot-data/{userId}', [RoleController::class, 'getPivotColumns'])->name('get-pivot-columns');
    });
});

Route::name('post.')->group(function() {
    Route::prefix('post-model')->group(function() {
        Route::get('has-relations-with-user', [PostController::class, 'getRelations'])->name('has-relations-with-user');
        Route::get('has-relations-with-count-user', [PostController::class, 'getCountWithConditionRelations'])->name('has-relations-with-count-user');
        Route::get('has-where-relations', [PostController::class, 'getWhereHasRelations'])->name('get-where-has-relations');
        Route::get('posts-with-user-relations', [PostController::class, 'getPostsWithUserRelations'])->name('get-posts-with-user-relations');
        Route::get('posts-with-some-conditions', [PostController::class, 'getPostsWithConditions'])->name('get-posts-with-conditions');
        Route::get('posts-with-braces', [PostController::class, 'whereWithBraces'])->name('where-with-braces');
    });
});

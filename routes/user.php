<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::prefix('user-model')->group(function() {
    Route::get('create-after-soft-delete', [UserController::class, 'createAfterSoftDelete'])->name('user.create-after-soft-delete');
    Route::get('creating-by-replicating', [UserController::class, 'replicatingModels'])->name('user.replicating-models');
    Route::get('creating-by-replicating-without-some-fields', [UserController::class, 'nonReplicatingFields'])->name('user.non-replicating-fields');

    Route::get('select-all-columns', [UserController::class, 'getAllUsersColumns'])->name('user.get-all-users-columns');
    Route::get('select-user-by-like-clause', [UserController::class, 'getUsersInfoByLike'])->name('user.get-users-info-by-like');
    Route::get('select-current-user-by-id/{id}', [UserController::class, 'getUsersInfoById'])->name('user.get-current-user-info-by-id');
    Route::get('select-where-only-first-row', [UserController::class, 'getFirstRowWithResponse'])->name('user.get-first-row-with-response');
    Route::get('select-all-columns-by-chunks', [UserController::class, 'getUsersNamesByChunkSystem'])->name('user.get-users-info-by-chunk-system');
    Route::get('select-last-user-by-add-select', [UserController::class, 'getLastUserInfoBySubQuery'])->name('user.get-users-and-posts-info-by-sub-query');
    Route::get('select-first-user-with-condition', [UserController::class, 'getUserModelByfirstWhereMethod'])->name('user.get-user-model-byfirst-where-method');
    Route::get('select-with-first-or-method', [UserController::class, 'getUserModelWithFirstOrMethod'])->name('user.get-user-model-with-first-or-method');
    Route::get('select-or-create-user', [UserController::class, 'selectOrCreateUser'])->name('user.select-or-create-user');

    Route::get('refresh-users-info', [UserController::class, 'refreshUsersInfo'])->name('user.refresh-users-info');

    Route::get('get-post-by-user-model', [UserController::class, 'getPostByUserModel'])->name('user.get-post-by-user-model');
    Route::get('get-user-by-post-model', [UserController::class, 'getUserByPostModel'])->name('user.get-user-by-post-model');
    Route::get('get-user-name-by-post-model', [UserController::class, 'getUserNameByPost'])->name('user.get-user-name-by-post');
    Route::get('get-original-name-of-user-model', [UserController::class, 'getOriginalValue'])->name('user.get-original-value');

    Route::get('update-user-model', [UserController::class, 'updateUserModel'])->name('user.model-user-update');
    Route::get('update-users-by-chunks', [UserController::class, 'updateUsersByChunkId'])->name('user.update-users-by-chunk-id');
    Route::get('update-by-lazy', [UserController::class, 'updateUsersNamesByLazy'])->name('user.update-users-names-by-lazy');
    Route::get('update-massive-user-model', [UserController::class, 'massiveUpdateUserModel'])->name('user.massive-update-user-model');
    Route::get('update-or-create-user-model', [UserController::class, 'updateOrCreate'])->name('user.create-or-update');

    Route::get('delete-model', [UserController::class, 'deleteModel'])->name('user.delete-model');
    Route::get('delete-all-data', [UserController::class, 'truncateModel'])->name('user.truncate-model');
    Route::get('delete-by-destroy', [UserController::class, 'destroyModel'])->name('user.destroy-model');
    Route::get('delete-by-where-clause', [UserController::class, 'deleteByWhereClause'])->name('user.delete-by-where-clause');
    Route::get('delete-by-soft-deletes', [UserController::class, 'deleteBySoftDeletes'])->name('user.delete-by-soft-deletes');
    Route::get('delete-by-force-delete', [UserController::class, 'forceDelete'])->name('user.force-delete');

    Route::get('count-of-related-models', [UserController::class, 'getCountOfRelatedModels'])->name('user.get-count-of-related-models');
    Route::get('count-of-related-models-with-condition', [UserController::class, 'getCountOfRelatedModelsWithCondition'])->name('user.condition-with-models-related-of-count-get');
    Route::get('count-with-select-function', [UserController::class, 'getCountWithSelectFunction'])->name('user.get-count-with-select-function');
    Route::get('count-of-users', [UserController::class, 'getCountOfUsers'])->name('user.get-count-of-users');

    Route::get('is-dirty-or-clean', [UserController::class, 'isUserDirtyOrClean'])->name('user.clean-or-dirty-user-is');
    Route::get('is-model-changed', [UserController::class, 'isUserModelChanged'])->name('user.changed-model-user-is');
});

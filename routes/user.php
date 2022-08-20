<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

    Route::prefix('user-model')->group(function() {
        Route::get('create-after-soft-delete', [UserController::class, 'createAfterSoftDelete'])->name('create-after-soft-delete');
        Route::get('creating-by-replicating', [UserController::class, 'replicatingModels'])->name('replicating-models');
        Route::get('creating-by-replicating-without-some-fields', [UserController::class, 'nonReplicatingFields'])->name('non-replicating-fields');

        Route::get('select-all-columns', [UserController::class, 'getAllUsersColumns'])->name('get-all-users-columns');
        Route::get('select-user-by-like-clause', [UserController::class, 'getUsersInfoByLike'])->name('get-users-info-by-like');
        Route::get('select-current-user-by-id/{id}', [UserController::class, 'getUsersInfoById'])->name('get-current-user-info-by-id');
        Route::get('select-where-only-first-row', [UserController::class, 'getFirstRowWithResponse'])->name('get-first-row-with-response');
        Route::get('select-all-columns-by-chunks', [UserController::class, 'getUsersNamesByChunkSystem'])->name('get-users-info-by-chunk-system');
        Route::get('select-last-user-by-add-select', [UserController::class, 'getLastUserInfoBySubQuery'])->name('get-users-and-posts-info-by-sub-query');
        Route::get('select-first-user-with-condition', [UserController::class, 'getUserModelByfirstWhereMethod'])->name('get-user-model-byfirst-where-method');
        Route::get('select-with-first-or-method', [UserController::class, 'getUserModelWithFirstOrMethod'])->name('get-user-model-with-first-or-method');
        Route::get('select-or-create-user', [UserController::class, 'selectOrCreateUser'])->name('select-or-create-user');

        Route::get('refresh-users-info', [UserController::class, 'refreshUsersInfo'])->name('refresh-users-info');

        Route::get('get-post-by-user-model', [UserController::class, 'getPostByUserModel'])->name('get-post-by-user-model');
        Route::get('get-user-by-post-model', [UserController::class, 'getUserByPostModel'])->name('get-user-by-post-model');
        Route::get('get-user-name-by-post-model', [UserController::class, 'getUserNameByPost'])->name('get-user-name-by-post');
        Route::get('get-original-name-of-user-model', [UserController::class, 'getOriginalValue'])->name('get-original-value');

        Route::get('update-user-model', [UserController::class, 'updateUserModel'])->name('model-user-update');
        Route::get('update-users-by-chunks', [UserController::class, 'updateUsersByChunkId'])->name('update-users-by-chunk-id');
        Route::get('update-by-lazy', [UserController::class, 'updateUsersNamesByLazy'])->name('update-users-names-by-lazy');
        Route::get('update-massive-user-model', [UserController::class, 'massiveUpdateUserModel'])->name('massive-update-user-model');
        Route::get('update-or-create-user-model', [UserController::class, 'updateOrCreate'])->name('create-or-update');

        Route::get('delete-model', [UserController::class, 'deleteModel'])->name('delete-model');
        Route::get('delete-all-data', [UserController::class, 'truncateModel'])->name('truncate-model');
        Route::get('delete-by-destroy', [UserController::class, 'destroyModel'])->name('destroy-model');
        Route::get('delete-by-where-clause', [UserController::class, 'deleteByWhereClause'])->name('delete-by-where-clause');
        Route::get('delete-by-soft-deletes', [UserController::class, 'deleteBySoftDeletes'])->name('delete-by-soft-deletes');
        Route::get('delete-by-force-delete', [UserController::class, 'forceDelete'])->name('force-delete');

        Route::get('count-of-related-models', [UserController::class, 'getCountOfRelatedModels'])->name('get-count-of-related-models');
        Route::get('count-of-related-models-with-condition', [UserController::class, 'getCountOfRelatedModelsWithCondition'])->name('condition-with-models-related-of-count-get');
        Route::get('count-with-select-function', [UserController::class, 'getCountWithSelectFunction'])->name('get-count-with-select-function');
        Route::get('count-of-users', [UserController::class, 'getCountOfUsers'])->name('get-count-of-users');

        Route::get('is-dirty-or-clean', [UserController::class, 'isUserDirtyOrClean'])->name('clean-or-dirty-user-is');
        Route::get('is-model-changed', [UserController::class, 'isUserModelChanged'])->name('changed-model-user-is');
    });
});

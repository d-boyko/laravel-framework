<?php

use App\Http\Controllers\EloquentController;
use Illuminate\Support\Facades\Route;

Route::name('eloquent.')->group(function () {
    Route::prefix('eloquent')->group(function () {
        Route::get('/all-users-models', [EloquentController::class, 'getAllUsers'])->name('all-users');
        Route::get('/models-with-cond', [EloquentController::class, 'getModelsWithConditions'])->name('get-models-with-conditions');
        Route::get('/get-names', [EloquentController::class, 'getNamesOfUsers'])->name('get-names-of-users');
        Route::get('/fresh-users', [EloquentController::class, 'freshMethod'])->name('fresh-method');
        Route::get('/refresh-users', [EloquentController::class, 'refreshMethod'])->name('refresh-method');
        Route::get('/create-after-soft-delete', [EloquentController::class, 'createAfterSoftDelete'])->name('create-after-soft-delete');
        Route::get('/creating-by-replicating', [EloquentController::class, 'replicatingModels'])->name('replicating-models');
        Route::get('/creating-by-replicating-without-some-fields', [EloquentController::class, 'nonReplicatingFields'])->name('non-replicating-fields');

        Route::get('/select-all-columns', [EloquentController::class, 'getAllUsersColumns'])->name('get-all-users-columns');
        Route::get('/select-user-by-like-clause', [EloquentController::class, 'getUsersInfoByLike'])->name('get-users-info-by-like');
        Route::get('/select-current-user-by-id/{id}', [EloquentController::class, 'getUsersInfoById'])->name('get-current-user-info-by-id');
        Route::get('/select-where-only-first-row', [EloquentController::class, 'getFirstRowWithResponse'])->name('get-first-row-with-response');
        Route::get('/select-all-columns-by-chunks', [EloquentController::class, 'getUsersNamesByChunkSystem'])->name('get-users-info-by-chunk-system');
        Route::get('/select-last-user-by-add-select', [EloquentController::class, 'getLastUserInfoBySubQuery'])->name('get-users-and-posts-info-by-sub-query');
        Route::get('/select-first-user-with-condition', [EloquentController::class, 'getUserModelByfirstWhereMethod'])->name('get-user-model-byfirst-where-method');
        Route::get('/select-with-first-or-method', [EloquentController::class, 'getUserModelWithFirstOrMethod'])->name('get-user-model-with-first-or-method');
        Route::get('/select-or-create-user', [EloquentController::class, 'selectOrCreateUser'])->name('select-or-create-user');

        Route::get('/refresh-users-info', [EloquentController::class, 'refreshUsersInfo'])->name('refresh-users-info');

        Route::get('/get-post-by-user-model', [EloquentController::class, 'getPostByUserModel'])->name('get-post-by-user-model');
        Route::get('/get-user-by-post-model', [EloquentController::class, 'getUserByPostModel'])->name('get-user-by-post-model');
        Route::get('/get-user-name-by-post-model', [EloquentController::class, 'getUserNameByPost'])->name('get-user-name-by-post');
        Route::get('/get-original-name-of-user-model', [EloquentController::class, 'getOriginalValue'])->name('get-original-value');

        Route::get('/update-user-model', [EloquentController::class, 'updateUserModel'])->name('model-user-update');
        Route::get('/update-users-by-chunks', [EloquentController::class, 'updateUsersByChunkId'])->name('update-users-by-chunk-id');
        Route::get('/update-by-lazy', [EloquentController::class, 'updateUsersNamesByLazy'])->name('update-users-names-by-lazy');
        Route::get('/update-massive-user-model', [EloquentController::class, 'massiveUpdateUserModel'])->name('massive-update-user-model');
        Route::get('/update-or-create-user-model', [EloquentController::class, 'updateOrCreate'])->name('create-or-update');

        Route::get('/delete-model', [EloquentController::class, 'deleteModel'])->name('delete-model');
        Route::get('/delete-all-data', [EloquentController::class, 'truncateModel'])->name('truncate-model');
        Route::get('/delete-by-destroy', [EloquentController::class, 'destroyModel'])->name('destroy-model');
        Route::get('/delete-by-where-clause', [EloquentController::class, 'deleteByWhereClause'])->name('delete-by-where-clause');
        Route::get('/delete-by-soft-deletes', [EloquentController::class, 'deleteBySoftDeletes'])->name('delete-by-soft-deletes');
        Route::get('/delete-by-force-delete', [EloquentController::class, 'forceDelete'])->name('force-delete');

        Route::get('/count-of-related-models', [EloquentController::class, 'getCountOfRelatedModels'])->name('get-count-of-related-models');
        Route::get('/count-of-related-models-with-condition', [EloquentController::class, 'getCountOfRelatedModelsWithCondition'])->name('condition-with-models-related-of-count-get');
        Route::get('/count-with-select-function', [EloquentController::class, 'getCountWithSelectFunction'])->name('get-count-with-select-function');
        Route::get('/count-of-users', [EloquentController::class, 'getCountOfUsers'])->name('get-count-of-users');

        Route::get('/is-dirty-or-clean', [EloquentController::class, 'isUserDirtyOrClean'])->name('clean-or-dirty-user-is');
        Route::get('/is-model-changed', [EloquentController::class, 'isUserModelChanged'])->name('changed-model-user-is');
        Route::get('/is-test-sub-query', [EloquentController::class, 'testSubQueries'])->name('is-test-sub-query');

        Route::get('/find-phone/{userId}', [EloquentController::class, 'findUserPhone'])->name('find-user-phone');
    });
});

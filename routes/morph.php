<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MorphController;

Route::name('morph.')->group(function() {
    Route::prefix('morph')->group(function() {
        Route::get('/get-video', [MorphController::class, 'getVideo'])->name('get-video');
        Route::get('/get-parent', [MorphController::class, 'getParentLikeObject'])->name('get-parent-like-object');
        Route::get('/get-many-comments', [MorphController::class, 'getVideosWithComments'])->name('get-videos-with-comments');
        Route::get('/get-parent-morph-many', [MorphController::class, 'getParentMorphManyObject'])->name('get-parent-morph-many');
        Route::get('/get-more-relations', [MorphController::class, 'getTagsBySocialPost'])->name('get-more-relations');
    });
});

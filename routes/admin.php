<?php

use App\Http\Middleware\AbortIfNotAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

Route::prefix('admin-snapshot')->group(function() {
    Route::group(['middleware' => AbortIfNotAdminMiddleware::class], function() {
        Route::get('/{id}/profile', [UserController::class, 'getProfile'])->name('user.profile');
        Route::get('/{id}/orders', [UserController::class, 'getUserOrders'])->name('user.order');
        Route::get('/orders/list', [OrderController::class, 'getOrdersList'])->name('orders.list');
        Route::get('/order/{id}', [OrderController::class, 'getCurrentOrder'])->name('order.user');
        Route::get('/user/list', [UserController::class, 'getUsersList'])->name('user.list');
        Route::get('/update-user/{id}/{field}/{newValue}', [UserController::class, 'update'])->name('admin.update-user');
    });
});

Route::prefix('admin')->group(function() {
    Route::group(['middleware' => AbortIfNotAdminMiddleware::class], function() {
        Route::get('/menu/', [AdminController::class, 'index'])->name('admin.functions');
        Route::get('/menu/export-csv/users', [AdminController::class, 'exportUsersCsv'])->name('csv-users-export');
        Route::get('/menu/export-csv/posts', [AdminController::class, 'exportPostsCsv'])->name('csv-posts-export');
    });
});

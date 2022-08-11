<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\RedirectIfNotAdmin;

Route::prefix('admin-snapshot')->group(function() {
    Route::group(['middleware' => RedirectIfNotAdmin::class], function() {
        Route::get('/{id}/profile', [UserController::class, 'getProfile'])->name('user.profile');
        Route::get('/{id}/orders', [UserController::class, 'getUserOrders'])->name('user.order');
        Route::get('/orders/list', [OrderController::class, 'getOrdersList'])->name('orders.list');
        Route::get('/order/{id}', [OrderController::class, 'getCurrentOrder'])->name('order.user');
        Route::get('/user/list', [UserController::class, 'getUsersList'])
            ->middleware(RedirectIfNotAdmin::class)
            ->name('user.list');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\RedirectIfNotAdmin;

Route::get('/users/list', [UserController::class, 'getUsersList'])
    ->middleware(RedirectIfNotAdmin::class)
    ->name('users.list');

Route::prefix('user-snapshot')->group(function() {
    Route::group(['middleware' => RedirectIfNotAdmin::class], function() {
        Route::redirect('/{id}', '/');
        Route::get('/{id}/profile', [UserController::class, 'getProfile'])->name('users.profile');
        Route::get('/{id}/orders', [UserController::class, 'getUserOrders'])->name('users.order');
        Route::get('/orders/list', [OrderController::class, 'getOrdersList'])->name('orders.list');
        Route::get('/order/{id}', [OrderController::class, 'getCurrentOrder'])->name('order.user');
    });
});

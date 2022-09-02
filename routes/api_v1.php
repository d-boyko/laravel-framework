<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\IndexController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('last-version');

Route::get('/all-paginate', [IndexController::class, 'allPagination'])->name('pagination-all');

Route::get('/all', [IndexController::class, 'all'])->name('all-versions');

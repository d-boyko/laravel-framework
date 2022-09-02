<?php

use App\Http\Controllers\Api\V1\DeskController;
use App\Http\Controllers\Api\V1\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::apiResources([
    'desks' => DeskController::class
]);

//Route::get('/desks', [DeskController::class, 'index'])->name('desk.index');
//Route::get('/desks/{id}', [DeskController::class, 'show'])->name('desk.show');

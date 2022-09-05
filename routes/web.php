<?php

use App\Http\Controllers\DiggingDeeperController;
use App\Http\Controllers\MorphController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home.index');
})->name('home');

Route::get('/private', [UserController::class, 'getPrivatePage'])->middleware('auth')->name('private-page');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password.store');

Route::get('users/list', [AdminController::class, 'listOfUsers'])->name('users.list');
Route::get('users/{id}', [AdminController::class, 'showUser'])->name('users.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{posts}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/posts/list', [PostController::class, 'getPosts'])->name('posts.list');
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create');

Route::get('/users/test/models', [UserController::class, 'test']);

Route::get('/test-export', [UserController::class, 'testCsv'])->name('test-csv');

Route::prefix('collections')->group(function () {
    Route::get('/test-col', [DiggingDeeperController::class, 'collections'])->name('digging-deeper.collections');
});

Route::name('morph.')->group(function() {
    Route::prefix('morph')->group(function() {
        Route::get('get-video', [MorphController::class, 'getVideo'])->name('get-video');
        Route::get('get-parent', [MorphController::class, 'getParentLikeObject'])->name('get-parent-like-object');
        Route::get('get-many-comments', [MorphController::class, 'getVideosWithComments'])->name('get-videos-with-comments');
        Route::get('get-parent-morph-many', [MorphController::class, 'getParentMorphManyObject'])->name('get-parent-morph-many');
    });
});

Route::fallback(function () {
    return redirect(route('home'));
});

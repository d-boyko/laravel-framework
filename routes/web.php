<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

//Route::view('/', 'home.index')->name('home');

Route::get('/', function() {
    return view('home.index');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{posts}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/posts/list', [PostController::class, 'getPosts'])->name('posts.list');

Route::get('/users/test/models', [UserController::class, 'test']);

Route::fallback(function () {
    return view('home.index');
});

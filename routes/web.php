<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;

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

Route::get('/test', [TestController::class, 'index'])->name('test.index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{posts}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/documentation', function() {
    return view('documentation');
})->name('documentation');

Route::get('/posts/list', [PostController::class, 'getPosts'])
->name('posts.list');

//Route::get('/', function() {
//    \App\Jobs\VeryLongJob::dispatch('TEST_MESSAGE');
//});

Route::fallback(function () {
    return view('home');
});

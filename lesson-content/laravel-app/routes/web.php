<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\MainController::class, "main"])->name('main');
Route::get('/hello/world/from/php/course/123', [\App\Http\Controllers\MainController::class, "main"])->name('hello');
Route::post('/ajax', [\App\Http\Controllers\MainController::class, "ajax"]);
Route::any('/signup', [\App\Http\Controllers\MainController::class, "signup"]);
Route::any('/login', [\App\Http\Controllers\MainController::class, "login"])->name('login');
Route::get('/authorised2', [\App\Http\Controllers\AuthorisedController::class, "private"])
->middleware('auth');

Route::resource('posts', \App\Http\Controllers\PostController::class);




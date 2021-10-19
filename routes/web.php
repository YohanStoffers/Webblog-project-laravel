<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
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
// User Controllers
Route::get('/', [UsersController::class, 'index']);



Route::get('/users/create', [UsersController::class, 'create'])->name('users/create')->middleware('guest');
Route::post('/users', [UsersController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');


// Article rout to get a single article view
Route::get('/articles/{articles}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/article/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticlesController::class, 'store']);


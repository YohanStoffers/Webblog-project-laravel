<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
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


// All user related routes

Route::get('/user/create', [UsersController::class, 'create'])->name('user.create')->middleware('guest');
Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');

Route::post('/users', [UsersController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

// Article routes

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/article/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::get('/articles/{articles}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::get('/articles/{article}/destroy', [ArticlesController::class, 'destroy'])->name('articles.destroy');
Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.store');
Route::post('/articles/{article}', [ArticlesController::class, 'update']);

Route::post('/categories', [CategoriesController::class, 'show'])->name('categories.show');

Route::post('/articles/{article}/comment', [CommentsController::class, 'store'])->name('comment.store');
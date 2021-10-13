<?php

use App\Http\Controllers\ArticlesController;
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
Route::get('Register', [UsersController::class, 'create'])->name('Register');
Route::post('Make-account', [UsersController::class, 'store']);

// Article Controllers
Route::get('Articles', [ArticlesController::class, 'index'])->name('Articles');


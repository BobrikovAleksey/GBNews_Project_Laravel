<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, NewsController};

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('Home');

Route::get('/single', [NewsController::class, 'show'])->name('news');

Route::prefix('news')->name('News.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('Index');
    Route::get('/show/{slug}', [NewsController::class, 'show'])->name('Show');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('Category');
});

Auth::routes();

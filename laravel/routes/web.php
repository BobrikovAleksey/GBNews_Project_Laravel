<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ContactController, HomeController, NewsController};
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/show/{slug}', [NewsController::class, 'show'])->name('show');
    Route::get('/{slug}', [NewsController::class, 'index'])->name('category');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/news', AdminNewsController::class);
});

Auth::routes();

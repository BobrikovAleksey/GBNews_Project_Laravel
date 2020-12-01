<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FeedbackController, HomeController, NewsController};
use App\Http\Controllers\Admin\{CategoryController as AdminCategoryController,
    FeedbackController as AdminFeedbackController,
    NewsController as AdminNewsController,
    SourceController as AdminSourceController};

/**
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

Route::prefix('feedback')->name('feedback.')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('index');
    Route::post('/', [FeedbackController::class, 'store'])->name('store');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/show/{slug}', [NewsController::class, 'show'])->name('show');
    Route::get('/{slug}', [NewsController::class, 'index'])->name('category');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/feedback', AdminFeedbackController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/source', AdminSourceController::class);
});

Auth::routes();

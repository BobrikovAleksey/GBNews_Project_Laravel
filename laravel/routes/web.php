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
    return redirect()->route('Home');
});

Route::get('/home', [HomeController::class, 'index'])->name('Home');

Route::prefix('contact')->name('Contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('Index');
    Route::post('/', [ContactController::class, 'store'])->name('Store');
});

Route::prefix('news')->name('News.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('Index');
    Route::get('/show/{slug}', [NewsController::class, 'show'])->name('Show');
    Route::get('/{slug}', [NewsController::class, 'index'])->name('Category');
});

Route::prefix('admin')->name('Admin.')->group(function () {
    Route::resource('/news', AdminNewsController::class);
});

Auth::routes();

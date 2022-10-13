<?php

use App\Http\Controllers\ShowTopPageController;
use App\Http\Controllers\ShowBooksController;
use App\Http\Controllers\ShowBookDetailController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//トップ画面を表示する
Route::get('/top', [ShowTopPageController::class, 'showTopPage'])->name('show.top');

//商品一覧を表示する
Route::get('/books', [ShowBooksController::class, 'showBooks'])->name('books.index');

//商品詳細を表示する
Route::get('/books/show/{book}', [ShowBookDetailController::class, 'showDetail'])->name('book.show');

//商品をカートに追加する


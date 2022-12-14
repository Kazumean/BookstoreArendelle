<?php

use App\Http\Controllers\AddItemController;
use App\Http\Controllers\DeleteItemController;
use App\Http\Controllers\ShowTopPageController;
use App\Http\Controllers\ShowBooksController;
use App\Http\Controllers\ShowBookDetailController;
use App\Http\Controllers\ShowCartController;
use App\Http\Controllers\OrderConfirmController;
use App\Http\Controllers\OrderController;
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

//カート画面を表示する
Route::get('/showCart', [ShowCartController::class, 'showCart'])->name('book.showCart');

//商品をカートに追加する
Route::post('/addItem', [AddItemController::class, 'addItem'])->name('book.addItem');

//カートから商品を削除する
Route::delete('/deleteItem/{orderItem_id}', [DeleteItemController::class, 'deleteItem'])->name('book.deleteItem');

//注文確認画面に遷移する
Route::get('/showOrderConfirm', [OrderConfirmController::class, 'orderConfirm'])->name('book.orderConfirm');

//注文を確定する
Route::get('/order', [OrderController::class, 'createOrder']);
Route::post('/order', [OrderController::class, 'createOrder'])->name('create_order');
<?php

use App\Http\Controllers\EditController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// 部品一覧を表示する
Route::get('/home',[PartsController::class,'index'])->name('home');
// 部品の登録画面を表示する
Route::get('/register',[RegisterController::class,'index']);
// 部品の編集画面を表示する
Route::get('/edit/{id}',[EditController::class,'index']);
// 部品の登録を実行する
Route::post('/store',[RegisterController::class,'store'])->name('store');
// 部品の削除を実行する
Route::post('/delete/{id}',[PartsController::class,'destroy'])->name('delete');
// 部品の編集を実行する
Route::post('/edit/{id}',[EditController::class,'edit'])->name('edit');
// 検索機能を実行する
Route::get('/',[PartsController::class,'search'])->name('search');
// 入庫機能を実行する
Route::post('/edit/plus/{id}',[EditController::class,'plus'])->name('plus');
// 出庫機能を実行する
Route::post('/edit/minus/{id}',[EditController::class,'minus'])->name('minus');



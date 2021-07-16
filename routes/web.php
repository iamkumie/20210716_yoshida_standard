<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// 管理システムページ
Route::get('/', [ContactController::class, 'system']);
Route::get('/', [ContactController::class, 'search']);
Route::get('/delete', [ContactController::class, 'delete']);
Route::post('/delete', [ContactController::class, 'remove']);

// 入力ページ
Route::get('/contact', [ContactController::class, 'index']);

// 確認ページ
Route::post('/contact/confirm', [ContactController::class, 'confirm']);
Route::get('/contact/confirm', [ContactController::class, 'confirm']);

// 送信完了ページ
Route::post('/contact/thanks', [ContactController::class, 'thanks']);
Route::get('/contact/thanks', [ContactController::class, 'thanks']);

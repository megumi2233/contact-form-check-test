<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactTestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

// 入力フォーム
Route::get('/', [ContactTestController::class, 'index'])->name('inquiry.form');

// 確認画面
Route::post('/confirm', [ContactTestController::class, 'confirm'])->name('inquiry.confirm');

// 完了画面
Route::post('/thanks', [ContactTestController::class, 'thanks'])->name('inquiry.thanks');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

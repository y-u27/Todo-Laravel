<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// 新規登録フォーム
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.form');

// 新規登録
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// ログインフォーム表示
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');

// ログイン処理
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ログアウト処理
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// ログインしないとできない処理
Route::middleware(['auth'])->group(function () {
  // データ取得→一覧表示
  Route::get('/todos', [TodoController::class, 'index']);

  // データ保存
  Route::post('/todos', [TodoController::class, 'store']);

  // データ編集画面
  Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');

  // データ更新
  Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');

  // データ削除
  Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
});

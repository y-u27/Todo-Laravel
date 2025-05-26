<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

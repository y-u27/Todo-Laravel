<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// データ取得
Route::get('/todos', [TodoController::class, 'index']);

// データ保存
Route::post('/todos', [TodoController::class, 'store']);

// データ更新
Route::put('/todos', [TodoController::class, 'update']);

// データ削除
Route::delete('/todos', [TodoController::class, 'destory']);

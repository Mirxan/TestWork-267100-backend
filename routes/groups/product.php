<?php
use App\Http\Controllers\Api\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::post('/', [ProductController::class, 'store']);
Route::put('/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/{id}', [ProductController::class, 'destroy'])->where('id', '[0-9]+');
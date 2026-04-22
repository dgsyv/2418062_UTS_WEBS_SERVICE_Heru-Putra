<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\bukuController;

Route::get('/buku', [bukuController::class, 'index']);
Route::get('/buku/{id}', [bukuController::class, 'show']);
Route::post('/buku', [bukuController::class, 'store']);
Route::put('/buku/{id}', [bukuController::class, 'update']);
Route::delete('/buku/{id}', [bukuController::class, 'destroy']);

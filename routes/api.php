<?php

use App\Http\Controllers\AdminDataProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// admin
Route::get('/data-produk', [AdminDataProdukController::class, 'index']);
Route::post('/add-produk', [AdminDataProdukController::class, 'addProduk']);

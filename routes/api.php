<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDataProdukController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/login');
Route::get('register', [AuthController::class, 'viewRegister']);

// user
Route::get('/', [UserController::class, 'index'])->name('user');
Route::get('/produk/{id}', [UserController::class, 'produkDetail'])->name('user.detailProduk');
// admin
Route::get('/admin-dashboard', [AdminController::class, 'DashboardAdmin']);
Route::get('/data-produk', [AdminDataProdukController::class, 'index']);
Route::post('/add-produk', [AdminDataProdukController::class, 'addProduk']);

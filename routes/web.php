<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDataProdukController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.landingPage');
});

// user
Route::get('/login', function () {
    return view('User.loginUser');
});
Route::get('/register', [AuthController::class, 'viewRegister']);

// admin
Route::get('/admin-dashboard', [AdminController::class, 'DashboardAdmin']);
Route::get('/admin-product', [AdminDataProdukController::class, 'index'])->name('admin.produk');
Route::get('/admin-addProduk', [AdminDataProdukController::class, 'showAddProduk'])->name('admin.showProduk');
Route::post('/admin-addProduk', [AdminDataProdukController::class, 'addProduk'])->name('admin.addProduk');
Route::get('/admin-editProduk/{id}', [AdminDataProdukController::class, 'editProduk'])->name('admin.editProduk');
Route::post('/admin-editProduk/{id}', [AdminDataProdukController::class, 'updateProduk'])->name('admin.updateProduk');
Route::delete('/admin-destroyProduk/{id}', [AdminDataProdukController::class, 'destroyProduk'])->name('admin.destroyProduk');

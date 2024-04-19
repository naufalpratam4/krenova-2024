<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDataProdukController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// user
Route::get('/', [UserController::class, 'index'])->name('user');
Route::get('/produk/{id}', [UserController::class, 'produkDetail'])->name('user.produkDetail');
Route::get('/login', [AuthController::class, 'viewLogin'])->name('view.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'viewRegister'])->name('view.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/home', [UserController::class, 'home'])->middleware('isLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
// admin
Route::get('/admin-dashboard', [AdminController::class, 'DashboardAdmin']);
Route::get('/admin-product', [AdminDataProdukController::class, 'index'])->name('admin.produk');
Route::get('/admin-addProduk', [AdminDataProdukController::class, 'showAddProduk'])->name('admin.showProduk');
Route::post('/admin-addProduk', [AdminDataProdukController::class, 'addProduk'])->name('admin.addProduk');
Route::get('/admin-editProduk/{id}', [AdminDataProdukController::class, 'editProduk'])->name('admin.editProduk');
Route::post('/admin-editProduk/{id}', [AdminDataProdukController::class, 'updateProduk'])->name('admin.updateProduk');
Route::delete('/admin-destroyProduk/{id}', [AdminDataProdukController::class, 'destroyProduk'])->name('admin.destroyProduk');

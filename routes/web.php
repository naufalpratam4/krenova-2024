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
// admin-produk
Route::get('/admin-product', [AdminDataProdukController::class, 'index'])->name('admin.produk');
Route::get('/admin-addProduk', [AdminDataProdukController::class, 'showAddProduk'])->name('admin.showProduk');
Route::post('/admin-addProduk', [AdminDataProdukController::class, 'addProduk'])->name('admin.addProduk');
Route::get('/admin-editProduk/{id}', [AdminDataProdukController::class, 'editProduk'])->name('admin.editProduk');
Route::post('/admin-editProduk/{id}', [AdminDataProdukController::class, 'updateProduk'])->name('admin.updateProduk');
Route::delete('/admin-destroyProduk/{id}', [AdminDataProdukController::class, 'destroyProduk'])->name('admin.destroyProduk');


// admin-kategori
Route::get('/admin-kategori-produk', [AdminController::class, 'ViewKategori'])->name('admin.kategori');
Route::get('/admin-addKategori', [AdminController::class, 'ViewAddKategori'])->name('admin.addKategori');
Route::post('/admin-addKategori', [AdminController::class, 'AddKategori'])->name('admin.addKategoriPost');
Route::get('/admin-editKategori/{id}', [AdminController::class, 'viewEditKategori'])->name('admin.editKategoriView');
Route::post('/admin-editKategori/{id}', [AdminController::class, 'EditKategori'])->name('admin.editKategoriPost');
Route::delete('/admin-destroyKategori/{id}', [AdminController::class, 'deleteKategori'])->name('admin.deleteKategori');

// admin-penjual
Route::get('admin-penjual', [AdminController::class, 'penjual']);
Route::get('admin-detailPenjual/{id}', [AdminController::class, 'detailpenjual'])->name('admin.detailPenjual');
Route::get('admin-detailNexPenjual/{id}', [AdminController::class, 'detailNextPenjual'])->name('admin.detailNextPenjual');
// admin-user
Route::get('/admin-user', [AdminController::class, 'userAdmin'])->name('admin.user');
Route::get('/admin/add-user', function () {
    return view('Admin.DataUser.AddUser');
});

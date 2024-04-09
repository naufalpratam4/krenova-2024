<?php

use App\Http\Controllers\AdminDataProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.landingPage');
});



// admin
Route::get('/admin-dashboard', function () {
    return view('Admin.DataProduk.dashboardUser');
});
Route::get('/admin-product', [AdminDataProdukController::class, 'index'])->name('admin.produk');
Route::get('/admin-addProduk', [AdminDataProdukController::class, 'showAddProduk'])->name('admin.showProduk');
Route::post('/admin-addProduk', [AdminDataProdukController::class, 'addProduk'])->name('admin.addProduk');

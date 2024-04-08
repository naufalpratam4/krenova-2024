<?php

use App\Http\Controllers\AdminDataProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.landingPage');
});




Route::get('/admin-dashboard', function () {
    return view('User.DataProduk.dashboardUser');
});
Route::get('/admin-product', [AdminDataProdukController::class, 'index'])->name('admin.produk');

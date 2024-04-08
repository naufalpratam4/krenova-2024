<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.landingPage');
});




Route::get('/admin-dashboard', function () {
    return view('User.dashboardUser');
});
Route::get('/admin-product', function () {
    return view('User.Products');
});

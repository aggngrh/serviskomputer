<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/customer',\App\Http\Controllers\CustomerController::class);
Route::resource('/pegawai',\App\Http\Controllers\PegawaiController::class);

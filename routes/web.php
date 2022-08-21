<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;

Route::get('/', [DataController::class, 'index'])->name('index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DataController::class, 'dashboard'])->name('dashboard');

    //user account
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //barang
    Route::get('/barangs', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barangs/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barangs/{barang}', [BarangController::class, 'show']);
    Route::put('/barangs/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barangs/{barang}', [BarangController::class, 'destroy']);

    //user
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    //penjualan
    Route::get('/penjualans', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::post('/penjualans/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualans/{penjualan}', [PenjualanController::class, 'show']);
    Route::put('/penjualans/{penjualan}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/penjualans/{penjualan}', [PenjualanController::class, 'destroy']);

});
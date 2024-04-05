<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EOQController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiJualController;
use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TambahTransaksiController;
use App\Http\Controllers\TotalTransaksiJualController;

// starting
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/messages', [MessageController::class, 'index'])->middleware('auth');

Route::get('/', [LoginController::class, 'loginSucces'])->middleware('auth');

// show Data
Route::get('/data_karyawan', [EmployerController::class, 'index'])->middleware('owner');
Route::get('/data_stok', [StokController::class, 'index'])->middleware('auth');
Route::get('/data_supplier', [SupplierController::class, 'index'])->middleware('notKaryawan');
Route::get('/data_transaksi', [TotalTransaksiJualController::class, 'index'])->middleware('auth');
Route::get('/data_transaksi_masuk', [TransaksiMasukController::class, 'index'])->middleware('notKaryawan');
Route::get('/eoq', [EOQController::class, 'index'])->middleware('owner');


// show Detail
Route::get('/detail_karyawan/{id_user:id_user}', [EmployerController::class, 'show'])->middleware('owner');
Route::get('/detail_stok/{id_stok:id_stok}', [StokController::class, 'show'])->middleware('auth');
Route::get('/detail_supplier/{id_supplier:id_supplier}', [SupplierController::class, 'show'])->middleware('notKaryawan');
Route::get('/detail_transaksi/{id_transaksi:id_transaksi}', [TransaksiJualController::class, 'index'])->middleware('auth');
Route::get('/detail_transaksi_masuk/{id_transaksi_masuk:id_transaksi_masuk}', [TransaksiMasukController::class, 'show'])->middleware('auth');
Route::get('/detail_eoq/{id_eoq:id_eoq}', [EOQController::class, 'show'])->middleware('owner');


// Update Password
Route::get('/update_password/{id_user:id_user}', [EmployerController::class, 'editPassword'])->middleware('owner');
Route::post('/update_password/{id_user:id_user}', [EmployerController::class, 'updatePassword']);


// edit
Route::get('/edit_karyawan/{id_user:id_user}', [EmployerController::class, 'edit'])->middleware('owner');
Route::post('/edit_karyawan/{id_user:id_user}', [EmployerController::class, 'update']);

Route::get('/edit_stok/{id_stok:id_stok}', [StokController::class, 'edit'])->middleware('owner');
Route::post('/edit_stok/{id_stok:id_stok}', [StokController::class, 'update']);

Route::get('/edit_supplier/{id_supplier:id_supplier}', [SupplierController::class, 'edit'])->middleware('owner');
Route::post('/edit_supplier/{id_supplier:id_supplier}', [SupplierController::class, 'update']);


// Tambah
Route::get('/tambah_karyawan', [EmployerController::class, 'tambahKaryawan'])->middleware('owner');
Route::post('/tambah_karyawan', [EmployerController::class, 'store']);

Route::get('/tambah_stok', [TambahTransaksiController::class, 'indexTambahStokLama'])->middleware('notKaryawan');
Route::post('/tambah_stok', [TambahTransaksiController::class, 'storeTambahStokLama']);

Route::get('/tambah_stok_baru', [TambahTransaksiController::class, 'indexTambahStokBaru'])->middleware('notKaryawan');
Route::post('/tambah_stok_baru', [TambahTransaksiController::class, 'storeTambahStokBaru']);

Route::get('/tambah_supplier', [SupplierController::class, 'tambahSupplier'])->middleware('notKaryawan');
Route::post('/tambah_supplier', [SupplierController::class, 'storeSupplier']);

Route::get('/tambah_transaksi', [TambahTransaksiController::class, 'transaksiKeluar'])->middleware('auth');
Route::post('/tambah_transaksi', [TambahTransaksiController::class, 'storeTransaksi']);

Route::get('/tambah_eoq', [EOQController::class, 'tambahEOQ'])->middleware('owner');
Route::get('/ajax/{nama}', [EOQController::class, 'ajax']);
Route::post('/tambah_eoq', [EOQController::class, 'storeEOQ']);

// filter
Route::get('/data_transaksi/{request}', [TotalTransaksiJualController::class, 'filterShow'])->middleware('auth');

Route::post('/data_karyawan/{username:username}', [EmployerController::class, 'destroy'])->middleware('owner');
Route::post('/detail_eoq/{id_eoq:id_eoq}', [EOQController::class, 'destroy'])->middleware('owner');

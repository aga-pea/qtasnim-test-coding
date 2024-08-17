<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('index');

Route::resource('transaksi', TransaksiController::class);
Route::resource('barang', BarangController::class);
Route::resource('jenis_barang', JenisBarangController::class);

Route::get('/transaksi/search', [TransaksiController::class, 'search'])->name('transaksi.search');

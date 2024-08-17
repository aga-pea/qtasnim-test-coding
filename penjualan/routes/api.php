<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Transaksi Routes
Route::prefix('transaksis')->group(function () {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::post('/', [TransaksiController::class, 'store']);
    Route::get('{id}', [TransaksiController::class, 'show']);
    Route::put('{id}', [TransaksiController::class, 'update']);
    Route::delete('{id}', [TransaksiController::class, 'destroy']);
});

// Barang Routes
Route::prefix('barangs')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('{id}', [BarangController::class, 'show']);
    Route::put('{id}', [BarangController::class, 'update']);
    Route::delete('{id}', [BarangController::class, 'destroy']);
});

// JenisBarang Routes
Route::prefix('jenis-barangs')->group(function () {
    Route::get('/', [JenisBarangController::class, 'index']);
    Route::post('/', [JenisBarangController::class, 'store']);
    Route::get('{id}', [JenisBarangController::class, 'show']);
    Route::put('{id}', [JenisBarangController::class, 'update']);
    Route::delete('{id}', [JenisBarangController::class, 'destroy']);
});
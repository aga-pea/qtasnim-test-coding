<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Retrieve a list of all transactions
    public function index()
    {
        $transaksis = Transaksi::all()->map(function ($transaksi) {
            return [
                'id' => $transaksi->id,
                'barang_id' => $transaksi->barang_id,
                'jumlah_terjual' => $transaksi->jumlah_terjual,
                'tanggal_transaksi' => $transaksi->tanggal_transaksi->format('Y-m-d'), // Format date
                'stok' => $transaksi->stok,
                'jenis_barang_id' => $transaksi->jenis_barang_id,
            ];
        });

        return response()->json($transaksis);
    }

    // Create a new transaction
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_terjual' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
            'stok' => 'required|integer|min:0',
            'jenis_barang_id' => 'required|exists:jenis_barangs,id',
        ]);

        $transaksi = Transaksi::create([
            'barang_id' => $request->barang_id,
            'jumlah_terjual' => $request->jumlah_terjual,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'stok' => $request->stok,
            'jenis_barang_id' => $request->jenis_barang_id,
        ]);

        return response()->json([
            'id' => $transaksi->id,
            'barang_id' => $transaksi->barang_id,
            'jumlah_terjual' => $transaksi->jumlah_terjual,
            'tanggal_transaksi' => $transaksi->tanggal_transaksi->format('Y-m-d'), // Format date
            'stok' => $transaksi->stok,
            'jenis_barang_id' => $transaksi->jenis_barang_id,
        ], 201);
    }

    // Retrieve a specific transaction by ID
    public function show(Transaksi $transaksi)
    {
        return response()->json([
            'id' => $transaksi->id,
            'barang_id' => $transaksi->barang_id,
            'jumlah_terjual' => $transaksi->jumlah_terjual,
            'tanggal_transaksi' => $transaksi->tanggal_transaksi->format('Y-m-d'), // Format date
            'stok' => $transaksi->stok,
            'jenis_barang_id' => $transaksi->jenis_barang_id,
        ]);
    }

    // Update an existing transaction
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_terjual' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
            'stok' => 'required|integer|min:0',
            'jenis_barang_id' => 'required|exists:jenis_barangs,id',
        ]);

        $transaksi->update([
            'barang_id' => $request->barang_id,
            'jumlah_terjual' => $request->jumlah_terjual,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'stok' => $request->stok,
            'jenis_barang_id' => $request->jenis_barang_id,
        ]);

        return response()->json([
            'id' => $transaksi->id,
            'barang_id' => $transaksi->barang_id,
            'jumlah_terjual' => $transaksi->jumlah_terjual,
            'tanggal_transaksi' => $transaksi->tanggal_transaksi->format('Y-m-d'), // Format date
            'stok' => $transaksi->stok,
            'jenis_barang_id' => $transaksi->jenis_barang_id,
        ]);
    }

    // Delete a specific transaction
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return response()->json(null, 204);
    }
}

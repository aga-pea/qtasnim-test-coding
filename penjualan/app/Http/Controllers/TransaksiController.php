<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Read: Menampilkan semua transaksi
    public function index()
    {
        $transaksi = Transaksi::with(['barang', 'jenisBarang'])->sortable()->paginate(0);
        return view('transaksi.index', compact('transaksi'));
    }

    // Create: Menampilkan form untuk membuat transaksi baru
    public function create()
    {
        $barang = Barang::all();
        $jenisBarang = JenisBarang::all();
        return view('transaksi.create', compact('barang', 'jenisBarang'));
    }

    // Store: Menyimpan transaksi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jenis_barang_id' => 'required',
            'stok' => 'required|integer',
            'jumlah_terjual' => 'required|integer',
            'tanggal_transaksi' => 'required|date',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil ditambahkan');
    }

    // Edit: Menampilkan form untuk mengedit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::all();
        $jenisBarang = JenisBarang::all();
        return view('transaksi.edit', compact('transaksi', 'barang', 'jenisBarang'));
    }

    // Update: Menyimpan perubahan transaksi ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'jenis_barang_id' => 'required',
            'stok' => 'required|integer',
            'jumlah_terjual' => 'required|integer',
            'tanggal_transaksi' => 'required|date',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil diupdate');
    }

    // Delete: Menghapus transaksi dari database
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search', '');

        $transaksis = Transaksi::whereHas('barang', function($q) use ($search) {
            $q->where('nama_barang', 'like', '%' . $search . '%');
        })->orWhere('tanggal_transaksi', 'like', '%' . $search . '%')
          ->paginate(10);

        return view('transaksi.search', compact('transaksis', 'search'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Read: Display a listing of the barang.
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    // Create: Show the form for creating a new barang.
    public function create()
    {
        return view('barang.create');
    }

    // Store: Save a newly created barang in the database.
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255'
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan');
    }

    // Show: Display the specified barang.
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    // Edit: Show the form for editing the specified barang.
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // Update: Update the specified barang in the database.
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255'
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diupdate');
    }

    // Delete: Remove the specified barang from the database.
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil dihapus');
    }
}

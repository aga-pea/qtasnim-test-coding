<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function index()
    {
        $jenisBarangs = JenisBarang::all();
        return view('jenis_barang.index', compact('jenisBarangs'));
    }

    public function create()
    {
        return view('jenis_barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_barang' => 'required|string|max:255|unique:jenis_barangs',
        ]);

        JenisBarang::create($request->all());

        return redirect()->route('jenis_barang.index')->with('success', 'Jenis Barang created successfully.');
    }

    public function show(JenisBarang $jenisBarang)
    {
        return view('jenis_barang.show', compact('jenisBarang'));
    }

    public function edit(JenisBarang $jenisBarang)
    {
        return view('jenis_barang.edit', compact('jenisBarang'));
    }

    public function update(Request $request, JenisBarang $jenisBarang)
    {
        $request->validate([
            'jenis_barang' => 'required|string|max:255|unique:jenis_barangs,jenis_barang,' . $jenisBarang->id,
        ]);

        $jenisBarang->update($request->all());

        return redirect()->route('jenis_barang.index')->with('success', 'Jenis Barang updated successfully.');
    }

    public function destroy(JenisBarang $jenisBarang)
    {
        $jenisBarang->delete();

        return redirect()->route('jenis_barang.index')->with('success', 'Jenis Barang deleted successfully.');
    }
}

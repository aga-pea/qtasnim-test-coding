<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function index()
    {
        return response()->json(JenisBarang::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_barang' => 'required|string|max:255|unique:jenis_barangs',
        ]);

        $jenisBarang = JenisBarang::create($request->all());
        return response()->json($jenisBarang, 201);
    }

    public function show(JenisBarang $jenisBarang)
    {
        return response()->json($jenisBarang);
    }

    public function update(Request $request, JenisBarang $jenisBarang)
    {
        $request->validate([
            'jenis_barang' => 'required|string|max:255|unique:jenis_barangs,jenis_barang,' . $jenisBarang->id,
        ]);

        $jenisBarang->update($request->all());
        return response()->json($jenisBarang);
    }

    public function destroy(JenisBarang $jenisBarang)
    {
        $jenisBarang->delete();
        return response()->json(null, 204);
    }
}

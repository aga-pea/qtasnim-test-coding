<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json(Barang::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
        ]);

        $barang = Barang::create($request->all());
        return response()->json($barang, 201);
    }

    public function show(Barang $barang)
    {
        return response()->json($barang);
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
        ]);

        $barang->update($request->all());
        return response()->json($barang);
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return response()->json(null, 204);
    }
}

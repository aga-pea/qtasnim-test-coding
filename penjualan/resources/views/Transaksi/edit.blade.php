@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('transaksi.index') }}" class="btn btn-primary mb-3">Kembali</a>
        <h1>Edit Transaksi</h1>
        <hr>
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <!-- <label for="barang_id" class="form-label">Nama Barang</label> -->
                <h2>Nama Barang</h2>
                <select name="barang_id" class="form-control" required>
                    @foreach ($barang as $b)
                        <option value="{{ $b->id }}" {{ $b->id == $transaksi->barang_id ? 'selected' : '' }}>{{ $b->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <!-- <label for="jenis_barang_id" class="form-label">Jenis Barang</label> -->
                <h2>Jenis Barang</h2>
                <select name="jenis_barang_id" class="form-control" required>
                    @foreach ($jenisBarang as $j)
                        <option value="{{ $j->id }}" {{ $j->id == $transaksi->jenis_barang_id ? 'selected' : '' }}>{{ $j->jenis_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <!-- <label for="stok" class="form-label">Stok</label> -->
                <h2>Stok</h2>
                <input type="number" name="stok" class="form-control" value="{{ $transaksi->stok }}" required>
            </div>
            <div class="mb-3">
                <!-- <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label> -->
                <h2>Jumlah Terjual</h2>
                <input type="number" name="jumlah_terjual" class="form-control" value="{{ $transaksi->jumlah_terjual }}" required>
            </div>
            <div class="mb-3">
                <!-- <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label> -->
                <h2>Tanggal Transaksi</h2>
                <input type="date" name="tanggal_transaksi" class="form-control" value="{{ $transaksi->tanggal_transaksi }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
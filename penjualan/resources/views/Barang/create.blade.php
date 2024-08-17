@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('barang.index') }}" class="btn btn-primary mb-3">Kembali</a>
        <h1>Tambah Barang</h1>
        <hr>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <!-- <label for="nama_barang" class="form-label">Nama Barang</label> -->
                <h2>Nama Barang</h2>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

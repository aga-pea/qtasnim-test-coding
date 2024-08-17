@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('barang.index') }}" class="btn btn-primary mb-3">Kembali</a>
        <h1>Edit Barang</h1>
        <hr>
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <!-- <label for="nama_barang" class="form-label">Nama Barang</label> -->
                 <h2>Nama Barang</h2>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
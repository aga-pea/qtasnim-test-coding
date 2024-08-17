@extends('layouts.app2')

@section('content')
    <div class="container">
        <a href="{{ route('jenis_barang.index') }}" class="btn btn-primary mb-3">Kembali</a>
        <h1>Edit Jenis Barang</h1>
        <hr>
        <form action="{{ route('jenis_barang.update', $jenisBarang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <!-- <label for="jenis_barang" class="form-label">Jenis Barang</label> -->
                 <h2>Jenis Barang</h2>
                <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="{{ $jenisBarang->jenis_barang }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

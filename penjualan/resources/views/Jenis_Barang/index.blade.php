@extends('layouts.app2')

@section('content')
    <div class="container">
        <a href="{{ route('index') }}" class="btn btn-primary mb-3">Kembali ke Index</a>
        <h1>Jenis Barang</h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenisBarangs as $jenisBarang)
                        <tr>
                            <td>{{ $jenisBarang->id }}</td>
                            <td>{{ $jenisBarang->jenis_barang }}</td>
                            <td>
                                <a href="{{ route('jenis_barang.edit', $jenisBarang->id) }}" class="btn">Edit</a>
                                <form action="{{ route('jenis_barang.destroy', $jenisBarang->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <a href="{{ route('jenis_barang.create') }}" class="btn btn-primary mb-3">Tambah Jenis Barang</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection

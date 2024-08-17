@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('index') }}" class="btn btn-primary mb-3">Kembali ke Index</a>    
        <h1>Daftar Barang</h1>
        <hr>
        <br>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col" class="center-else">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                        <tr>
                            <td>{{ $item->nama_barang }}</td>
                            <td class="center-else">
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-primary" style="color:#fff;">Edit</a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
    </div>
@endsection

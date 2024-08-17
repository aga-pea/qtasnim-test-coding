@extends('layouts.app2')

@section('content')
    <div class="container">
        <a href="{{ route('index') }}" class="btn btn-primary mb-3">Kembali ke Index</a>
        <h1>Daftar Transaksi</h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col" class="center-else">Jenis Barang</th>
                        <th scope="col" class="center-else">Stok</th>
                        <th scope="col" class="center-else">Jumlah Terjual</th>
                        <th scope="col" class="center-else">Tanggal Transaksi</th>
                        <th scope="col" class="center-else">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td class="td-font">{{ $item->barang->nama_barang }}</td>
                            <td class="center-else">{{ $item->jenisBarang->jenis_barang }}</td>
                            <td class="center-else">{{ $item->stok }}</td>
                            <td class="center-else">{{ $item->jumlah_terjual }}</td>
                            <td class="center-else">{{ $item->tanggal_transaksi }}</td>
                            <td class="center-else">
                                <a href="{{ route('transaksi.edit', $item->id) }}" class="btn">Edit</a>
                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display:inline;">
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
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
    </div>
@endsection

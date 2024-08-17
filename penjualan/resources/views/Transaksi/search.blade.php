@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('transaksi.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <h1>Search Transaksi</h1>
    <form action="{{ route('transaksi.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Nama Barang or Tanggal Transaksi" value="{{ old('search', $search) }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <hr>

    @if($transaksis->count())
    
    <div class="table-responsive">
        <table class="table table-striped custom-table">
            <thead>
                <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col" class="center-else">Jenis Barang</th>
                    <th scope="col" class="center-else">Jumlah Terjual</th>
                    <th scope="col" class="center-else">Tanggal Transaksi</th>
                    <th scope="col" class="center-else">Stok</th>
                    <th scope="col" class="center-else">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td class="td-font">{{ $transaksi->barang->nama_barang }}</td>
                        <td class="center-else">{{ $transaksi->jenisBarang->jenis_barang }}</td>
                        <td class="center-else">{{ $transaksi->jumlah_terjual }}</td>
                        <td class="center-else">{{ $transaksi->tanggal_transaksi }}</td>
                        <td class="center-else">{{ $transaksi->stok }}</td>
                        <td class="center-else">
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary"  style="color:#fff;">Edit</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p>No transactions found.</p>
    @endif
</div>
@endsection

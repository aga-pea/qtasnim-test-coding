@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('transaksi.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <h1>Filter Transaksi by Date</h2>
    <hr>
    <!-- Date filter form -->
    <form action="{{ route('transaksi.filterByDate') }}" method="GET">
        <div class="form-group">
            <!-- <label for="start_date">Start Date:</label> -->
            <h2>Start Date :</h2>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $start_date }}">
        </div>
        <div class="form-group">
            <!-- <label for="end_date">End Date:</label> -->
            <h2>End Date :</h2>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $end_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <br><br>
    <!-- Table for displaying transaksi -->
    <div class="table-responsive">
        <table class="table table-striped custom-table">
            <thead>
                <tr>
                    <th scope="col">@sortablelink('barang.nama_barang', 'Nama Barang')</th>
                    <th scope="col" class="center-else">@sortablelink('jenisBarang.nama', 'Jenis Barang')</th>
                    <th scope="col" class="center-else">@sortablelink('stok', 'Stok')</th>
                    <th scope="col" class="center-else">@sortablelink('jumlah_terjual', 'Jumlah Terjual')</th>
                    <th scope="col" class="center-else">@sortablelink('tanggal_transaksi', 'Tanggal Transaksi')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td class="td-font">{{ $transaksi->barang->nama_barang }}</td>
                        <td class="center-else">{{ $transaksi->jenisBarang->jenis_barang }}</td>
                        <td class="center-else">{{ $transaksi->stok }}</td>
                        <td class="center-else">{{ $transaksi->jumlah_terjual }}</td>
                        <td class="center-else">{{ $transaksi->tanggal_transaksi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

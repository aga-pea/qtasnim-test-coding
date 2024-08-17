@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('index') }}" class="btn btn-primary mb-3">Kembali ke Index</a>
        <h1>Daftar Transaksi</h1>
        <a href="{{ route('transaksi.search') }}" class="btn btn-success mb-3">Search</a>
        <a href="{{ route('transaksi.filterByDate') }}" class="btn btn-success mb-3">Filter by Date</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('barang.nama_barang', 'Nama Barang', [], ['class' => 'sortable-link'])</th>
                        <th scope="col" class="center-else">@sortablelink('jenisBarang.nama', 'Jenis Barang', [], ['class' => 'sortable-link'])</th>
                        <th scope="col" class="center-else">@sortablelink('stok', 'Stok', [], ['class' => 'sortable-link'])</th>
                        <th scope="col" class="center-else">@sortablelink('jumlah_terjual', 'Jumlah Terjual', [], ['class' => 'sortable-link'])</th>
                        <th scope="col" class="center-else">@sortablelink('tanggal_transaksi', 'Tanggal Transaksi', [], ['class' => 'sortable-link'])</th>
                        <th scope="col" class="center-else" >Aksi</th>

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
                                <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-primary" style="color:#fff;">Edit</a>
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

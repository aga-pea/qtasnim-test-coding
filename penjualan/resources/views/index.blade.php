@extends('layouts.app2')

@section('content')
<div class="container">
        <h1>Index Page</h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th>Resource</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Transaksi</td>
                        <td><a href="{{ route('transaksi.index') }}">View Transaksi Index</a></td>
                    </tr>
                    <tr>
                        <td>Barang</td>
                        <td><a href="{{ route('barang.index') }}">View Barang Index</a></td>
                    </tr>
                    <tr>
                        <td>Jenis Barang</td>
                        <td><a href="{{ route('jenis_barang.index') }}">View Jenis Barang Index</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
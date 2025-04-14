{{-- @extends('layouts.template')

@section('content')

<div class="container mt-5">
    <div class="card shadow-lg mb-3">
        <div class="card-header text-white text-center">
            <h2 class="mb-0">Data Transaksi</h2>
        </div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
    </div>

    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Waktu Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->pesanan->nama_pelanggan }}</td>
                            <td>Rp {{ number_format($t->total_pembayaran, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($t->metode_pembayaran) }}</td>
                            <td>
                                <span class="badge bg-{{ $t->status_pembayaran == 'lunas' ? 'success' : 'warning' }}">
                                    {{ ucfirst($t->status_pembayaran) }}
                                </span>
                            </td>
                            <td>{{ $t->waktu_transaksi }}</td>
                            <td>
                                <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('transaksi.struk', $t->id) }}" class="btn btn-primary btn-sm">Cetak Struk</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}

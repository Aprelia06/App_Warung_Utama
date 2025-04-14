@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center">
            <h2 class="mb-0">Detail Pesanan</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID Pesanan</th>
                    <td>{{ $pesanan->pesanan_id }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pesanan</th>
                    <td>{{ $pesanan->tanggal_pesanan }}</td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>{{ $pesanan->nama_pelanggan }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>{{ $pesanan->no_telp }}</td>
                </tr>
                    {{-- <tr>
                        <th>Produk</th>
                        <td>
                            <ul>
                                
                                @if($pesanan->produks && is_iterable($pesanan->produks))
                                    @foreach ($pesanan->produks as $produk)
                                        <li>{{ $produk->produk_id->nama_produk ?? '-' }} ({{ $produk->jumlah ?? 0 }}x - Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }})</li>
                                    @endforeach
                                @else
                                    <li>-</li>
                                @endif
                            </ul>
                        </td>
                    </tr> --}}
                    <tr>
                        <th>Produk</th>
                        <td>{{ $pesanan->produks->nama_produk ?? '-' }} ({{ $pesanan->jumlah ?? 0 }}x - Rp {{ number_format($pesanan->harga ?? 0, 0, ',', '.') }})</td>
                    </tr>
                    
                    <tr>
                    <th>Sub Total</th>
                    <td>Rp {{ number_format($pesanan->subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>{{ $pesanan->catatan ?? '-' }}</td>
                </tr>
            </table>
            <div class="text-center mt-3">
                <a href="{{ route('pesanans.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

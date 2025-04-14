{{-- @extends('layouts.template')

@section('content') --}}
{{-- <style>
   @media print {
        body {
            margin: 0;
            padding: 0;
            width: 80mm; /* Ukuran struk thermal */
        }
        .receipt {
            width: 80mm;
            padding: 5mm;
            margin: 0 auto;
            font-size: 12px;
            font-family: monospace;
        }
        button, a {
            display: none !important; /* Sembunyikan tombol */
        }
        @page {
            size: 80mm auto;
            margin: 0;
        }
    }

    .receipt {
        width: 80mm;
        background: white;
        border: 1px dashed black;
        font-family: monospace;
        padding: 5mm;
        margin: 10px auto;
    }
</style>

<div class="container mt-5 d-flex justify-content-center">
    <div class="receipt">
        <h4 class="text-center">WARUNG UTAMA</h4>
        <hr style="border-top: 1px dashed black;">
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->waktu_transaksi)->format('d/m/Y H:i') }}</p>
        <p><strong>Pelanggan:</strong> {{ $transaksi->pesanan->nama_pelanggan }}</p>
        <hr style="border-top: 1px dashed black;">
        <table class="w-100">
            @foreach ($transaksi->pesanan->detailPesanans as $detail)
                <tr>
                    <td>{{ $detail->produk->nama_produk }}</td>
                    <td>x{{ $detail->jumlah }}</td>
                    <td class="text-end">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </table>
        <hr style="border-top: 1px dashed black;">
        <p><strong>Total Pesanan:</strong> Rp {{ number_format($transaksi->total_pesanan, 0, ',', '.') }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ ucfirst($transaksi->metode_pembayaran) }}</p>
        <p><strong>Uang Dibayarkan:</strong> Rp {{ number_format($transaksi->uang_bayar, 0, ',', '.') }}</p>
        <p><strong>Kembalian:</strong> Rp {{ number_format($transaksi->uang_bayar - $transaksi->total_pesanan, 0, ',', '.') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($transaksi->status_pembayaran) }}</p>
        <hr style="border-top: 1px dashed black;">
        <p class="text-center">Terima kasih telah berbelanja!</p>
        <div class="text-center mt-3">
            <button id="printBtn" class="btn btn-sm btn-dark">Cetak Struk</button>
            <a href="{{ route('pesanans.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('printBtn').addEventListener('click', function() {
        window.print(); // Cetak langsung tanpa menyimpan file
    });
</script> --}}
@extends('layouts.template')

@section('content')
<style>
   @media print {
        body {
            margin: 0;
            padding: 0;
            width: 80mm; /* Ukuran struk thermal */
        }
        .receipt {
            width: 80mm;
            padding: 5mm;
            margin: 0 auto;
            font-size: 12px;
            font-family: monospace;
        }
        button, a {
            display: none !important; /* Sembunyikan tombol */
        }
        @page {
            size: 80mm auto;
            margin: 0;
        }
    }

    .receipt {
        width: 80mm;
        background: white;
        border: 1px dashed black;
        font-family: monospace;
        padding: 5mm;
        margin: 10px auto;
    }
    .receipt table {
        width: 100%;
        border-collapse: collapse;
    }
    .receipt td {
        vertical-align: top;
    }
    .text-right {
        text-align: right;
    }
</style>

<div class="container mt-5 d-flex justify-content-center">
    <div class="receipt">
        <h4 class="text-center">Warung Utama</h4>
        <p class="text-center">JL. JCC KOMPLEKS PT.PLN P3B JAWA BALI NO.61 KRUKUT, 
            Krukut, Kec. Limo, Kota Depok Prov. Jawa Barat<br>Telp. 0217530843</p>
        <hr style="border-top: 1px dashed black;">
        <p><strong>No Transaksi:</strong> {{ $transaksi->transaksi_id }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->waktu_transaksi)->format('d/m/Y H:i') }}</p>
        <p><strong>Pelanggan:</strong> {{ $transaksi->pesanan->nama_pelanggan }}</p>
        <hr style="border-top: 1px dashed black;">
        <table>
            @foreach ($transaksi->pesanan->detailPesanans as $detail)
                <tr>
                    <td>{{ $detail->produk->nama_produk }}</td>
                </tr>
                <tr>
                    <td>{{ $detail->jumlah }} x Rp {{ number_format($detail->produk->harga, 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </table>
        <hr style="border-top: 1px dashed black;">
        <p><strong>Total:</strong> Rp {{ number_format($transaksi->total_pesanan, 0, ',', '.') }}</p>
        <p><strong>Tunai:</strong> Rp {{ number_format($transaksi->uang_bayar, 0, ',', '.') }}</p>
        <p><strong>Kembalian:</strong> Rp {{ number_format($transaksi->uang_bayar - $transaksi->total_pesanan, 0, ',', '.') }}</p>
        <hr style="border-top: 1px dashed black;">
        <p class="text-center">Terima Kasih Atas Kunjungan Anda</p>
         <div class="text-center mt-3">
            <button id="printBtn" class="btn btn-sm btn-dark">Cetak Struk</button>
            <a href="{{ route('pesanans.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('printBtn').addEventListener('click', function() {
        window.print();
    });
</script>


@endsection

@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center">
            <h2 class="mb-0">Daftar Pesanan</h2>
        </div>
        <div class="card-body">
            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Tombol Tambah Pesanan -->
            @if(Auth::check() && Auth::user()->role == 'admin')
            <div class="mb-4">
                <a href="{{ route('pesanans.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Pesanan
                </a>
            </div>
            @endif

            <!-- Tabel daftar pesanan -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama Pelanggan</th>
                            <th>No. Telepon</th>
                            <th>Produk</th>
                            <th>Subtotal</th>
                            <th>Catatan</th>
                            {{-- @if(optional($user)->role == 'admin') --}}
                            @if(Auth::check() && Auth::user()->role == 'admin')
                            {{-- @if(auth()->user()->role === 'admin') --}}
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanans as $index => $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->tanggal_pesanan }}</td>
                            <td>{{ $pesanan->nama_pelanggan }}</td>
                            <td>{{ $pesanan->no_telp }}</td>
                            <td>
                                @if (!empty($pesanan->detailPesanans) && $pesanan->detailPesanans->count() > 0)
                                    @foreach ($pesanan->detailPesanans as $detail)
                                        @if (!empty($detail->produk))
                                            {{ $detail->produk->nama_produk }} ({{ $detail->jumlah }})<br>
                                        @endif
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            
                            <td>Rp {{ number_format(($pesanan->subtotal), 0, ',', '.') }}</td>
                            <td>{{ $pesanan->catatan }}</td>

                            {{-- @if(auth()->user()->role === 'admin') --}}
                            @if(Auth::check() && Auth::user()->role == 'admin')

                            {{-- <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('pesanans.show', $pesanan->pesanan_id) }}" class="btn btn-success btn-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pesanans.edit', $pesanan->pesanan_id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pesanans.destroy', $pesanan->pesanan_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td> --}}
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('pesanans.show', $pesanan->pesanan_id) }}" class="btn btn-success btn-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                            
                                    {{-- <a href="{{ route('pesanans.edit', $pesanan->pesanan_id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                            
                                    <form action="{{ route('pesanans.destroy', $pesanan->pesanan_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                            
                                    @if ($pesanan->transaksi)
                                    <a href="{{ route('transaksi.struk', $pesanan->pesanan_id) }}" class="btn btn-warning btn-sm" title="Cetak Struk">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    @endif
                                </div>
                            </td>
                            
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data pesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk menghilangkan notifikasi otomatis -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 1500);
        }
    });
</script>
@endsection

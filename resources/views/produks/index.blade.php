@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center">
            <h2 class="mb-0">Daftar Produk</h2>
        </div>
        <div class="card-body">
            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
            @endif

             <!-- Tombol Buat Toko Baru -->
             <div class="mb-4">
                <a href="{{ route('produks.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Buat Produk Baru
                </a>
            </div>

            <!-- Form Pencarian -->
            <div class="mb-4">
                <form action="{{ route('produks.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Cari produk berdasarkan nama, deskripsi, atau harga"
                               value="{{ $search ?? '' }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel daftar produk -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            @if(auth()->user()->role === 'admin')

                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produks as $index => $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ optional($produk->kateg_produks)->nama_kategori }}</td>
                            <td>{{ $produk->deskripsi }}</td>
                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>

                            @if(auth()->user()->role === 'admin')

                            <td>

                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Button Show -->
                                    <a href="{{ route('produks.show', $produk->produk_id) }}" class="btn btn-success btn-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('produks.edit', $produk->produk_id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('produks.destroy', $produk->produk_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data produk.</td>
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

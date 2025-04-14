@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mt-5">
    <!-- Notifikasi -->
    @if (session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Card untuk daftar toko -->
    <div class="card shadow-lg">
        <div class="card-header text-white">
            <h2 class="card-title mb-0 text-center">Daftar Toko</h2>
        </div>
        <div class="card-body">
            <!-- Tombol Buat Toko Baru -->
            <div class="mb-4">
                <a href="{{ route('tokos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Buat Toko Baru
                </a>
            </div>

            <!-- Form Pencarian -->
            <div class="mb-4">
                <form action="{{ route('tokos.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Cari toko berdasarkan nama, pemilik, atau alamat"
                               value="{{ $search ?? '' }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Daftar Toko -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Nama Pemilik</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tokos as $index => $toko)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Nomor urut berdasarkan indeks -->
                            <td>{{ $toko->nama_toko }}</td>
                            <td>{{ $toko->nama_pemilik }}</td>
                            <td>{{ $toko->alamat }}</td>
                            <td>{{ $toko->telepon ?? '-' }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Button Show -->
                                    <a href="{{ route('tokos.show', $toko->toko_id) }}" class="btn btn-success btn-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                    
                                    <!-- Button Edit -->
                                    <a href="{{ route('tokos.edit', $toko->toko_id) }}" class="btn btn-info btn-sm" title="Ubah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                    
                                    <!-- Button Hapus -->
                                    <form action="{{ route('tokos.destroy', $toko->toko_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus toko ini?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data toko.</td>
                        </tr>
                        @endforelse
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk menghilangkan notifikasi -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500); // Hapus elemen setelah transisi selesai
            }, 1500); // Waktu tampil (1,5 detik)
        }
    });
</script>
@endsection

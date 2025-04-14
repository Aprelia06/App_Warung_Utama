@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg col-md-8">
        <div class="card-header text-white text-center">
            <h2 class="card-title mb-0">Daftar Kategori Produk</h2>
        </div>

        <div class="card-body">
            <!-- Notifikasi -->
            @if (session('success'))
            <div id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Tombol Tambah -->
            <div class="mb-4">
                <a href="{{ route('kategori_produks.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Buat Kategori Baru
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kategoriProduks as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ $kategori->deskripsi }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('kategori_produks.edit', $kategori->kategori_produk_id) }}" 
                                       class="btn btn-info btn-sm" title="Ubah">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('kategori_produks.destroy', $kategori->kategori_produk_id) }}" 
                                          method="POST" onsubmit="return confirmDelete(event)">
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
                            <td colspan="4" class="text-center">Tidak ada kategori produk.</td>
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
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 3000); // Tampilkan selama 3 detik
        }
    });

    function confirmDelete(event) {
        if (!confirm('Yakin ingin menghapus kategori ini?')) {
            event.preventDefault();
        }
    }
</script>

@endsection

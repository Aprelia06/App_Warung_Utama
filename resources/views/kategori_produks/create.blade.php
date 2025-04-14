@extends('layouts.template')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg col-md-8">
        <div class="card-header text-white">
            <h2 class="card-title mb-0 text-center">Buat Kategori Baru</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori_produks.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi kategori"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kategori_produks.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

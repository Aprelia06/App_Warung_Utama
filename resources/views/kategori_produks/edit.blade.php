@extends('layouts.template')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg col-md-8">
        <div class="card-header text-white">
            <h2 class="card-title mb-0 text-center">Edit Kategori</h2>
        </div>
        <div class="card-body">
        <form action="{{ route('kategori_produks.update', $kategoriProduk->kategori_produk_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $kategoriProduk->nama_kategori }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $kategoriProduk->deskripsi }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori_produks.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
@endsection
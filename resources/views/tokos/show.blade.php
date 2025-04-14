@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white">
            <h2 class="card-title mb-0 text-center">Detail Toko</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Detail toko -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Toko:</label>
                        <p>{{ $toko->nama_toko }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pemilik:</label>
                        <p>{{ $toko->nama_pemilik }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Alamat:</label>
                        <p>{{ $toko->alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor Telepon:</label>
                        <p>{{ $toko->telepon ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status Toko:</label>
                        <p>
                            <span class="badge {{ $toko->status_toko == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($toko->status_toko) }}
                            </span>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi:</label>
                        <p>{{ $toko->deskripsi ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori Toko:</label>
                        <p>{{ $toko->kategori_toko ?? '-' }}</p>
                    </div>
                </div>

                <!-- Detail lainnya -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Toko:</label>
                        <div>
                            @if ($toko->gambar_toko)
                            <img src="{{ asset('storage/' . $toko->gambar_toko) }}" alt="Gambar Toko" class="img-thumbnail">
                                {{-- <img src="{{ asset('storage/' . $toko->gambar_toko) }}" alt="Gambar {{ $toko->nama_toko }}" class="img-thumbnail" width="300"> --}}
                            @else
                                <span>Tidak ada gambar.</span>
                            @endif
                        </div>
                        <div class="mb-4">
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('tokos.index') }}" class="btn btn-secondary">Kembali ke Daftar Toko</a>

        </div>
    </div>
</div>

@endsection

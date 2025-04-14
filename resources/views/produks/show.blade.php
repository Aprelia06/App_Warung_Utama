@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white">
            <h2 class="card-title mb-0 text-center">Detail Produk</h2>
        </div>
        <div class="card-body">
            <div class="row">

                <!-- Detail Produk -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Produk:</label>
                        <div>
                            @if ($produks->gambar_produk)
                            <img src="{{ asset('storage/' . $produks->gambar_produk) }}" alt="Gambar Produk" class="img-thumbnail">
                                {{-- <img src="{{ asset('storage/' . $produks->gambar_produk) }}" alt="Gambar {{ $produks->gambar_produk }}" class="img-thumbnail" width="300"> --}}
                            @else
                                <span>Tidak ada gambar.</span>
                            @endif
                        </div>
                        <div class="mb-4">
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('produks.index') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>

        </div>
    </div>
</div>

@endsection

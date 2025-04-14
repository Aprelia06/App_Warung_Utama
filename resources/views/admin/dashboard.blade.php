{{-- @extends('layouts.template')

@section('content')
<div class="container">
  <h3 class="my-4 text-center">Produk Unggulan</h3>

  <div class="row">
    <!-- Carousel Produk Terbaru -->
    <div class="col-md-6">
      <h5 class="text-center">Produk Terbaru</h5>
      <div id="carouselNewProducts" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($produkTerbaru as $index => $produk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <img class="d-block w-100 rounded" src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" style="height: 300px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 p-1 rounded">
                <h6 class="text-white m-0">{{ $produk->nama_produk }}</h6>
                <p class="text-warning fw-bold m-0 small">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNewProducts" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-dark rounded-circle p-1" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselNewProducts" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-dark rounded-circle p-1" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    <!-- Carousel Best Seller -->
    <div class="col-md-6">
      <h5 class="text-center">Best Seller</h5>
      <div id="carouselBestSeller" class="carousel carousel-fade slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($produkBestSeller as $index => $produk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <img class="d-block w-100 rounded" src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" style="height: 300px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 p-1 rounded">
                <h6 class="text-white m-0">{{ $produk->nama_produk }}</h6>
                <p class="text-warning fw-bold m-0 small">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p class="text-light m-0 small">Stok: {{ $produk->stok }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBestSeller" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-dark rounded-circle p-1" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBestSeller" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-dark rounded-circle p-1" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>

  <!-- Grid Card Produk -->
  <h3 class="my-5 text-center text-muted">Daftar Produk</h3>
  <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    @foreach($produks as $produk)
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" style="height: 180px; object-fit: cover;">
          <div class="card-body">
            <h6 class="card-title">{{ $produk->nama_produk }}</h6>
            <p class="text-danger fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p class="card-text text-muted">Stok tersisa: {{ $produk->stok }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection --}}

@extends('layouts.template')

@section('content')
<div class="container">
  <h3 class="my-4 text-center">Produk Unggulan</h3>

  <div class="row">
    <!-- Carousel Produk Terbaru -->
    <div class="col-md-6">
      <h5 class="text-center">Produk Terbaru</h5>
      <div id="carouselNewProducts" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($produkTerbaru as $index => $produk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <div class="position-relative">
                <img class="d-block w-100 rounded {{ $produk->stok == 0 ? 'blurred' : '' }}" 
                     src="{{ asset('storage/' . $produk->gambar_produk) }}" 
                     alt="{{ $produk->nama_produk }}" 
                     style="height: 300px; object-fit: cover;">
                @if($produk->stok == 0)
                  <div class="overlay">
                    <div class="cross"></div>
                    <div class="text">Produk Habis</div>
                  </div>
                @endif
              </div>
              <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 p-1 rounded">
                <h6 class="text-white m-0">{{ $produk->nama_produk }}</h6>
                <p class="text-warning fw-bold m-0 small">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p class="text-light m-0 small">Stok: {{ $produk->stok }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNewProducts" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselNewProducts" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    <!-- Carousel Best Seller -->
    <div class="col-md-6">
      <h5 class="text-center">Best Seller</h5>
      <div id="carouselBestSeller" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($produkBestSeller as $index => $produk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <div class="position-relative">
                <img class="d-block w-100 rounded {{ $produk->stok == 0 ? 'blurred' : '' }}" 
                     src="{{ asset('storage/' . $produk->gambar_produk) }}" 
                     alt="{{ $produk->nama_produk }}" 
                     style="height: 300px; object-fit: cover;">
                @if($produk->stok == 0)
                  <div class="overlay">
                    <div class="cross"></div>
                    <div class="text">Produk Habis</div>
                  </div>
                @endif
              </div>
              <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 p-1 rounded">
                <h6 class="text-white m-0">{{ $produk->nama_produk }}</h6>
                <p class="text-warning fw-bold m-0 small">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p class="text-light m-0 small">Stok: {{ $produk->stok }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBestSeller" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBestSeller" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>

  <!-- Grid Card Produk -->
  {{-- <h3 class="my-5 text-center text-muted">Daftar Produk</h3>
  <div class="row row-cols-1 row-cols-md-3 g-3 mb-5">
    @foreach($produks as $produk)
      <div class="col">
        <div class="card h-100 shadow-sm position-relative">
          <div class="position-relative">
            <img class="card-img-top {{ $produk->stok == 0 ? 'blurred' : '' }}" 
                 src="{{ asset('storage/' . $produk->gambar_produk) }}" 
                 alt="{{ $produk->nama_produk }}" 
                 style="height: 160px; object-fit: cover;">
            @if($produk->stok == 0)
              <div class="overlay">
                <div class="cross"></div>
                <div class="text">Produk Habis</div>
              </div>
            @endif
          </div>
          <div class="card-body p-2">
            <h6 class="card-title mb-1">{{ $produk->nama_produk }}</h6>
            <p class="text-danger fw-bold small mb-1">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p class="card-text text-muted small">Stok: {{ $produk->stok }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div> --}}

  <!-- Grid Card Produk -->
<h3 class="my-5 text-center text-muted fs-3">Daftar Produk</h3>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
  @foreach($produks as $produk)
    <div class="col">
      <div class="card h-100 shadow-sm position-relative">
        <div class="position-relative">
          <img class="card-img-top {{ $produk->stok == 0 ? 'blurred' : '' }}" 
               src="{{ asset('storage/' . $produk->gambar_produk) }}" 
               alt="{{ $produk->nama_produk }}" 
               style="height: 200px; object-fit: cover;">
          @if($produk->stok == 0)
            <div class="overlay">
              <div class="cross"></div>
              <div class="text">Produk Habis</div>
            </div>
          @endif
        </div>
        <div class="card-body p-3">
          <h6 class="card-title mb-2 fs-6">{{ $produk->nama_produk }}</h6>
          <p class="text-danger fw-bold mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
          <p class="card-text text-muted">Stok: {{ $produk->stok }}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>


<!-- Tambahkan CSS untuk efek blur dan tanda silang -->
<style>
  .blurred {
    filter: blur(3px) brightness(0.7);
  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.4);
  }

  .cross {
    position: absolute;
    width: 100%;
    height: 100%;
  }

  .cross::before, .cross::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 8px;
    background-color: red;
    top: 50%;
    left: 0;
    transform: translateY(-50%) rotate(45deg);
  }

  .cross::after {
    transform: translateY(-50%) rotate(-45deg);
  }

  .text {
    position: absolute;
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
    background: rgba(0, 0, 0, 0.6);
    padding: 5px 10px;
    border-radius: 5px;
  }
</style>
@endsection

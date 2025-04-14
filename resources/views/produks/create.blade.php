{{-- @extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Tambah Produk Baru</h1> --}}

    {{-- Tampilkan error jika ada --}}
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    {{-- Form untuk membuat produk baru --}}
    {{-- <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk') }}" required>
        </div>

        <div class="form-group">
            <label for="kategori_produk_id">Kategori Produk</label>
            <select name="kategori_produk_id" class="form-control" required>
                @foreach ($kategori as $kategoris)
                    <option value="{{ $kategoris->kategori_produk_id }}">{{ $kategoris->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ old('deskripsi') }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" required>
        </div>

        <div class="form-group">
            <label for="gambar_produk">Gambar Produk</label>
            <input type="file" name="gambar_produk" id="gambar_produk" class="form-control-file" accept="image/*">
            <img id="preview-image" src="#" alt="Preview Gambar" class="img-thumbnail mt-2" width="150" style="display: none;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produks.index') }}" class="btn btn-secondary">Batal</a>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var gambarProdukInput = document.getElementById('gambar_produk');
            var previewImage = document.getElementById('preview-image');

            gambarProdukInput.addEventListener('change', function () {
                var file = this.files[0];
                if (file) {
                    if (!file.type.startsWith('image/')) {
                        alert('Harap pilih file gambar!');
                        gambarProdukInput.value = ''; 
                        previewImage.style.display = 'none';
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImage.style.display = 'none';
                }
            });
        });
    </script>
</div>
@endsection --}}












@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Tambah Produk Baru</h1>

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form untuk membuat produk baru --}}
    <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk') }}" required>
    </div>

        <div class="col-md-4">
            <label for="kategori_produk_id">Kategori Produk</label>
            <select name="kategori_produk_id" class="form-control" required>
                @foreach ($kategori as $kategoris)
                    <option value="{{ $kategoris->kategori_produk_id }}">{{ $kategoris->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ old('deskripsi') }}" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">            
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required oninput="formatRupiah(this)">
        </div>
        <div class="col-md-4">            
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" required>
        </div>

        <div class="col-md-4">
            <label for="gambar_produk">Gambar Produk</label>
            <input type="file" name="gambar_produk" id="gambar_produk" class="form-control-file" accept="image/*">
            <img id="preview-image" src="#" alt="Preview Gambar" class="img-thumbnail mt-2" width="150" style="display: none;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
</div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var gambarProdukInput = document.getElementById('gambar_produk');
            var previewImage = document.getElementById('preview-image');
            var hargaInput = document.getElementById('harga');
            var form = document.querySelector('form');
    
            // Format angka menjadi Rupiah
            function formatRupiah(angka) {
                return angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
    
            // Saat user mengetik di input harga
            hargaInput.addEventListener('input', function () {
                let angka = this.value.replace(/\D/g, ''); // Hapus semua non-angka
                this.value = formatRupiah(angka); // Ubah ke format Rupiah
            });
    
            // Sebelum submit form, ubah format harga ke angka murni (tanpa titik)
            form.addEventListener('submit', function () {
                hargaInput.value = hargaInput.value.replace(/\./g, ''); // Hapus titik sebelum dikirim ke server
            });
    
            // Preview Gambar Produk
            gambarProdukInput.addEventListener('change', function () {
                var file = this.files[0];
                if (file) {
                    if (!file.type.startsWith('image/')) {
                        alert('Harap pilih file gambar!');
                        gambarProdukInput.value = '';
                        previewImage.style.display = 'none';
                        return;
                    }
    
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImage.style.display = 'none';
                }
            });
        });
    </script>
    
</div>
@endsection


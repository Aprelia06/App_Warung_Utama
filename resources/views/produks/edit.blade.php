@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center">
            <h2 class="mb-0">Ubah Produk</h2>
        </div>
        
        <div class="card-body">

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

    {{-- Form untuk mengedit toko --}}
    <form action="{{ route('produks.update', $produks->produk_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_produk">Nama produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ $produks->nama_produk }}" required>
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
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $produks->deskripsi }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="{{ $produks->harga }}" required>
       </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gambar_produk">Gambar produk</label>
            <input type="file" name="gambar_produk" id="gambar_produk" class="form-control-file">
            @if ($produks->gambar_produk)
                <img src="{{ asset('storage/' . $produks->gambar_produk) }}" alt="Gambar Toko" class="img-fluid mt-2" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('produks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
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

@endsection


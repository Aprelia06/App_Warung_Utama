@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white">
            <h2 class="card-title mb-0 text-center">Buat Toko Baru</h2>
        </div>
        <div class="card-body">
            {{-- Tampilkan error jika ada --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form untuk membuat toko baru --}}
            <form action="{{ route('tokos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <label for="nama_toko" class="form-label">Nama Toko</label>
                    <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="{{ old('nama_toko') }}" required>
                </div>

                <div class="mb-2">
                    <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" value="{{ old('nama_pemilik') }}" required>
                </div>

                <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-2">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon') }}">
                </div>

                <div class="mb-2">
                    <label for="status_toko" class="form-label">Status Toko</label>
                    <select name="status_toko" id="status_toko" class="form-control" required>
                        <option value="aktif" {{ old('status_toko') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="non-aktif" {{ old('status_toko') == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-2">
                    <label for="kategori_toko" class="form-label">Kategori Toko</label>
                    <input type="text" name="kategori_toko" id="kategori_toko" class="form-control" value="{{ old('kategori_toko') }}">
                </div>

                <div class="mb-4">
                    <label for="gambar_toko" class="form-label">Gambar Toko</label>
                    <input type="file" name="gambar_toko" id="gambar_toko" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                    
                    <div class="mt-3">
                        <img id="preview" class="img-fluid rounded d-none" style="max-width: 300px;">
                    </div>
                </div>
                
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" class="btn btn-primary d-flex align-items-center">
                        <i class="fas fa-save"></i></button>
                    <a href="{{ route('tokos.index') }}" class="btn btn-secondary">Batal</a>
                </div>
                
            </form>
        </div>
    </div>
</div>

{{-- <script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');
    
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none'); // Menampilkan gambar
            }
    
            reader.readAsDataURL(input.files[0]); // Membaca file sebagai URL
        }
    }
    </script> --}}
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
@endsection



@extends('layouts.template')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="container mt-5">
        <div class="card shadow-lg mb-3">
            <div class="card-header text-white text-center">
                <h2 class="mb-0">Tambah Pesanan</h2>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        {{-- <form action="{{ route('pesanans.store') }}" method="POST">
            @csrf --}}
            <form action="{{ route('pesanans.store') }}" method="POST">
                @csrf
            
                <!-- Kolom user_id hidden -->
                {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->userID }}"> --}}

            <!-- Card 1: Informasi Pelanggan -->
            <div class="card shadow-lg mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
                            <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
                        </div>
                        <div class="col-md-4">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Produk -->
            <div class="card shadow-lg mb-3">
                <div class="card-body">
                    <div id="produk-container">
                        <div class="produk-item row mb-3">
                            <div class="col-md-3">
                                <label for="produk_id" class="form-label">Produk</label>
                                <select class="form-select produk-select" name="produk_id[]" required>
                                    <option value="" disabled selected>Pilih Produk</option>
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->produk_id }}" data-harga="{{ $produk->harga }}">
                                            {{ $produk->nama_produk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control harga" name="harga[]" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control jumlah" name="jumlah[]" min="1" value="1" required>
                            </div>
                            <div class="col-md-2">
                                <label for="total" class="form-label">Total</label>
                                <input type="text" class="form-control total" name="total[]" readonly>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="button" class="btn btn-danger hapus-produk">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary" id="tambah-produk">
                                <i class="fas fa-plus"></i> Tambah Produk
                            </button>
                        </div>
                        <div class="col-md-6 text-end">
                            <label for="subtotal" class="form-label">Sub Total</label>
                            <input type="text" class="form-control d-inline w-50" id="subtotal" name="subtotal" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Catatan -->
            <div class="card shadow-lg mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Pesanan
                </button>
                <a href="{{ route('pesanans.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

   <script>
    function formatRupiah(angka) {
        return 'Rp ' + parseInt(angka, 10).toLocaleString('id-ID');
    }

    function hitungTotal(item) {
        const harga = parseInt(item.querySelector('.harga').value.replace(/[^0-9]/g, '')) || 0;
        const jumlah = parseInt(item.querySelector('.jumlah').value) || 0;
        const total = harga * jumlah;
        item.querySelector('.total').value = formatRupiah(total);
    }

    function hitungSubTotal() {
        let subTotal = 0;
        document.querySelectorAll('.produk-item').forEach(item => {
            const total = parseInt(item.querySelector('.total').value.replace(/[^0-9]/g, '')) || 0;
            subTotal += total;
        });
        document.getElementById('subtotal').value = formatRupiah(subTotal);
    }

    document.getElementById('produk-container').addEventListener('input', function (event) {
        const item = event.target.closest('.produk-item');

        if (event.target.classList.contains('produk-select')) {
            const selectedOption = event.target.options[event.target.selectedIndex];
            const hargaInput = item.querySelector('.harga');
            hargaInput.value = formatRupiah(selectedOption.getAttribute('data-harga'));
            hitungTotal(item);
            hitungSubTotal();
        }

        if (event.target.classList.contains('jumlah')) {
            hitungTotal(item);
            hitungSubTotal();
        }
    });

    document.getElementById('tambah-produk').addEventListener('click', function () {
        const container = document.getElementById('produk-container');
        const newProduct = container.querySelector('.produk-item').cloneNode(true);

        newProduct.querySelector('.produk-select').value = "";
        newProduct.querySelector('.harga').value = "";
        newProduct.querySelector('.jumlah').value = "1";
        newProduct.querySelector('.total').value = "";

        container.appendChild(newProduct);
    });

    document.getElementById('produk-container').addEventListener('click', function (event) {
        if (event.target.classList.contains('hapus-produk') || event.target.closest('.hapus-produk')) {
            event.target.closest('.produk-item').remove();
            hitungSubTotal();
        }
    });

</script>

@endsection

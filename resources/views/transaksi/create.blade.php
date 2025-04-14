@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg mb-3">
        <div class="card-header text-white text-center">
            <h2 class="mb-0">Buat Transaksi</h2>
        </div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
    </div>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <!-- QR Code Library -->
        <script src="https://unpkg.com/@zxing/library@latest"></script>

        <!-- Informasi Pesanan -->
        <div class="card shadow-lg mb-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">ID Pesanan</label>
                        <input type="text" class="form-control" name="pesanan_id" value="{{ old('pesanan_id', $pesanan->pesanan_id) }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" value="{{ $pesanan->nama_pelanggan }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Total Pesanan</label>
                        <input type="text" class="form-control" value="Rp {{ number_format($pesanan->subtotal, 0, ',', '.') }}" readonly>
                        <input type="hidden" id="total_pesanan_value" value="{{ $pesanan->subtotal }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="card shadow-lg mb-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                            <option value="cash">Cash</option>
                            <option value="saldo">Saldo</option>
                        </select>
                    </div>

                    <!-- Poin User -->
                    <div class="col-md-4">
                        <label class="form-label">Poin User</label>
                        <input type="text" class="form-control" id="poin_user" value="{{ $pesanan->user->point ?? 0 }}" readonly>
                    </div>

                    <!-- Uang Bayar -->
                    <div class="col-md-6">
                        <label class="form-label">Uang Dibayarkan</label>
                        <input type="text" class="form-control" id="uang_bayar" oninput="formatRupiah(this)">
                        <input type="hidden" name="uang_bayar" id="uang_bayar_value">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Kembalian</label>
                        <input type="text" class="form-control" id="kembalian" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status Pembayaran</label>
                        <select class="form-select" name="status_pembayaran" required>
                            <option value="pending">Pending</option>
                            <option value="lunas">Lunas</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="form-label">Waktu Transaksi</label>
                        <input type="datetime-local" class="form-control" name="waktu_transaksi" value="{{ now()->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>

                <!-- QR Code Scanner -->
                <div id="scan_qr_section" style="display: none;">
                    <h4>Scan QR Code User</h4>
                    <video id="preview" style="width: 300px; height: 200px; border: 1px solid black;"></video>
                </div>

                <!-- Info User dari QR -->
                <div id="user_info" style="display: none; margin-top: 20px;">
                    <p><strong>Nama:</strong> <span id="user_name"></span></p>
                    <p><strong>Saldo:</strong> <span id="user_saldo"></span></p>
                    <p><strong>Riwayat Pesanan:</strong> <span id="user_riwayat"></span></p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Konfirmasi Transaksi</button>
            <a href="{{ route('pesanans.create') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
</div>

<!-- Script Format Rupiah & Kembalian -->
<script>
function formatRupiah(input) {
    let angka = input.value.replace(/\D/g, '');
    let formatted = angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    input.value = 'Rp ' + formatted;
    document.getElementById('uang_bayar_value').value = angka;
    hitungKembalian();
}

function hitungKembalian() {
    let total = parseInt(document.getElementById('total_pesanan_value').value);
    let bayar = parseInt(document.getElementById('uang_bayar_value').value) || 0;
    let kembali = bayar - total;
    document.getElementById('kembalian').value = kembali >= 0 ? 'Rp ' + kembali.toLocaleString('id-ID') : 'Rp 0';
}
</script>

<!-- Script QR Scanner -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const metode = document.getElementById('metode_pembayaran');
    const scanSection = document.getElementById('scan_qr_section');
    const userInfo = document.getElementById('user_info');
    const userName = document.getElementById('user_name');
    const userSaldo = document.getElementById('user_saldo');
    const userId = document.getElementById('user_id');
    const totalPesanan = document.getElementById('total_pesanan_value').value;
    const codeReader = new ZXing.BrowserMultiFormatReader();
    const video = document.getElementById('preview');
    let scannerStarted = false;

    metode.addEventListener('change', function () {
        if (this.value === 'saldo') {
            scanSection.style.display = 'block';
            userInfo.style.display = 'none';
            if (!scannerStarted) startScanner();
        } else {
            scanSection.style.display = 'none';
            userInfo.style.display = 'none';
            stopScanner();
        }
    });

    function startScanner() {
        codeReader.listVideoInputDevices().then(devices => {
            const deviceId = devices[0].deviceId;
            codeReader.decodeOnceFromVideoDevice(deviceId, video).then(result => {
                let qrData = result.text;
                fetch('/api/cek-user-by-qr', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ qr_code: qrData })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    userName.innerText = data.name;
                    userSaldo.innerText = data.point;
                    userInfo.style.display = 'block';

                    // Kirim transaksi otomatis
                    prosesTransaksi(data.id);
                });
            });
            scannerStarted = true;
        });
    }

    function prosesTransaksi(userId) {
        fetch('/api/proses-transaksi-by-qr', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                user_id: userId,
                pesanan_id: document.querySelector('input[name="pesanan_id"]').value,
                total_pesanan: totalPesanan
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                alert('Transaksi berhasil!');
                window.location.href = `/transaksi/struk/${data.transaksi_id}`;
            }
        });
    }

    function stopScanner() {
        codeReader.reset();
        scannerStarted = false;
    }
});
</script>

@endsection

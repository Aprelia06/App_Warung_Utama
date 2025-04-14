<?php

namespace App\Helpers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\Pesanan;

class QrCodeHelper
{
    public static function generateQrCode($user)
    {
        // Ambil semua pesanan user yang sudah lunas
        $riwayatPesanan = Pesanan::where('user_id', $user->id)
            ->whereHas('transaksi', function ($query) {
                $query->where('status_pembayaran', 'lunas');
            })
            ->orderBy('created_at', 'desc')
            ->limit(5) // Batasi agar QR Code tidak terlalu panjang
            ->pluck('pesanan_id')
            ->toArray();

        $riwayatText = !empty($riwayatPesanan) ? implode(', ', $riwayatPesanan) : '-';

        // Data yang mau dimasukkan ke QR Code
        $qrData = "Nama: {$user->name}\nSaldo: {$user->point}\nRiwayat Pesanan: {$riwayatText}";

        // Generate QR Code (SVG)
        $qrCode = QrCode::format('svg')->size(200)->generate($qrData);

        // Simpan QR Code ke storage
        $fileName = 'qrcodes/' . $user->id . '.svg';
        Storage::disk('public')->put($fileName, $qrCode);

        // Simpan path QR Code ke database
        $user->qr_code = $fileName;
        $user->save();

        return $fileName;
    }
}

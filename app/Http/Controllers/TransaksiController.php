<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\Pesanan;
use App\Models\User;
use App\Helpers\QrCodeHelper;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function create($pesanan_id)
    {
        // Ambil pesanan dengan relasi ke user
        $pesanan = Pesanan::with('user')->findOrFail($pesanan_id);

        return view('transaksi.create', compact('pesanan'));
    }

    public function store(Request $request)
{
    $request->validate([
        'pesanan_id' => 'required|exists:pesanans,pesanan_id',
        'metode_pembayaran' => 'required|in:cash,transfer',
        'uang_bayar' => 'nullable|numeric|min:0',
    ]);

    DB::beginTransaction();
    try {
        $pesanan = Pesanan::with('user')->findOrFail($request->pesanan_id);
        $user = $pesanan->user;
        $total_pesanan = $pesanan->subtotal;
        $kembalian = 0;
        $uang_bayar = $request->uang_bayar ?? 0;

        if ($request->metode_pembayaran == 'cash') {
            if ($uang_bayar < $total_pesanan) {
                return redirect()->back()->with('error', 'Uang yang dibayarkan kurang dari total pesanan!');
            }
            $kembalian = $uang_bayar - $total_pesanan;
        }

        if ($request->metode_pembayaran == 'transfer') {
            if ($user->point < $total_pesanan) {
                return redirect()->back()->with('error', 'Poin tidak cukup untuk membayar pesanan ini!');
            }

            $user->point -= $total_pesanan;
            $user->save();
            $uang_bayar = 0;
            $kembalian = 0;
        }

        // Simpan transaksi
        $transaksi = Transaksi::create([
            'pesanan_id' => $pesanan->pesanan_id,
            'total_pesanan' => $total_pesanan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'uang_bayar' => $uang_bayar,
            'kembalian' => $kembalian,
            'status_pembayaran' => 'lunas',
            'waktu_transaksi' => now(),
        ]);

        // **Update QR Code setelah transaksi berhasil**
        QrCodeHelper::generateQrCode($user);

        DB::commit();

        // Redirect ke halaman struk
        return redirect()->route('transaksi.struk', $transaksi->transaksi_id);
        
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
    public function struk($transaksi_id)
{
    $transaksi = Transaksi::with('pesanan')->find($transaksi_id);

    if (!$transaksi) {
        return "Transaksi dengan ID $transaksi_id tidak ditemukan.";
    }

    return view('transaksi.struk', compact('transaksi'));
}

    
    
}
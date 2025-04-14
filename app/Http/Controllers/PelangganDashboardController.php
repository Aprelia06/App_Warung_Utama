<?php

namespace App\Http\Controllers;
use App\Models\Produk;

use Illuminate\Http\Request;

class PelangganDashboardController extends Controller
{
    public function dashboard()
            {
                $produkTerbaru = Produk::orderBy('created_at', 'desc')->take(3)->get();
                $produkBestSeller = Produk::orderBy('stok', 'asc')->take(3)->get(); // Produk dengan stok tersisa paling sedikit
                $produks = Produk::all();


                return view('pelanggan.dashboard', compact('produkTerbaru', 'produkBestSeller', 'produks'));
                

            }
}

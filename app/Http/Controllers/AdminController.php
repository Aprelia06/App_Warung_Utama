<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
    {
            public function dashboard()
            {
                $produkTerbaru = Produk::orderBy('created_at', 'desc')->take(3)->get();
                $produkBestSeller = Produk::orderBy('stok', 'asc')->take(3)->get(); // Produk dengan stok tersisa paling sedikit
                $produks = Produk::all();


                return view('admin.dashboard', compact('produkTerbaru', 'produkBestSeller', 'produks'));
                

            }
        }
        
    

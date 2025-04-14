<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    public function index()
    {
        return view('detail_pesanan.index'); // Pastikan ada file Blade ini di resources/views
    }
}

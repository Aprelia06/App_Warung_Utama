<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoDashboardController extends Controller
{
    public function index()
    {
        return view('toko.dashboard'); // Pastikan file `dashboard/index.blade.php` ada
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function handleRedirect()
    {
        // Ambil role pengguna yang sedang login
        $role = Auth::user()->role;

        // Redirect berdasarkan role pengguna
        if ($role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($role === 'toko') {
            return redirect('/toko/dashboard');
        } elseif ($role === 'pelanggan') {
            return redirect('/pelanggan/dashboard');
        }

        // Redirect default jika tidak ada role yang sesuai
        return redirect('/')->with('error', 'Role tidak dikenali.');
    }
}

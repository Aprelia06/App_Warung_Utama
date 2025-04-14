<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data kategori produk dan urutkan berdasarkan waktu dibuat (paling baru di atas)
        $kategoriProduks = KategoriProduk::orderBy('created_at', 'desc')->get();

        return view('kategori_produks.index', compact('kategoriProduks'));
    }


    // public function index()
    
    // {
    //     $kategoriProduks = KategoriProduk::all(); // Ambil semua data kategori produk
    //     return view('kategori_produks.index', compact('kategoriProduks')); // Kirim data ke view
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori_produks.create'); // Tampilkan form untuk membuat kategori baru
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:50',
            'deskripsi' => 'nullable|max:255',
        ]);

        KategoriProduk::create($validated); // Simpan data kategori produk baru

        return redirect()->route('kategori_produks.index')->with('success', 'Kategori produk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriProduk = KategoriProduk::findOrFail($id); // Ambil data kategori produk berdasarkan ID
        return view('kategori_produks.edit', compact('kategoriProduk')); // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:50',
            'deskripsi' => 'nullable|max:255',
        ]);

        $kategoriProduk = KategoriProduk::findOrFail($id);
        $kategoriProduk->update($validated); // Update data kategori produk

        return redirect()->route('kategori_produks.index')->with('success', 'Data kategori berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriProduk = KategoriProduk::findOrFail($id);
        $kategoriProduk->delete(); // Hapus kategori produk

        return redirect()->route('kategori_produks.index')->with('success', 'Kategori produk berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    // Ambil nilai pencarian dari input query string
    $search = $request->query('search');

    $produks = Produk::with('kateg_produks')->when($search, function ($query) use ($search) {
        $query->where('nama_produk', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%")
              ->orWhere('harga', 'like', "%{$search}%");
    })->orderBy('created_at', 'desc') // Urutkan dari yang terbaru
      ->get();

    // Kirim data toko dan nilai pencarian ke view
    return view('produks.index', compact('produks', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriProduk::all();
        return view('produks.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

    $request->merge(['harga' => str_replace('.', '', $request->harga)]);
    // Validasi data
    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'kategori_produk_id' => 'required|exists:kategori_produks,kategori_produk_id',
        'deskripsi' => 'required|string|max:1000',
        'harga' => 'required|integer|min:0',
        'stok' => 'required|integer|min:0',
        'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
    ]);

    // Upload gambar jika ada
    $path = null;
    if ($request->hasFile('gambar_produk')) {
        $path = $request->file('gambar_produk')->store('produk', 'public');
    }

    // Simpan data
    Produk::create([
        'nama_produk' => $request->nama_produk,
        'kategori_produk_id' => $request->kategori_produk_id,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'gambar_produk' => $path,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan!');
}


public function show($id)
{
    $produks = Produk::findOrFail($id);

    return view('produks.show', compact('produks'));
}


    public function edit($id)
    {
        $produks = Produk::findOrFail($id); // Ambil data produk berdasarkan ID
        $kategori = KategoriProduk::all();
        return view('produks.edit', compact('produks', 'kategori')); // Kirim data toko ke view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_produk_id' => 'required|exists:kategori_produks,kategori_produk_id',
            'nama_produk' => 'required|max:50',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|min:0', // Harga harus berupa angka dan minimal 0
            'stok' => 'required|integer|min:0',  // Stok harus berupa bilangan bulat dan minimal 0
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan perubahan data toko
        $produks = Produk::findOrFail($id);
        $produks->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('produks.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Menghapus data toko
         $produks = Produk::findOrFail($id);
         $produks->delete();
 
         // Redirect ke halaman index dengan pesan sukses
         return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus.');
    }
}





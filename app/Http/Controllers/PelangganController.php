<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::all(); // Ambil semua data kategori produk
        return view('pelanggans.index', compact('pelanggans')); // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggans.create'); // Tampilkan form untuk membuat kategori baru

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
            'nama' => 'required|max:255',
            'no_telp' => 'nullable|max:255',
        ]);

       Pelanggan::create($validated); // Simpan data kategori produk baru

        return redirect()->route('pelanggans.index')->with('success', 'pelanggan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    // public function show(Pelanggan $pelanggan)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggans = Pelanggan::findOrFail($id); // Ambil data kategori produk berdasarkan ID
        return view('pelanggans.edit', compact('pelanggans')); // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'no_telp' => 'nullable',
        ]);

        $pelanggans = Pelanggan::findOrFail($id);
        $pelanggans->update($validated); // Update data kategori produk

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggans = Pelanggan::findOrFail($id);
        $pelanggans->delete(); // Hapus kategori produk

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}

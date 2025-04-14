<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index(Request $request)
{
    // Ambil nilai pencarian dari input query string
    $search = $request->query('search');

    // Jika ada pencarian, filter data toko berdasarkan kolom tertentu dan urutkan dari terbaru
    $tokos = Toko::when($search, function ($query, $search) {
        $query->where('nama_toko', 'like', "%{$search}%")
              ->orWhere('nama_pemilik', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%");
    })->orderBy('created_at', 'desc') // Urutkan dari yang terbaru
      ->get();

    // Kirim data toko dan nilai pencarian ke view
    return view('tokos.index', compact('tokos', 'search'));
}


       public function create()
    {
        return view('tokos.create'); // Tampilan form untuk membuat toko baru
    }

    
    // public function store(Request $request)









    // {
    //     // Validasi input
    //     $validated = $request->validate([
    //         'nama_toko' => 'required|max:50',
    //         'nama_pemilik' => 'required|max:50',
    //         'alamat' => 'required',
    //         'telepon' => 'nullable|max:15',
    //         'status_toko' => 'required|in:aktif,non-aktif',
    //         'deskripsi' => 'nullable',
    //         'kategori_toko' => 'nullable|max:50',
    //         'gambar_toko' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $gambarPath = null;
    
    //     if ($request->hasFile('gambar_toko')) {
    //         $file = $request->file('gambar_toko');
    
    //         // Simpan gambar di 'storage/app/public/toko'
    //         $gambarPath = $file->store('toko', 'public'); 
    //     }

    //     // Menyimpan data toko ke database
    //     Toko::create($validated);

    //     // Redirect ke halaman index dengan pesan sukses
    //     return redirect()->route('tokos.index')->with('success', 'Toko berhasil ditambahkan.');
    // }


    
















    //  public function show($id)
    //  dd($toko->gambar_toko);

    //  {        
    //      $toko = Toko::findOrFail($id);
    //      return view('tokos.show', compact('toko'));
    //  }

     
    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'nama_toko' => 'required|max:50',
        'nama_pemilik' => 'required|max:50',
        'alamat' => 'required',
        'telepon' => 'nullable|max:15',
        'status_toko' => 'required|in:aktif,non-aktif',
        'deskripsi' => 'nullable',
        'kategori_toko' => 'nullable|max:50',
        'gambar_toko' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Simpan gambar jika ada
    if ($request->hasFile('gambar_toko')) {
        $file = $request->file('gambar_toko');
        
        // Perbaikan: Simpan dengan nama unik
        $filename = time() . '_' . $file->getClientOriginalName();

        // Pindahkan file ke storage
        $gambarPath = $file->storeAs('toko', $filename, 'public');  

        // Tambahkan path ke array validated
        $validated['gambar_toko'] = $gambarPath;
    }

    // Simpan data ke database
    Toko::create($validated);

    // Redirect ke halaman index
    return redirect()->route('tokos.index')->with('success', 'Toko berhasil ditambahkan.');
}

    public function show($id)
{
    $toko = Toko::findOrFail($id);
    // dd($toko->gambar_toko); // Debugging setelah data ditemukan

    return view('tokos.show', compact('toko'));
}


     public function edit($id)
    {
        $toko = Toko::findOrFail($id); // Ambil data toko berdasarkan ID
        return view('tokos.edit', compact('toko')); // Kirim data toko ke view
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
        // Validasi input
        $validated = $request->validate([
            'nama_toko' => 'required|max:50',
            'nama_pemilik' => 'required|max:50',
            'alamat' => 'required',
            'telepon' => 'nullable|max:15',
            'status_toko' => 'required|in:aktif,non-aktif',
            'deskripsi' => 'nullable',
            'kategori_toko' => 'nullable|max:50',
            'gambar_toko' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan perubahan data toko
        $toko = Toko::findOrFail($id);
        $toko->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus data toko
        $toko = Toko::findOrFail($id);
        $toko->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil dihapus.');
    }
}

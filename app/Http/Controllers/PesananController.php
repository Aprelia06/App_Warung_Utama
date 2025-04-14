<?php 

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\DetailPesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $pesanans = Pesanan::with('detailPesanans.produk')->when($search, function ($query) use ($search) {
            $query->where('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('no_telp', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')
          ->get();

        return view('pesanans.index', compact('pesanans'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('pesanans.create', compact('produks'));
    }

    public function store(Request $request)
{
    $request->validate([
        'produk_id' => 'required|array|min:1',
        'produk_id.*' => 'exists:produks,produk_id',
        'tanggal_pesanan' => 'required|date',
        'nama_pelanggan' => 'required|string|max:255',
        'no_telp' => 'required|string|max:15',
        'jumlah' => 'required|array',
        'jumlah.*' => 'integer|min:1',
        'catatan' => 'nullable|string',
    ]);

    DB::beginTransaction();
    try {
        $user = auth()->user(); // Ambil user yang sedang login

        // Buat pesanan
        $pesanan = Pesanan::create([
            'tanggal_pesanan' => $request->tanggal_pesanan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telp' => $request->no_telp,
            'subtotal' => 0, // Akan diperbarui nanti
            'catatan' => $request->catatan,
            'user_id' => $user->userID, 
        ]);

        $total_pesanan = 0;

        foreach ($request->produk_id as $index => $produk_id) {
            $produk = Produk::findOrFail($produk_id);
            $jumlah = $request->jumlah[$index];

            // Cek stok
            if ($produk->stok < $jumlah) {
                return redirect()->back()->with('error', 'Stok untuk ' . $produk->nama_produk . ' tidak mencukupi! Tersisa: ' . $produk->stok);
            }

            $harga = $produk->harga;
            $total = $harga * $jumlah;
            $total_pesanan += $total;

            // Kurangi stok
            $produk->decrement('stok', $jumlah);

            // Simpan detail pesanan
            DetailPesanan::create([
                'pesanan_id' => $pesanan->pesanan_id,
                'produk_id' => $produk_id,
                'harga' => $harga,
                'jumlah' => $jumlah,
                'total' => $total,
            ]);
        }

        // Update subtotal di pesanan
        $pesanan->update(['subtotal' => $total_pesanan]);

    //    // **Kurangi poin user**
    //     $user = User::findOrFail(auth()->user()->userID); // Ambil data user

    //     if ($user->point >= $total_pesanan) {
    //         $user->decrement('point', $total_pesanan); // Kurangi poin user
    //     } else {
    //         return redirect()->back()->with('error', 'Poin tidak cukup untuk melakukan transaksi!');
    //     }

        DB::commit();

        return redirect()->route('transaksi.create', ['pesanan_id' => $pesanan->pesanan_id]);
        
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

//     public function store(Request $request)
// {
//     // dd(auth()->user());

//     $request->validate([
//         'produk_id' => 'required|array|min:1',
//         'produk_id.*' => 'exists:produks,produk_id', // Pastikan field ID benar
//         'tanggal_pesanan' => 'required|date',
//         'nama_pelanggan' => 'required|string|max:255',
//         'no_telp' => 'required|string|max:15',
//         'jumlah' => 'required|array',
//         'jumlah.*' => 'integer|min:1',
//         'catatan' => 'nullable|string',
//     ]);

//     DB::beginTransaction();
//     try {
//         // Buat pesanan
//         $pesanan = Pesanan::create([
//             'tanggal_pesanan' => $request->tanggal_pesanan,
//             'nama_pelanggan' => $request->nama_pelanggan,
//             'no_telp' => $request->no_telp,
//             'subtotal' => 0, // Akan diperbarui nanti
//             'catatan' => $request->catatan,
//             // 'user_id' => $request->userID, // ambil dari input hidden

//             'user_id' => auth()->user()->userID, 
//             // 'user_id' => auth()->id(), // pastikan ini ada


//         ]);

        

//         $total_pesanan = 0;

//         foreach ($request->produk_id as $index => $produk_id) {
//             $produk = Produk::findOrFail($produk_id);
//             $jumlah = $request->jumlah[$index];

//             // Cek stok
//             if ($produk->stok < $jumlah) {
//                 return redirect()->back()->with('error', 'Stok untuk ' . $produk->nama_produk . ' tidak mencukupi! Tersisa: ' . $produk->stok);
//             }

//             $harga = $produk->harga;
//             $total = $harga * $jumlah;
//             $total_pesanan += $total;

//             // Kurangi stok
//             $produk->decrement('stok', $jumlah);

//             // Simpan detail pesanan
//             DetailPesanan::create([
//                 'pesanan_id' => $pesanan->pesanan_id, // Pakai 'id' bukan 'pesanan_id'
//                 'produk_id' => $produk_id,
//                 'harga' => $harga,
//                 'jumlah' => $jumlah,
//                 'total' => $total,
//             ]);
//         }

//         // Update subtotal di pesanan
//         $pesanan->update(['subtotal' => $total_pesanan]);

//         DB::commit();
        

//         // Redirect ke form transaksi, pastikan nama route sesuai di web.php
//         return redirect()->route('transaksi.create', ['pesanan_id' => $pesanan->pesanan_id]);


//     // } catch (\Exception $e) {
//     //     DB::rollBack();
//     //     return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan pesanan.');
//     // }
//         } catch (\Exception $e) {
//             DB::rollBack();
//             return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
//         }


    
// }


    public function show($id)
    {
        $pesanan = Pesanan::with('detailPesanans.produk')->findOrFail($id);
        return view('pesanans.show', compact('pesanan'));
    }

    public function edit($id)
    {
        $pesanan = Pesanan::with('detailPesanans')->findOrFail($id);
        $produks = Produk::all();
        return view('pesanans.edit', compact('pesanan', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produk_id' => 'required|array|min:1',
            'produk_id.*' => 'exists:produks,produk_id',
            'tanggal_pesanan' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $pesanan = Pesanan::findOrFail($id);
            $total_pesanan = 0;

            // Hapus semua detail pesanan lama & kembalikan stok
            foreach ($pesanan->detailPesanans as $detail) {
                $produk = Produk::findOrFail($detail->produk_id);
                $produk->increment('stok', $detail->jumlah);
                $detail->delete();
            }

            // Simpan detail pesanan baru
            foreach ($request->produk_id as $index => $produk_id) {
                $produk = Produk::findOrFail($produk_id);
                $jumlah = $request->jumlah[$index];

                // Cek stok
                if ($produk->stok < $jumlah) {
                    return redirect()->back()->with('error', 'Stok untuk ' . $produk->nama_produk . ' tidak mencukupi! Tersisa: ' . $produk->stok);
                }

                $harga = $produk->harga;
                $total = $harga * $jumlah;
                $total_pesanan += $total;

                // Kurangi stok
                $produk->decrement('stok', $jumlah);

                // Simpan detail pesanan
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->pesanan_id,
                    'produk_id' => $produk_id,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                    'total' => $total,
                ]);
            }

            // Update pesanan
            $pesanan->update([
                'tanggal_pesanan' => $request->tanggal_pesanan,
                'nama_pelanggan' => $request->nama_pelanggan,
                'no_telp' => $request->no_telp,
                'subtotal' => $total_pesanan,
                'catatan' => $request->catatan,
                // 'user_id' => $request->userID, // ambil dari input hidden

                // 'user_id' => auth()->id(), // pastikan ini ada

                'user_id' => auth()->user()->userID, // ✅ Optional (kalau mau tracking user yang update)

                
            ]);

            DB::commit();
            return redirect()->route('pesanans.index')->with('success', 'Pesanan berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Stok tidak mencukupi!');

            // return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui pesanan.');
        }
    }


    public function destroy($id)
{
    DB::beginTransaction();
    try {
        $pesanan = Pesanan::with('detailPesanans')->findOrFail($id);

        // Hapus semua detail pesanan yang terkait
        $pesanan->detailPesanans()->delete();

        // Hapus pesanan utama
        $pesanan->delete();

        DB::commit();
        return redirect()->route('pesanans.index')->with('success', 'Pesanan berhasil dihapus.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
}

<?php

// use App\Http\Controllers\TokoController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\KategoriProdukController;
// use App\Http\Controllers\PelangganController;
// use App\Http\Controllers\ProdukController;
// use App\Http\Controllers\PesananController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\DetailPesananController;
// use App\Http\Controllers\TransaksiController;
// use App\Http\Controllers\PelangganDashboardController;
// use App\Http\Controllers\TokoDashboardController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\RedirectController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });
// use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     if (Auth::check()) {
//         return redirect('/dashboard');
//     }
//     return view('welcome');
// });

// require __DIR__ . '/auth.php';

// route::resource('tokos', TokoController::class);
// route::resource('pelanggans', PelangganController::class);
// route::resource('pesanans', PesananController::class);
// // Route::delete('/pesanans/bulk-delete', [PesananController::class, 'bulkDelete'])->name('pesanans.bulkDelete');
// route::resource('detail_pesanans', DetailPesananController::class);
// route::resource('produks', ProdukController::class);
// route::resource('kategori_produks', KategoriProdukController::class);
// route::resource('transaksi', TransaksiController::class);
// Route::get('/transaksi/struk/{transaksi_id}', [TransaksiController::class, 'struk'])->name('transaksi.struk');

// Route::get('/admin/tambah-poin', [UserController::class, 'showTambahPoinForm'])->name('admin.showTambahPoinForm');

// Route::post('/admin/tambah-poin', [UserController::class, 'tambahPoin'])->name('admin.tambahPoin');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/daftartoko', function () {
//     return view('/daftartoko');
// });

// Route::get('/daftarproduk', function () {
//     return view('/daftarproduk');
// });


// Route::get('/contactus', function () {
//     return view('/contactus');

// });

// // Rute setelah login
// Route::get('/redirect-dashboard', [RedirectController::class, 'handleRedirect'])->middleware(['auth']);

// // Rute untuk admin
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });


// // Rute untuk toko
// Route::middleware(['auth', 'role:toko'])->group(function () {
//     Route::get('/toko/dashboard', [TokoDashboardController::class, 'index'])->name('toko.dashboard');
// });

// // Rute untuk pelanggan
// Route::middleware(['auth', 'role:pelanggan'])->group(function () {
//     Route::get('/pelanggan/dashboard', [PelangganDashboardController::class, 'dashboard'])->name('pelanggan.dashboard');
//     Route::resource('pesanan', PesananController::class);
//     Route::resource('transaksi', TransaksiController::class);
// });


// use SimpleSoftwareIO\QrCode\Facades\QrCode;

// Route::get('/test-qr', function () {
//     return QrCode::size(300)->generate('Hello Dunia dari Yunho!');
// });


use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganDashboardController;
use App\Http\Controllers\TokoDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RedirectController;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


Route::get('/transaksi/struk/{id}', [TransaksiController::class, 'struk'])->name('transaksi.struk')->middleware('auth');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }

// Ambil produk dari database
$produks = Produk::latest()->get(); 

return view('welcome', compact('produks')); 


});

    
    
// Rute otentikasi
require __DIR__.'/auth.php';

// Resource Controller
route::resource('tokos', TokoController::class);
route::resource('pelanggans', PelangganController::class);
route::resource('pesanans', PesananController::class);
route::resource('detail_pesanans', DetailPesananController::class);
route::resource('produks', ProdukController::class);
route::resource('kategori_produks', KategoriProdukController::class);
Route::resource('transaksi', TransaksiController::class);

Route::get('transaksi/create/{pesanan_id}', [TransaksiController::class, 'create'])->name('transaksi.create');


// Struk transaksi
// Route::get('/transaksi/struk/{transaksi_id}', [TransaksiController::class, 'struk'])->name('transaksi.struk');

// Admin tambah poin
Route::get('/admin/tambah-poin', [UserController::class, 'showTambahPoinForm'])->name('admin.showTambahPoinForm');
Route::post('/admin/tambah-poin', [UserController::class, 'tambahPoin'])->name('admin.tambahPoin');
Route::put('/admin/reset-poin/{id}', [UserController::class, 'resetPoin'])->name('admin.resetPoin');


// Rute halaman tambahan
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/daftartoko', function () {
//     $tokos = Toko::latest()->get(); 

//     return view('daftartoko');
// });

Route::get('/daftartoko', function () {
    $tokos = Toko::latest()->get(); 

    return view('daftartoko', compact('tokos'));
});


Route::get('/daftarproduk', function () {
    return view('daftarproduk');
});

Route::get('/contactus', function () {
    return view('contactus');
});


// Rute setelah login
Route::get('/redirect-dashboard', [RedirectController::class, 'handleRedirect'])->middleware(['auth']);

// Rute untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Rute untuk toko
Route::middleware(['auth', 'role:toko'])->group(function () {
    Route::get('/toko/dashboard', [TokoDashboardController::class, 'index'])->name('toko.dashboard');
});

    //Rute untuk pelanggan
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', [PelangganDashboardController::class, 'dashboard'])->name('pelanggan.dashboard');
});

// Rute untuk pelanggan


// **Cek QR Code**
Route::get('/test-qr', function () {
    return QrCode::size(300)->generate('Hello Dunia dari Yunho!');
});


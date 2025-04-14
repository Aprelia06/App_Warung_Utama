<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    // Menentukan tabel yang digunakan
    protected $table = 'produks';
    protected $primaryKey = 'produk_id'; // Primary key dari tabel

    // Menentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'kategori_produk_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'gambar_produk'
    ];
    public function kateg_produks()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id', 'kategori_produk_id' );
    }

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class, 'produk_id', 'pesanan_id');
    }
    


}

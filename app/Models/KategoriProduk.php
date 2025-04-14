<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_produks'; // Nama tabel di database

    protected $primaryKey = 'kategori_produk_id'; // Primary key

    public $timestamps = true; // Jika tabel memiliki kolom created_at dan updated_at

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'produk_id', 'produk_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    // Menentukan tabel yang digunakan
    protected $table = 'tokos';
    protected $primaryKey = 'toko_id'; // Primary key dari tabel

    // Menentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_toko',
        'nama_pemilik',
        'alamat',
        'telepon',
        'status_toko',
        'deskripsi',
        'kategori_toko',
        'gambar_toko'
    ];

    public function tokos()
    {
        return $this->hasMany(Toko::class, 'toko_id', 'toko_id');
    }
}
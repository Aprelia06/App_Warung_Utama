<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans'; // Nama tabel di database

    protected $primaryKey = 'pelanggan_id'; // Primary key

    public $timestamps = true; // Jika tabel memiliki kolom created_at dan updated_at

    protected $fillable = [
        'nama',
        'no_telp',
    ];

    public function pelanggans()
    {
        return $this->hasMany(Pelanggan::class, 'pelanggan_id', 'pelanggan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $primaryKey = 'pesanan_id'; // Primary key dari tabel

    protected $fillable = [
        'tanggal_pesanan',
        'nama_pelanggan',
        'no_telp',
        'subtotal',
        'catatan',
        'user_id'
    ];

    // public function detailPesanans()
    // {
    //     return $this->hasMany(DetailPesanan::class);
    // }
    
    public function detailPesanans()
{
    return $this->hasMany(DetailPesanan::class, 'pesanan_id', 'pesanan_id');
}

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userID');
    }
    public function transaksi()
{
    return $this->hasOne(Transaksi::class, 'pesanan_id');
}

}

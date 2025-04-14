<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Nama tabel di database

    protected $primaryKey = 'transaksi_id'; // Primary Key

    protected $fillable = [
        'pesanan_id',
        'total_pesanan',
        'metode_pembayaran',
        'uang_bayar',
        'kembalian',
        'status_pembayaran',
        'waktu_transaksi',
    ];

    public $timestamps = true;

    // Relasi ke Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'pesanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userID');
    }
}



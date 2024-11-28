<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'id',
        'id_peminjaman',
        'bukti_pembayaran',
        'metode_pembayaran',
        'status'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanModel::class, 'id_peminjaman');
    }
}

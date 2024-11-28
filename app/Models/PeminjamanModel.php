<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\UserModel;

class PeminjamanModel extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = [
        'id_buku',
        'id_anggota',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
        'waktu_peminjaman',
        'denda',
        'tanggal_dikembalikan',
        'bukti_pembayaran',
        'metode_pembayaran'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'id_anggota');
    }
}

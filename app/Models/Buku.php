<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table ='buku';
    protected $fillable = ['id', 'judul_buku', 'penulis', 'penerbit', 'tahun_terbit', 'id_kategori', 'stok', 'foto'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori'); // Menghubungkan id_kategori dengan model Kategori
    }

    public function peminjaman()
    {
        return $this->hasOne(PeminjamanModel::class, 'id_buku')->where('id_anggota', Auth::id())->latest();
    }
}


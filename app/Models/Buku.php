<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table ='buku';
    protected $fillable = ['id', 'judul_buku', 'penulis', 'penerbit', 'tahun_terbit', 'isbn', 'id_kategori', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori'); // Menghubungkan id_kategori dengan model Kategori
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role'; // Pastikan ini mengarah ke nama tabel yang benar
    protected $fillable = ['name']; // Kolom yang dapat diisi
}

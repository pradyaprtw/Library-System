<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'email',
        'tanggal_daftar',
        'username',
        'password',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}

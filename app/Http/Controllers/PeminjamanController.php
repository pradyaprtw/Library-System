<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\PeminjamanModel;
use App\Models\UserModel;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = PeminjamanModel::all();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $peminjaman = PeminjamanModel::all();
        $buku = Buku::all();
        $users = UserModel::all();
        return view('peminjaman.create_peminjaman', compact('peminjaman'));
    }
}

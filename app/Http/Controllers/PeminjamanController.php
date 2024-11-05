<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\PeminjamanModel;

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

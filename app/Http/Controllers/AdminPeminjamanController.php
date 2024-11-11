<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\PeminjamanModel;

class AdminPeminjamanController extends Controller
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

    public function status($id)
    {
        $peminjaman = PeminjamanModel::findOrFail($id);
        $peminjaman->status = 'Dipinjam';
        $peminjaman->save();
        return view('peminjaman.index', compact('peminjaman'));
    }
}

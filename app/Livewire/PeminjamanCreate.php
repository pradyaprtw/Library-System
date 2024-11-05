<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use App\Models\UserModel;
use App\Models\PeminjamanModel;

class PeminjamanCreate extends Component
{
    public $id_buku;
    public $id_anggota;
    public $tanggal_peminjaman;
    public $tanggal_pengembalian;
    public $buku;
    public $users;
    public $peminjaman;

    public function mount()
    {
        $this->buku = Buku::all();
        $this->users = UserModel::with('role')->where('role_id', 2)->get();
        $this->peminjaman = new PeminjamanModel();

    }

    public function store()
    {
        $this->validate([
            'id_buku' => 'required',
            'id_anggota' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date',
        ]);

        PeminjamanModel::create([
            'id_buku' => $this->id_buku,
            'id_anggota' => $this->id_anggota,
            'tanggal_peminjaman' => $this->tanggal_peminjaman,
            'tanggal_pengembalian' => $this->tanggal_pengembalian,
            'status' => 'Dipinjam', // Atur status default jika ada
        ]);

        $this->reset(['id_buku', 'id_anggota', 'tanggal_peminjaman', 'tanggal_pengembalian']);

        return redirect()->route('peminjaman.index');
    }

    public function render()
    {
        return view('livewire.peminjaman-create');
    }
}

<?php

// app/Livewire/PeminjamanCreate.php

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

    public function mount()
    {
        $this->buku = Buku::all();
        $this->users = UserModel::with('role')->where('role_id', 2)->get();
    }

    public function store()
    {
        $this->validate([
            'id_buku' => 'required',
            'id_anggota' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date',
        ]);

        // Ambil buku yang dipinjam dan cek stoknya
        $buku = Buku::findOrFail($this->id_buku);

        if ($buku->stok <= 0) {
            session()->flash('error', 'Stok buku tidak tersedia.');
            return;
        }

        // Kurangi stok buku
        $buku->stok -= 1;
        $buku->save();

        // Simpan data peminjaman
        PeminjamanModel::create([
            'id_buku' => $this->id_buku,
            'id_anggota' => $this->id_anggota,
            'tanggal_peminjaman' => $this->tanggal_peminjaman,
            'tanggal_pengembalian' => $this->tanggal_pengembalian,
            'status' => 'Dipinjam',
        ]);

        // Reset form
        $this->reset(['id_buku', 'id_anggota', 'tanggal_peminjaman', 'tanggal_pengembalian']);

        session()->flash('success', 'Buku berhasil dipinjam.');

        // Redirect atau refresh halaman
        return redirect()->route('peminjaman.index');
    }

    public function render()
    {
        return view('livewire.peminjaman-create');
    }
}

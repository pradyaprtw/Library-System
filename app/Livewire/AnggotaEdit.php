<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserModel;

class AnggotaEdit extends Component
{
    public $userId; // Tambahkan ini untuk menyimpan ID
    public $nama, $alamat, $no_telepon, $email, $tanggal_daftar;

    public function mount($id)
    {
        $this->userId = $id; // Simpan ID
        
        $user = UserModel::findOrFail($id);
        
        // Sesuaikan nama field dengan database
        $this->nama = $user->nama;  // pastikan sesuai dengan nama kolom di database
        $this->alamat = $user->alamat;
        $this->no_telepon = $user->no_telepon;
        $this->email = $user->email;
        $this->tanggal_daftar = $user->tanggal_daftar;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
        ]);

        $user = UserModel::findOrFail($this->userId);

        $user->update([
            'nama' => $this->nama,  // sesuaikan dengan nama kolom di database
            'alamat' => $this->alamat,
            'no_telepon' => $this->no_telepon,
            'email' => $this->email,
            'tanggal_daftar' => $this->tanggal_daftar,
        ]);

        session()->flash('message', 'Anggota berhasil diperbarui.');
        return redirect()->route('anggota.index');  // sesuaikan dengan nama route
    }

    public function render()
    {
        return view('livewire.anggota-edit');  // pastikan nama view sesuai
    }
}
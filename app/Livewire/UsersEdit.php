<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserModel;

class UsersEdit extends Component
{
    public $userId; // Tambahkan ini untuk menyimpan ID
    public $nama, $alamat, $no_telepon, $email, $username, $password;

    public function mount($id)
    {
        $this->userId = $id; // Simpan ID
        
        $user = UserModel::findOrFail($id);
        
        // Sesuaikan nama field dengan database
        $this->nama = $user->nama;  // pastikan sesuai dengan nama kolom di database
        $this->alamat = $user->alamat;
        $this->no_telepon = $user->no_telepon;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->password = $user->password;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = UserModel::findOrFail($this->userId);

        $user->update([
            'nama' => $this->nama,  // sesuaikan dengan nama kolom di database
            'alamat' => $this->alamat,
            'no_telepon' => $this->no_telepon,
            'email' => $this->email,
            'username' => $this->username,
            'password' => bcrypt($this->password), // gunakan bcrypt untuk enkripsi password
        ]);

        $this->resetInput();
        $this->dispatch('userUpdated', $user->id);

        return redirect()->route('anggota.home')->with('success', 'User updated successfully.');
    }

    public function render()   
    {
        return view('livewire.users-edit');
    }

    private function resetInput()
    {
        $this->nama = null;
        $this->alamat = null;
        $this->no_telepon = null;
        $this->email = null;
        $this->username = null;
        $this->password = null;
    }
}

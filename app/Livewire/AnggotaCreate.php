<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserModel;

class AnggotaCreate extends Component
{
    public $nama, $alamat, $no_telepon, $email, $tanggal_daftar, $username, $password, $role_id;
    
    public function mount(){
        $this->role_id = 2;
    }

    public function store()
    {
        // dd($this->all());
        $this->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'tanggal_daftar' => 'required|date_format:Y-m-d',  // Menambahkan aturan format tanggal
        ]);

        UserModel::create([
            'nama' => $this->nama,  
            'alamat' => $this->alamat,
            'no_telepon' => $this->no_telepon,
            'email' => $this->email,
            'tanggal_daftar' => $this->tanggal_daftar,
            'role_id' => $this->role_id,
        ]);

        $this->resetInput();
        $this->dispatch('anggotaAdded');
        session()->flash('success', 'Anggota berhasil ditambahkan.');

        return redirect()->route('anggota.index');
    }

    public function edit($id){
        $users = UserModel::find($id);
        
        $this->nama = $users->nama; 
        $this->alamat = $users->alamat;
        $this->no_telepon = $users->no_telepon;
        $this->email = $users->email;
        $this->tanggal_daftar = $users->tanggal_daftar;
        $this->username = $users->username;
        $this->password = $users->password;
        $this->role_id = $users->role_id;

        $this->dispatch('anggotaEdited');
        $this->emit('showModal');

        return redirect()->route('anggota.index');
    }

    private function resetInput()
    {
        $this->nama = '';
        $this->alamat = '';
        $this->no_telepon = '';
        $this->email = '';
        $this->tanggal_daftar = '';
        $this->username = '';
        $this->password = '';
        $this->role_id = '';
    }
    public function render()
    {
        return view('livewire.anggota-create');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserModel;

class AnggotaTable extends Component
{
    public function render()
    {
        $anggota = UserModel::with('role')->where('role_id', 2)->get();

        return view('livewire.anggota-table', [
            'anggota' => $anggota, // Pastikan data ini tersedia di view Livewire
        ]);
    }

    public function delete($id)
    {
        $anggota = UserModel::findOrFail($id);
        $anggota->delete();

        session()->flash('message', 'Anggota berhasil dihapus.');
        return redirect()->route('anggota.index');
    }
}

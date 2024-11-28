<?php

namespace App\Livewire;

use App\Models\PeminjamanModel;
use Livewire\Component;

class PeminjamanTable extends Component
{
    public function delete($id)
    {
        $peminjaman = PeminjamanModel::find($id);
        $peminjaman->delete();
        $this->dispatch('peminjamanDeleted');

        return redirect()->route('peminjaman.index');
    }
    public function render()
    {
        $peminjaman = PeminjamanModel::orderByRaw("FIELD(status, 'Menunggu Konfirmasi') DESC")
        ->orderBy('created_at', 'desc')
        ->get();
        return view('livewire.peminjaman-table', compact('peminjaman'));
    }

    public function changeStatus($id)
    {
        $peminjaman = PeminjamanModel::findOrFail($id);
        if($peminjaman && $peminjaman->status == 'Menunggu Konfirmasi'){
            $peminjaman->status = 'Dipinjam';
            $peminjaman->save();

            session()->flash('message', 'Peminjaman disetujui!');
        }else {
            session()->flash('error', 'Peminjaman tidak dapat disetujui.');
        }

    }

}

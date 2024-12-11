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

        session()->flash('success', 'Peminjaman berhasil dihapus.');
        return redirect()->route('peminjaman.index');
    }
    public function render()
    {
        $peminjaman = PeminjamanModel::orderByRaw("FIELD(status, 'Menunggu Konfirmasi', 'Dipinjam', 'Dikembalikan') ASC")
        ->orderBy('tanggal_peminjaman', 'desc')
        ->get();
        return view('livewire.peminjaman-table', compact('peminjaman'));
    }

    public function changeStatus($id)
    {
        $peminjaman = PeminjamanModel::findOrFail($id);
        if($peminjaman && $peminjaman->status == 'Menunggu Konfirmasi'){
            $peminjaman->status = 'Dipinjam';
            $peminjaman->save();

            session()->flash('success', 'Peminjaman disetujui!');
        }else {
            session()->flash('error', 'Peminjaman tidak dapat disetujui.');
        }

    }

}

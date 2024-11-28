<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PembayaranModel;
use App\Models\PeminjamanModel;

class DendaTable extends Component
{
    public function render()
    {
        $denda = PembayaranModel::whereHas('peminjaman', function ($query) {
            $query->where('denda', '>', 0);
        })->get();
        
        return view('livewire.denda-table', ['denda' => $denda]);
        
    }

    public function changeStatus($id)
    {
        $pembayaran = PembayaranModel::findOrFail($id);
        if($pembayaran && $pembayaran->pembayaran_status == 'Pending'){
            $pembayaran->pembayaran_status = 'Konfirmasi';
            $pembayaran->save();

            session()->flash('message', 'pembayaran disetujui!');
        }else {
            session()->flash('error', 'pembayaran tidak dapat disetujui.');
        }

    }

   
}

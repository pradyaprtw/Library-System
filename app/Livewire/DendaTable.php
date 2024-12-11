<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PembayaranModel;
use App\Models\PeminjamanModel;

class DendaTable extends Component
{
    public function render()
    {
        $denda = PeminjamanModel::where('denda', '>', 0)
        ->orderBy('updated_at', 'desc')
        ->get();
        
        return view('livewire.denda-table', ['denda' => $denda]);
        
    }

    public function changeStatus($id)
    {
        $pembayaran = PembayaranModel::findOrFail($id);
        if($pembayaran && $pembayaran->pembayaran_status == 'Pending'){
            $pembayaran->pembayaran_status = 'Konfirmasi';
            $pembayaran->save();

            session()->flash('success', 'pembayaran disetujui!');
        }else {
            session()->flash('error', 'pembayaran tidak dapat disetujui.');
        }

    }

   
}

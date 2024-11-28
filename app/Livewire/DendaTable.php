<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PeminjamanModel;

class DendaTable extends Component
{
    public function render()
    {
        $denda = PeminjamanModel::whereNotNull('bukti_pembayaran')->get();
        return view('livewire.denda-table', ['denda' => $denda]);
        
    }

   
}

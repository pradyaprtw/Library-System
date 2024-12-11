<?php
// File: App/Livewire/BukuTable.php
namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use Livewire\Livewire;

class BukuTable extends Component
{

    public function render()
    {
        // Mengambil data buku dengan relasi kategori
        $buku = Buku::with('kategori')->orderBy('id', 'desc')->get();
        
        return view('livewire.buku-table', [
            'buku' => $buku
        ]);
    }

}

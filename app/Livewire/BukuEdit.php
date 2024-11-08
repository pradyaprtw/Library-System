<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithFileUploads;

class BukuEdit extends Component
{
    use WithFileUploads;
    
    public $buku;
    public $judul_buku, $penulis, $penerbit, $tahun_terbit, $id_kategori, $stok, $foto;
    public $kategori;

    public function mount($id)
    {
        $this->buku = Buku::find($id);
        $this->kategori = Kategori::all();
        $this->judul_buku = $this->buku->judul_buku;
        $this->penulis = $this->buku->penulis;
        $this->penerbit = $this->buku->penerbit;
        $this->tahun_terbit = $this->buku->tahun_terbit;
        $this->id_kategori = $this->buku->id_kategori;
        $this->stok = $this->buku->stok;
        $this->foto = $this->buku->foto;
    }
    public function render()
    {
        return view('livewire.buku-edit');
    }

    public function update()
    {
        $this->validate([
            'judul_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'id_kategori' => 'required|integer|exists:kategori,id',
            'stok' => 'required|integer|min:1',
            'foto' => 'required|image|max:2048',
        ]);

        $imagePath = $this->buku->foto;
        if ($this->foto) {
            $imagePath = $this->foto->store('images', 'public');
        }

        $this->buku->update([
            'judul_buku' => $this->judul_buku,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'id_kategori' => $this->id_kategori,
            'stok' => $this->stok,
            'foto' => $imagePath,
        ]);

        session()->flash('message', 'Buku berhasil diperbarui.');
        return redirect()->route('buku.index');
    }
}

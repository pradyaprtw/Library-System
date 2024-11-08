<?php
// File: App/Livewire/BukuCreate.php
namespace App\Livewire;

use Livewire\WithFileUploads;
use App\Models\Buku;
use App\Models\Kategori;
use Livewire\Component;

class BukuCreate extends Component
{
    
    use WithFileUploads;

    public $judul_buku, $penulis, $penerbit, $tahun_terbit, $id_kategori, $stok, $foto;
    public $kategori;
    /**
     * Initialize the component.
     *
     * Fetch all Kategori records from database and store it in the
     * $kategori property.
     *
     * @return void
     */
    public function mount()
    {
        $this->kategori = Kategori::all();
    }

    public function store()
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

        $imagePath = "";
        if ($this->foto) {
            $imagePath = $this->foto->store('images', 'public');
        }

        Buku::create([
            'judul_buku' => $this->judul_buku,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'id_kategori' => $this->id_kategori,
            'stok' => $this->stok,
            'foto' => $imagePath,
        ]);

        $this->resetInput();
        $this->dispatch('bukuAdded');
        session()->flash('success', 'Buku berhasil ditambahkan.');
        return redirect()->route('buku.index');

    }

    private function resetInput()
    {
        $this->judul_buku = '';
        $this->penulis = '';
        $this->penerbit = '';
        $this->tahun_terbit = '';
        $this->id_kategori = '';
        $this->stok = '';
        $this->foto = '';
    }

    public function render()
    {
        return view('livewire.buku-create');
    }
}

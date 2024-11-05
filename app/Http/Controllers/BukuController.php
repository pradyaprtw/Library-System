<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;

class BukuController extends Controller
{
    /**
     * Display a
     * sting of the resource.
     */
    public function buku($judul_buku, $penulis, $penerbit, $tahun_terbit, $id_kategori, $stok, $foto)
    {
        $data = [
            'judul_buku' => $judul_buku,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'nama_kategori' => $id_kategori,
            'stok' => $stok,
            'foto' => $foto
        ];

        return view('buku.buku', $data);
    }
    public function index()
    {
        $buku = Buku::with('kategori')->get(); // Memuat data buku dengan relasi kategori
        return view('buku.buku', compact('buku')); // Kirim data buku ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        // Ambil semua kategori untuk ditampilkan di dropdown
        $kategori = Kategori::all();
        $data = [
            'buku' => $buku,
            'kategori' => $kategori
        ];
        return view('buku.create_buku', compact('buku','kategori')); // Kirim data kategori ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'id_kategori' => 'required',
            'stok' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('buku.show_buku', compact('buku', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id); // Mengambil satu buku berdasarkan ID
        $kategori = Kategori::all(); // Mengambil semua kategori

        return view('buku.edit_buku', compact('buku', 'kategori')); // Mengirim model buku dan koleksi kategori ke view
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'id_kategori' => 'required|exists:kategori,id',
            'stok' => 'required|integer',
        ]);

        // Mengupdate data buku
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id); // Mengambil satu buku berdasarkan ID
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function buku($judul_buku, $penulis, $penerbit, $tahun_terbit, $isbn, $id_kategori, $stok)
    {
        $data = [
            'judul_buku' => $judul_buku,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'isbn' => $isbn,
            'nama_kategori' => $id_kategori,
            'stok' => $stok
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
        // Ambil semua kategori untuk ditampilkan di dropdown
        $kategori = Kategori::all();
        return view('buku.create_buku', compact('kategori')); // Kirim data kategori ke view
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
            'isbn' => 'required|unique:buku',
            'id_kategori' => 'required',
            'stok' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('buku.edit_buku', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'isbn' => 'required|unique:buku',
            'id_kategori' => 'required',
            'stok' => 'required|integer',
        ]);

        $buku = Buku::find($id);
        $buku->update($request->except('_token', '_method'));

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus');
    }
}
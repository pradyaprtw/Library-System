<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PeminjamanModel;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
    public function pinjam(Request $request, $id)
{
    $buku = Buku::findOrFail($id);

    // Cek apakah anggota memiliki denda yang belum dibayar
    $denda = PeminjamanModel::where('id_anggota', auth()->id())
        ->where('status', 'Dipinjam') // Hanya cek peminjaman yang belum selesai
        ->where('denda', '>', 0) // Cek apakah denda lebih dari 0
        ->first();

    if ($denda) {
        // Jika ada denda yang belum dibayar
        return redirect()->back()->with('error', 'Anda tidak bisa meminjam buku karena masih memiliki denda yang belum dibayar.');
    }

    // Cek apakah buku masih tersedia
    if ($buku->stok > 0) {
        $tanggal_peminjaman = now();
        $tanggal_pengembalian = Carbon::parse($request->tanggal_pengembalian);

        // Cek apakah inputan tanggal pengembalian lebih dari 10 hari
        if ($tanggal_pengembalian->diffInDays($tanggal_peminjaman) > 10) {
            Session::flash('error', 'Tanggal pengembalian tidak boleh lebih dari 10 hari.');
            return redirect()->back();
        }

        // Cek apakah inputan tanggal pengembalian sudah lewat
        if ($tanggal_pengembalian->isPast()) {
            Session::flash('error', 'Tanggal pengembalian yang Anda pilih sudah lewat.');
            return redirect()->back();
        }

        // Membuat peminjaman baru
        $peminjaman = new PeminjamanModel();
        $peminjaman->id_buku = $buku->id;
        $peminjaman->id_anggota = auth()->id(); // ID anggota yang sedang login
        $peminjaman->status = 'Menunggu Konfirmasi';
        $peminjaman->tanggal_peminjaman = $tanggal_peminjaman; // Menyimpan tanggal peminjaman
        $peminjaman->tanggal_pengembalian = $tanggal_pengembalian; // Menyimpan tanggal pengembalian
        $peminjaman->save();

        // Mengurangi stok buku
        $buku->stok--;
        $buku->save();

        Session::flash('success', 'Buku berhasil dipinjam, menunggu konfirmasi admin.');
        return redirect()->back()->with('success', 'Buku berhasil dipinjam, menunggu konfirmasi admin.');
    }

    return redirect()->back()->with('denda', 'Buku tidak tersedia untuk dipinjam!');
}


public function kembalikan($id)
{
    $buku = Buku::findOrFail($id);

    // Mengambil peminjaman terakhir buku
    $peminjaman = PeminjamanModel::where('id_buku', $buku->id)
        ->where('id_anggota', auth()->id())
        ->where('status', 'Dipinjam')
        ->first();

    if ($peminjaman) {
        // Menghitung selisih hari antara tanggal pengembalian dan tanggal peminjaman
        $tanggal_pengembalian = now();
        $tanggal_peminjaman = $peminjaman->created_at; // tanggal peminjaman
        $durasi_pinjam = $peminjaman->durasi_pinjam; // durasi pinjam yang dipilih anggota

        // Menghitung berapa hari keterlambatan
        $selisih_hari = $tanggal_pengembalian->diffInDays($tanggal_peminjaman, false);

        $denda = 0;
        if ($selisih_hari > $durasi_pinjam) {
            // Jika keterlambatan melebihi durasi pinjam, hitung denda
            $denda = ($selisih_hari - $durasi_pinjam) * 20000; // denda per hari = 20.000
            // Menyimpan denda pada peminjaman
            $peminjaman->denda = $denda;
        }

        // Mengupdate status peminjaman
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->tanggal_pengembalian = $tanggal_pengembalian; // Menyimpan tanggal pengembalian
        $peminjaman->save();

        // Menambahkan stok buku
        $buku->stok++;
        $buku->save();

        // Mengirimkan pesan ke view
        if ($denda > 0) {
            return redirect()->back()->with('denda', $denda); // Mengirimkan nilai denda
        }

        // Jika tidak ada denda
        return redirect()->back()->with('success', 'Buku berhasil dikembalikan tepat waktu!');
    }

    return redirect()->back()->with('error', 'Tidak ada peminjaman buku ini yang ditemukan!');
}



    public function riwayatPeminjaman()
    {
        $kategori = Kategori::all();
        // Mengambil riwayat peminjaman berdasarkan anggota yang sedang login
        $riwayat = PeminjamanModel::with('buku.kategori') // Mengambil data peminjaman dan buku terkait
            ->where('id_anggota', auth()->id()) // Filter berdasarkan ID anggota yang sedang login
            ->get();

        return view('anggota.riwayat', compact('riwayat'));
    }

    public function denda($id)
{
    $peminjaman = PeminjamanModel::findOrFail($id);

    if ($peminjaman) {
        // Anggap pembayaran berhasil, kita akan menghapus denda
        $peminjaman->denda = 0; // Menghapus denda
        $peminjaman->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pembayaran denda berhasil!');
    }

    return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan!');
}

}

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
            ->where('status', 'Dipinjam')
            ->where('denda', '>', 0)
            ->first();

        if ($denda) {
            return redirect()->back()->with('error', 'Anda tidak bisa meminjam buku karena masih memiliki denda yang belum dibayar.');
        }

        // Cek apakah buku masih tersedia
        if ($buku->stok > 0) {
            $tanggal_peminjaman = now();
            $tanggal_pengembalian = Carbon::parse($request->tanggal_pengembalian);

            // Cek apakah inputan tanggal pengembalian lebih dari 5 hari
            if ($tanggal_pengembalian->diffInDays($tanggal_peminjaman) > 5) {
                Session::flash('error', 'Tanggal pengembalian tidak boleh lebih dari 5 hari.');
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
            $peminjaman->id_anggota = auth()->id();
            $peminjaman->status = 'Menunggu Konfirmasi';
            $peminjaman->tanggal_peminjaman = $tanggal_peminjaman;
            $peminjaman->tanggal_pengembalian = $tanggal_pengembalian;
            $peminjaman->save();

            // Mengurangi stok buku
            $buku->stok--;
            $buku->save();

            Session::flash('success', 'Buku berhasil dipinjam, menunggu konfirmasi admin.');
            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Buku tidak tersedia untuk dipinjam!');
    }

    public function kembalikan(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // Mengambil peminjaman terakhir buku
        $peminjaman = PeminjamanModel::where('id_buku', $buku->id)
            ->where('id_anggota', auth()->id())
            ->where('status', 'Dipinjam')
            ->first();

        // Update status peminjaman
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->save();

        // Kembalikan stok buku
        $buku->stok++;
        $buku->save();

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan tepat waktu.');
    }

    public function riwayatPeminjaman()
    {
        $kategori = Kategori::all();
        // Mengambil riwayat peminjaman berdasarkan anggota yang sedang login
        $riwayat = PeminjamanModel::with('buku.kategori')
            ->where('id_anggota', auth()->id())
            ->get();

        return view('anggota.riwayat', compact('riwayat', 'kategori'));
    }


    public function konfirmasiPembayaranDenda(Request $request, $id)
    {
        $peminjaman = PeminjamanModel::findOrFail($id);

        // Validasi pembayaran
        $request->validate([
            'metode_pembayaran' => 'required|in:cash,transfer',
            'bukti_pembayaran' => 'required|image|max:2048'
        ]);

        // Simpan bukti pembayaran
        $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_denda', 'public');

        // Update status denda
        // $peminjaman->denda = ;
        $peminjaman->bukti_pembayaran = $buktiPembayaranPath;
        $peminjaman->metode_pembayaran = $request->metode_pembayaran;
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->save();

        // Sweetalert untuk konfirmasi pembayaran
        return redirect()->back()->with([
            'success' => 'Denda berhasil dibayar!',
            'title' => 'Pembayaran Berhasil'
        ]);
    }

    public function riwayatDenda()
    {
        $kategori = Kategori::all();
        $denda = PeminjamanModel::with('buku.kategori')
            ->where('id_anggota', auth()->id())
            ->where('denda', '>', 0)
            ->get();

        return view('anggota.denda', compact('denda', 'kategori'));
    }
}
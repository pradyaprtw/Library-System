@extends('layouts.app')

@section('content')
@section('title', 'Riwayat Peminjaman')

@include('/anggota/header')

<div class="container mt-4">
    <h3>Riwayat Peminjaman Anda</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayat as $item)
                    <tr>
                        <td>{{ $item->buku->judul_buku }}</td>
                        <td>{{ $item->buku->penulis }}</td>
                        <td>{{ $item->buku->tahun_terbit }}</td>
                        <td>{{ $item->buku->kategori->nama_kategori }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                        <td>
                            @if($item->status === 'Dipinjam')
                                <span class="badge bg-info">Dipinjam</span>
                            @elseif($item->status === 'Dikembalikan')
                                <span class="badge bg-success">Dikembalikan</span>
                            @else
                                <span class="badge bg-secondary">Status Tidak Diketahui</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Anda belum memiliki riwayat peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</div>
@endsection

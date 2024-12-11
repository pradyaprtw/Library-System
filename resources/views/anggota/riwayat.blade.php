@extends('layouts.app')

@section('content')
@section('title', 'Riwayat Peminjaman')

@include('/anggota/header')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Riwayat Peminjaman Anda</div>
                @if (session('message'))
                <div class='alert alert-success' role='alert'>
                    {{ session('message') }}
                </div>
                @endif
                <div class="card-body">
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->buku->judul_buku }}</td>
                                    <td>{{ $item->buku->penulis }}</td>
                                    <td>{{ $item->buku->tahun_terbit }}</td>
                                    <td>{{ $item->buku->kategori->nama_kategori }}</td>
                                    <td>{{ $item->tanggal_peminjaman }}</td>
                                    <td>{{ $item->tanggal_pengembalian }}</td>
                                    <td>
                                        @if($item->status == 'Menunggu Konfirmasi')
                                            <span class="text text-warning">Menunggu Konfirmasi</span>
                                        @elseif($item->status === 'Dipinjam')
                                            <span class="text text-info">Dipinjam</span>
                                        @elseif($item->status === 'Dikembalikan')
                                            <span class="text text-success">Dikembalikan</span>
                                        @else
                                            <span class="text text-secondary">Tidak Ada Peminjaman</span>
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
            </div>
        </div>
    </div>
</div>
@endsection

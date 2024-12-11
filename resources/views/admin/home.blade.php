@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('content')
@include('/admin/header')

<div class="container pt-4 mt-5">
    <!-- Statistik Utama -->
    <div class="row mb-4 text-center">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Anggota</h5>
                    <p class="card-text">{{ $users->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <i class="bi bi-book" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Jumlah Buku</h5>
                    <p class="card-text">{{ $buku->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-light">
                <div class="card-body">
                    <i class="bi bi-arrow-repeat" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Peminjaman</h5>
                    <p class="card-text">{{ $peminjaman->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <i class="bi bi-cash" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Denda</h5>
                    <p class="card-text">Rp {{ number_format($peminjaman->sum('denda'), 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris Kedua: Detail Tambahan -->
    <div class="row">
        <!-- Daftar Peminjaman Terbaru -->
        <div class="col-md-8">
            <div class="row mb-4 text-center">
                <div class="col-md-6">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <i class="bi bi-bookmark" style="font-size: 2rem;"></i>
                            <h5 class="card-title mt-2">Buku Dipinjam</h5>
                            <p class="card-text">{{ $peminjamanAktif->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <i class="bi bi-archive" style="font-size: 2rem;"></i>
                            <h5 class="card-title mt-2">Stok Keseluruhan</h5>
                            <p class="card-text">{{ $buku->sum('stok') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: #D76C82">
                    <h5 class="card-title">Peminjaman Terbaru</h5>
                </div>
                <div class="card-body" style="background-color: #b03052;">
                    <ul class="list-group">
                        @foreach($peminjamanTerbaru as $peminjaman)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $peminjaman->users->nama }}
                                <span class="badge bg-primary">
                                    {{ $peminjaman->buku->judul_buku }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: #D76C82">
                    <h5 class="card-title">Stok Buku</h5>
                </div>
                <div class="card-body" style="background-color: #b03052;">
                    <ul class="list-group">
                        @foreach($stokBuku as $buku)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $buku->judul_buku }}
                                <span class="badge bg-primary rounded-pill">
                                    {{ $buku->stok }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


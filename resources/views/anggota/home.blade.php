@extends('layouts.app')

@section('content')
@section('title', 'Home Anggota')
@include('/anggota/header')
@include('/modal/modal_peminjaman')

@if(session('denda'))
    <div class="alert alert-info">{{ session('denda') }}</div>
@endif

<div class="container mt-4">
<div class="row mb-4">
    <div class="col-md-4">
        <form action="{{ route('anggota.home') }}" method="GET">
            <select name="kategori" class="form-control" style="background-color: #B03052; color: #FFF4B7;" onchange="this.form.submit()">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kategoriItem)
                    <option value="{{ $kategoriItem->id }}" {{ request('kategori') == $kategoriItem->id ? 'selected' : '' }}>{{ $kategoriItem->nama_kategori }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>
    <div class="row">
        @foreach ($buku as $item)
        <div class="col-md-3">
            <div class="card m-2" style="background-color: #B03052">
                <div class="img-bx">
                    <img src="{{ asset('storage/'.$item->foto) }}" class="card-img-top" alt="gambar buku">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul_buku }}</h5>
                    <p class="card-title">{{ $item->penulis }}</p>
                    <p class="card-title">{{ $item->penerbit }}</p>
                    <p class="card-title">{{ $item->tahun_terbit }}</p>
                    <p class="card-title">{{ $item->stok }}</p>

                    {{-- Menampilkan status peminjaman --}}
                    @php
                        $statusPeminjaman = optional($item->peminjaman)->status;
                        $denda = optional($item->peminjaman)->denda;
                    @endphp
                    @if ($statusPeminjaman === 'Menunggu Konfirmasi')
                        <span class="badge bg-warning">Menunggu Konfirmasi</span>
                    @elseif ($statusPeminjaman === 'Dipinjam')    
                        <span class="badge bg-info">Dipinjam</span>
                        @php
                            $pembayaran = optional($item->peminjaman)->pembayaran;
                        @endphp
                        @if ($denda > 0 && $pembayaran && $pembayaran->pembayaran_status == 'Konfirmasi')
                            <form action="{{ route('buku.kembalikan', $item->id) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Kembalikan</button>
                            </form>
                        @endif

                    @elseif ($statusPeminjaman === 'Dikembalikan')
                        <span class="badge bg-success">Dikembalikan</span>
                        {{-- Menampilkan tombol pinjam jika stok tersedia --}}
                        @if ($item->stok > 0)
                            <form action="{{ route('buku.pinjam', $item->id) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pinjamModal{{ $item->id }}">
                                    Pinjam Lagi
                                </button>
                            </form>
                        @else
                            <span class="badge bg-warning">Stok Habis</span>
                        @endif
                    @else
                        <span class="badge bg-secondary">Tidak Ada Peminjaman</span>
                        @if ($item->stok > 0)
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pinjamModal{{ $item->id }}">
                                Pinjam
                            </button>
                        @else
                            <span class="badge bg-warning">Stok Habis</span>
                        @endif
                    
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

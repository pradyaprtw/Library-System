@extends('layouts.app')
@include('/admin/header')
@section('title', 'Show Buku')
@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Show Buku</h3>
    <div class="card">
        <div class="card-header">Data Buku</div>
        <div class="card-body bg bg-sm" style="background-color: #B03052">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/'.$buku->foto) }}" 
                        alt="Gambar Buku {{ $buku->judul_buku }}"
                        style="max-width: 50%;">
                </div>
                <div class="col-md-6">
                    <p><span class="label">Judul Buku:</span> <span class="value">{{ $buku->judul_buku }}</span></p>
                    <p><span class="label">Penulis:</span> <span class="value">{{ $buku->penulis }}</span></p>
                    <p><span class="label">Penerbit:</span> <span class="value">{{ $buku->penerbit }}</span></p>
                    <p><span class="label">Tahun Terbit:</span> <span class="value">{{ $buku->tahun_terbit }}</span></p>
                    <p><span class="label">Kategori:</span> <span class="value">{{ $buku->kategori->nama_kategori }}</span></p>
                    <p><span class="label">Stok:</span> <span class="value">{{ $buku->stok }}</span></p>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
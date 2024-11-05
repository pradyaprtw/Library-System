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
                    <p> Judul Buku: {{ $buku->judul_buku }} </p>
                    <p> Penulis: {{ $buku->penulis }} </p>
                    <p> Penerbit: {{ $buku->penerbit }} </p>
                    <p> Tahun Terbit: {{ $buku->tahun_terbit }} </p>
                    <p> Kategori: {{ $buku->kategori->nama_kategori }} </p>
                    <p> Stok: {{ $buku->stok }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
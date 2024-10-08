@extends('layouts.app')
@section('title', 'Create Buku')
    @include('/admin/header')
@section('content')
<div class="container mt-3 pt-5">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h2>Daftar Buku</h2>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>
    <table class="table">
        <thead>
          <tr>
                <th scope="col">Judul Buku</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">ISBN</th>
                <th scope="col">Kategori</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($buku as $b)
            <tr>
                <td>{{ $b->judul_buku }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahun_terbit }}</td>
                <td>{{ $b->isbn }}</td>
                <td>{{ $b->kategori->nama_kategori}}</td>
                <td>{{ $b->stok }}</td>
                <td class="d-flex">
                    <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-sm btn-warning mx-1">Edit</a>
                    <form action="{{ route('buku.destroy', $b->id) }}" method="POST" class="mx-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection
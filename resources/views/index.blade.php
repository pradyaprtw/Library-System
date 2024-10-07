@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h2>Daftar Buku</h2>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th><th>ISBN</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
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
                <td>{{ $b->kategori_id }}</td>
                <td>{{ $b->stok }}</td>
                <td class="d-flex">
                    <a href="{{ route('buku.edit', $b->id_buku) }}" class="btn btn-sm btn-warning mx-1">Edit</a>
                    <form action="{{ route('buku.destroy', $b->id_buku) }}" method="POST" class="mx-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
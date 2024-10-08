@extends('layouts.app')

@section('content')

    <h2 class="my-4">Tambah Buku Baru</h2>
    <form action="{{ route('buku.store') }}" method="POST" class="card p-4">
        @csrf
        <div class="form-group mb-3">
            <label for="judul_buku">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
        </div>

        <div class="form-group mb-3">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
        </div>
        <div class="form-group mb-3">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
        </div>

        <div class="form-group mb-3">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>

        <div class="form-group mb-3">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>

        <div class="form-group mb-3">
            <label for="id_kategori">Kategori</label>
            <select id="id_kategori" name="id_kategori" class="form-control" required>
            <option value="" disabled selected>Pilih Kategori</option> <!-- Opsi kosong -->    
                @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Buku</button>
    </form>
@endsection
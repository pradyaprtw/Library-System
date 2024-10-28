@extends('layouts.app')

@section('content')

    <h2 class="my-4">Edit Buku</h2>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT untuk update -->

        <div class="form-group mb-3">
            <label for="judul_buku">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ $buku->judul_buku }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $buku->penulis }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $buku->isbn }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="id_kategori">Kategori</label>
            <select id="id_kategori" name="id_kategori" class="form-control" required>
                <option value="" disabled>Pilih Kategori</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $buku->id_kategori ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ $buku->stok }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Buku</button>
    </form>
@endsection

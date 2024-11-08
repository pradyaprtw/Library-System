@extends('layouts.app')

@section('title', 'Home Admin')
@section('content')
  @include('/admin/header')
  
  <div class="container mt-4">
    <div class="row"> <!-- Bootstrap row -->
      @foreach ($buku as $item)
      <div class="col-md-3"> <!-- Set column width -->
        <div class="card m-2" style="background-color: #B03052">
          <div class="img-bx">
            <img src="{{ asset('storage/'.$item->foto) }}" class="card-img-top" alt="gambar buku">
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$item->judul_buku}}</h5>
            <p class="card-title">{{$item->penulis}}</p>
            <p class="card-title">{{$item->penerbit}}</p>
            <p class="card-title">{{$item->tahun_terbit}}</p>
            <p class="card-title">{{$item->isbn}}</p>
            <p class="card-title">{{$item->nama_kategori}}</p>
            <p class="card-title">{{$item->stok}}</p>
            <a href="{{ route('buku.edit', $item->id)}}" class="btn btn-warning">Edit</a>
            <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
         </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('title', 'Home')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #B03052;">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #FFF4B7;">Library System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> 
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link">Hello, {{ Auth::user()->name }}</span>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

    <!-- Tampilkan Buku -->
    <div class="row mt-4">
        @foreach ($buku as $item)
        <div class="col-md-3">
            <div class="card m-2" style="background-color: #B03052">
                <div class="img-bx">
                    <img src="{{ asset('storage/'.$item->foto) }}" class="card-img-top" alt="gambar buku">
                </div>
                <div class="card-body">
                    <p class="card-title"><b>Judul:</b> {{ $item->judul_buku }}</p>
                    <p class="card-title"><b>Penulis:</b> {{ $item->penulis }}</p>
                    <p class="card-title"><b>Penerbit:</b> {{ $item->penerbit }}</p>
                    <p class="card-title"><b>Tahun Terbit:</b> {{ $item->tahun_terbit }}</p>
                    <p class="card-title"><b>Stok:</b>  {{ $item->stok }}</p>                    
                    <!-- Tombol Pinjam -->
                    @guest
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Pinjam</button>
                    @else
                        <form action="{{ route('buku.pinjam', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Pinjam</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal Login (untuk guest yang belum login) -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #FFF4B7; color: #B03052;">
                    <h5 class="modal-title" id="loginModalLabel">Anda Belum Login!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #B03052; color: #FFF4B7;">
                    <p>Untuk meminjam buku, Anda perlu login atau sign up terlebih dahulu.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary w-100">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary w-100 mt-2">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

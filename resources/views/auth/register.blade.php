@extends('layouts.app')
@section('title', 'Register')
@section('content')

<div class="main d-flex justify-content-center align-items-center">
  <div class="register-box">
      <h3>Welcome to Library System</h3>
      <form action="{{ url('/registerProses') }}" method="POST">
        @csrf
        <div>
            <label class="form-label" for="nama">Nama Lengkap</label>
            <input class="form-control" type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label class="form-label" for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" required></textarea>
        </div>
        <div>
            <label class="form-label" for="no_telepon">No Telepon</label>
            <input class="form-control" type="text" id="no_telepon" name="no_telepon" required>
        </div>
        <div>
            <label for="email" class="form-label">Email</label> 
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div>
          <label class="form-label" for="username">Username</label>
          <input class="form-control" type="text" name="username" id="username" required>
        </div>
        <div>
          <label class="form-label" for="password">Password</label>
          <input class="form-control" type="password" name="password" id="password" required>     
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror   
        </div>
        <div>
          <button class="btn btn-custom form-control" type="submit">Register</button>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-link" href="login">Sign In</a>
          {{-- <a class="btn btn-link" style="color: #B03052" href="...">Forgot Password?</a> --}}
        </div>
      </form>
    </div>

</div>
@endsection


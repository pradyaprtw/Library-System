@extends('layouts.app')
@section('title', 'Register')
@section('content')
<style>
    body{
      background-color: #FFF4B7;
      color: #B03052;
    }
    .main{
      height: 100vh;
      box-sizing: border-box;
    }
    .register-box{
      width: 500px;
      border: solid 1px;
      padding: 20px;
      margin-top: 200px;
    }
    form div {
      margin-bottom: 15px;
    }
    h3 {
      text-align: center;
      margin: 20px;
    }
    .btn-custom{
      background-color: #B03052;
      color: #FFF4B7; 
    }
    .btn-custom:hover{
      background-color: #D76C82;
      color: #B03052;
    }
</style>
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
        </div>
        <div>
          <button class="btn btn-custom form-control" type="submit">Register</button>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-link" style="color: #B03052" href="login">Sign In</a>
          <a class="btn btn-link" style="color: #B03052" href="...">Forgot Password?</a>
        </div>
      </form>
    </div>

</div>
@endsection


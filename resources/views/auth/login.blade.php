@extends('layouts.app')
@section('title', 'Login')
@section('content')

<div class="main d-flex justify-content-center align-items-center">
  <div class="login-box">
      <h3>Welcome to Library System</h3>
      <form action="{{ route('authenticate') }}" method="POST">
        @csrf
        <div>
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" required autocomplete="username">
        </div>
        <div>
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required autocomplete="current-password">        
        </div>
        <div>
            <button class="btn btn-custom form-control" type="submit">Login</button>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-link"  href="{{ route('register') }}">Sign Up</a>
            <a class="btn btn-link"  href="{{ route('forgot-password') }}">Forgot Password?</a>
        </div>
      </form>    
  </div>
</div>
@endsection


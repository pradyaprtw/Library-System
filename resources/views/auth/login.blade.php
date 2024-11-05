@extends('layouts.app')
@section('title', 'Login')
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
    .login-box{
      width: 500px;
      border: solid 1px;
      padding: 35px;
    }
    form div {
      margin-bottom: 15px;
    }
    h3 {
      text-align: center;
      margin-bottom: 15px;
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
  <div class="login-box">
      <h3>Welcome to Library System</h3>
      <form action="{{ url('/authenticate') }}" method="POST">
        @csrf
        <div>
          <label class="form-label" for="username">Username</label>
          <input class="form-control" type="text" name="username" id="username" required>
        </div>
        <div>
          <label class="form-label" for="password">Password</label>
          <input class="form-control" type="password" name="password" id="password" required>        
        </div>
        <div>
          <button class="btn btn-custom form-control" type="submit">Login</button>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-link" style="color: #B03052" href="register">Sign Up</a>
          <a class="btn btn-link" style="color: #B03052" href="...">Forgot Password?</a>
        </div>
      </form>
    </div>

</div>
@endsection


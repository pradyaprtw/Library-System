@extends('layouts.app')
@section('title', 'Login')
@section('content')
{{-- <style>
    .card-body{
        background-color: rgb(255, 84, 167); 
        border-radius: 5px;
    }
    .card-body label{
       color: white;
       font-weight: 500;
    }
</style> --}}
<div class="container py-5">
  <div class="w-50 center border rounded px-3 py-3 mx-auto">
  <h1>Login</h1>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $item)
          <li>{{ $item }}</li>
      @endforeach
    </ul>
  </div>      
  @endif
  <form action="" method="POST">
    @csrf
      <div class="mb-3">
          <label for="username" class="form-label">username</label>
          <input type="username" value="{{old('username')}}" name="username" class="form-control">
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control">
      </div>
      <div class="mb-3 d-grid">
          <button name="submit" type="submit" class="btn btn-primary">Login</button>
      </div>
  </form>
</div> 
</div>
@endsection


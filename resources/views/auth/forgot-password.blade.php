@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')

<div class="main d-flex justify-content-center align-items-center">
    <div class="login-box">
            <h3>Forgot Password</h3>
        
            <!-- Display Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <!-- Display Status -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        
            <form action="{{ route('forgot-password.submit') }}" method="POST">
                @csrf
                <div>
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" required  placeholder="Masukkan username Anda">
                </div>
                <div>
                <button class="btn btn-custom form-control" type="submit">Submit</button>
                </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-link" style="color: #B03052" href="{{ route('login') }}">Back to Login</a>
                    <a class="btn btn-link" style="color: #B03052" href="{{ route('register') }}">Sign Up</a>
                </div> 
            </form>
    </div>
</div>
@endsection

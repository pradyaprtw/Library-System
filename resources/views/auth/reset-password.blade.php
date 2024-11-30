@extends('layouts.app')
@section('title', 'Reset Password')
@section('content')

<div class="main d-flex justify-content-center align-items-center">
    <div class="login-box">
        <form action="{{ route('reset-password.submit', ['username' => $username]) }}" method="POST">
            @csrf
            <div>
                <label class="form-label" for="password">New Password</label>
                <input class="form-control" type="password" id="password" name="password" required placeholder="Masukkan password baru Anda">  
            </div>
            <div>
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi password baru Anda">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror   
            </div>
            <div>
                <button class="btn btn-custom form-control" type="submit">Reset Password</button>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-link" style="color: #B03052" href="{{ route('forgot-password') }}">Back to forgot password</a>
            </div>
        </form>
    </div>
</div>

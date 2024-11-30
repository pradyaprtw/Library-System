@extends('layouts.app')
@section('title', 'Reset Password')
@section('content')

<form action="{{ route('reset-password.submit', ['username' => $username]) }}" method="POST">
    @csrf
    <label for="password">New Password</label>
    <input type="password" id="password" name="password" required>
    
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>
    
    <button type="submit">Reset Password</button>
</form>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

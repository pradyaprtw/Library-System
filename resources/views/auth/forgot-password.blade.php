@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')

<div class="container">
    <h1>Forgot Password</h1>

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
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection

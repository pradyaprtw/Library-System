@extends('layouts.app')

@include('/anggota/header')

@section('title', 'Edit Profile')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Edit Profile</h3>
    <div class="row">
        @livewire('users-edit', ['id' => $id])
    </div>
</div>
@endsection

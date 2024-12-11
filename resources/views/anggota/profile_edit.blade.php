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
<div class="container mt-4">
    <div class="row">
        @livewire('users-edit', ['id' => $id])
    </div>
</div>
@endsection

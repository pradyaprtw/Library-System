@extends('layouts.app')
@include('/admin/header')
@section('title', 'Tambah Peminjaman')

@push('styles')
    @livewireStyles
@endpush    

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Tambah Data Peminjaman</h3>
    <div class="row">
        @livewire('peminjaman-create')
    </div>
</div>
@endsection
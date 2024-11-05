@extends('layouts.app')
@include('/admin/header')
@section('title', 'Peminjaman')

@push('styles')
    @livewireStyles
@endpush    

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Data Peminjaman</h3>
    {{-- <div class="row">
        @livewire('buku-create')
    </div> --}}
    <div>
        @livewire('peminjaman-table')
    </div>
</div>
@endsection
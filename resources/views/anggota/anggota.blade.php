@extends('layouts.app')
@include('/admin/header')
@section('title', 'Anggota')

@push('styles')
    @livewireStyles
@endpush    

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Data Anggota</h3>
    <div>
        @livewire('anggota-table')
    </div>
</div>
@endsection
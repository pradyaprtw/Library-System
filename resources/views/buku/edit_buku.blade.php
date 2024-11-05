@extends('layouts.app')

@include('/admin/header')

@section('title', 'Buku')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Edit Data Buku</h3>
    <div class="row">
        @livewire('buku-edit', ['id' => $buku->id]) <!-- Pass the id parameter -->
    </div>
</div>
@endsection

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
<div class="container mt-4">
    <div class="row">
        @livewire('buku-edit', ['id' => $buku->id])
    </div>
</div>
@endsection

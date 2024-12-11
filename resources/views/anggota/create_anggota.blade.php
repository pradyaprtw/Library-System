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
<div class="container mt-4">
    <div class="row">
        @livewire('anggota-create')
    </div>
</div>
@endsection

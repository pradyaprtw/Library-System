@extends('layouts.app')
@include('/admin/header')
@section('title', 'Riwayat Denda')

@push('styles')
    @livewireStyles
@endpush    

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Data Denda</h3>
    <div>
        @livewire('denda-table')
    </div>
</div>
@endsection
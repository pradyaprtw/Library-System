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
    <h3 class="mt-4 mb-4">Data Buku</h3>
    {{-- <div class="row">
        @livewire('buku-create')
    </div> --}}
    <div>
        @livewire('buku-table')
    </div>
</div>
@endsection
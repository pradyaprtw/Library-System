@extends('layouts.app')
@include('/admin/header')
@include('/modal/hapus')
@section('title', 'Buku')

@push('styles')
    @livewireStyles
@endpush    

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Buku</div>
                @if (session('message'))
                <div class='alert alert-success' role='alert'>
                    {{ session('message') }}
                </div>
                @endif
                <div class="card-body">
                    @livewire('buku-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
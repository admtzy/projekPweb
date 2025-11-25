@extends('layouts.app')
@section('title', 'Selamat Datang - Sistem Rekomendasi Tanaman')
@section('body-class', 'has-bg')
@section('content')
<div class="main-content" style="background: rgba(255,255,255,0.25); min-height: 80vh; display:flex; flex-direction:column; align-items:center; justify-content:center;">
    <h1 class="text-white mb-3" style="text-shadow: 2px 2px 6px rgba(0,0,0,0.5);">
        Selamat Datang di Sistem Rekomendasi Tanaman
    </h1>
    <p class="lead text-white mb-4" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">
        Dapatkan rekomendasi tanaman terbaik berdasarkan kondisi lahan dan cuaca.
    </p>

    <div>
        <a href="{{ route('login') }}" class="btn btn-success btn-lg me-2">Masuk</a>
        <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg">Daftar</a>
    </div>
</div>
@endsection

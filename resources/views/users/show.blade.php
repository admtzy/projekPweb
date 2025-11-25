@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-sm" style="width: 400px; border-radius: 15px;">
        <div class="card-body text-center">
            <img src="{{ asset('images/foto/s.png') }}" alt="Foto Profil"
                 class="rounded-circle mb-3"
                 style="width:100px; height:100px; object-fit:cover; border: 3px solid #2e7d32;">

            <h4 class="card-title mb-4">{{ $user->name }}</h4>
            <div class="text-start">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                <p><strong>Lokasi:</strong> {{ $user->lokasi ?? '-' }}</p>
                <p><strong>Komunitas Petani:</strong> {{ $user->komunitas_petani ?? '-' }}</p>
            </div>

            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3 w-50">Kembali</a>
        </div>
    </div>
</div>
@endsection

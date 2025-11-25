@extends('layouts.app')
@section('title', 'Akun Saya')
@section('body-class', 'has-bg')
@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-sm" style="width: 400px; border-radius: 15px;">
        <div class="card-body text-center">
            {{-- Foto profil --}}
            <img src="{{ asset('images/foto/s.png') }}" alt="Foto Profil"
                 class="rounded-circle mb-3"
                 style="width:100px; height:100px; object-fit:cover; border: 3px solid #2e7d32;">
            
            <h4 class="card-title mb-4">{{ $user->name }}</h4>
            <table class="table table-borderless text-start">
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $user->lokasi }}</td>
                </tr>
                <tr>
                    <th>Komunitas</th>
                    <td>{{ $user->komunitas_petani }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ ucfirst($user->role) }}</td>
                </tr>
            </table>

            <a href="{{ route('akun.edit') }}" class="btn btn-success w-50 mt-3">Edit Akun</a>
        </div>
    </div>
</div>
@endsection

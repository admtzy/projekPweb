@extends('layouts.app')
@section('title', 'Edit Akun Saya')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4>Edit Akun Saya</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('akun.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ $user->lokasi }}">
                </div>

                <div class="mb-3">
                    <label>Komunitas Petani</label>
                    <input type="text" name="komunitas_petani" class="form-control" value="{{ $user->komunitas_petani }}">
                </div>

                <div class="mb-3">
                    <label>Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

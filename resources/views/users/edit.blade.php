@extends('layouts.app')
@section('title', 'Edit Akun')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4>Edit Akun</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $user->lokasi) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Komunitas Petani</label>
                    <input type="text" name="komunitas_petani" value="{{ old('komunitas_petani', $user->komunitas_petani) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-select">
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

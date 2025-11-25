@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container">
    <h2>Kelola Akun Pengguna</h2>
    <a href="{{ route('register') }}" class="btn btn-success mb-3">+ Tambah User (Register)</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Lokasi</th>
                <th>Komunitas Petani</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ ucfirst($u->role) }}</td>
                <td>{{ $u->lokasi ?? '-' }}</td>
                <td>{{ $u->komunitas_petani ?? '-' }}</td>
                <td>
                    <a href="{{ route('users.show', $u->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus akun ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection

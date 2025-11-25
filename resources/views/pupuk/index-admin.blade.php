@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <h3>Manajemen Permintaan Pupuks</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Lahan</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->lahan->nama_lahan }}</td>
                <td>{{ $p->jenis_pupuk }}</td>
                <td>{{ $p->jumlah }} Kg</td>
                <td>
                    <span class="badge 
                        @if($p->status=='pending') bg-warning 
                        @elseif($p->status=='approve') bg-success 
                        @else bg-danger @endif">
                        {{ ucfirst($p->status) }}
                    </span>
                </td>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('pupuk.show-admin', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada permintaan pupuks.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

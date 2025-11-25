@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4" style="max-width: 600px;">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-3 shadow-lg">
          <div class="card-header bg-success text-white">
            <h4>Tambah Tanaman</h4>
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $pupuk->user->name }}</p>
            <p><strong>Lahan:</strong> {{ $pupuk->lahan->nama_lahan }}</p>
            <p><strong>Jenis Pupuk:</strong> {{ $pupuk->jenis_pupuk }}</p>
            <p><strong>Jumlah:</strong> {{ $pupuk->jumlah }} Kg</p>
            <p><strong>Catatan:</strong> {{ $pupuk->catatan ?? '-' }}</p>
            <p><strong>Status Sekarang:</strong> 
                <span class="badge 
                    @if($pupuk->status=='pending') bg-warning 
                    @elseif($pupuk->status=='approve') bg-success 
                    @else bg-danger @endif">
                    {{ ucfirst($pupuk->status) }}
                </span>
            </p>

            <p><strong>Foto:</strong><br>
                @if($pupuk->foto_petani)
                    <img src="{{ asset('images/'.$pupuk->foto_petani) }}" width="200">
                @else
                    -
                @endif
            </p>

            <p><strong>Tanda Tangan:</strong><br>
                @if($pupuk->tanda_tangan)
                    <img src="{{ asset('images/'.$pupuk->tanda_tangan) }}" width="200">
                @else
                    -
                @endif
            </p>

            <form action="{{ route('pupuk.status-admin', $pupuk->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="fw-semibold">Ubah Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" @if($pupuk->status=='pending') selected @endif>Pending</option>
                        <option value="approve" @if($pupuk->status=='approve') selected @endif>Approve</option>
                        <option value="tolak" @if($pupuk->status=='tolak') selected @endif>Tolak</option>
                    </select>
                </div>
                <button class="btn btn-primary">Update Status</button>
                <a href="{{ route('pupuk.index-admin') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

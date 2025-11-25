@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Permintaan Pupuk Anda</h3>
    
    @foreach ($lahan as $l)
        <a href="{{ route('pupuk.create-user', $l->id) }}" class="btn btn-primary mb-3">
            Tambah Pupuk untuk {{ $l->nama_lahan }}
        </a>
    @endforeach

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Daftar Permintaan Pupuk --}}
    <div class="row">
        @forelse ($list as $p)
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Permintaan #{{ $p->id }}</h5>
                    <p class="mb-1"><strong>Jenis Pupuk:</strong> {{ $p->jenis_pupuk }}</p>
                    <p class="mb-1"><strong>Jumlah:</strong> {{ $p->jumlah }} Kg</p>
                    <p class="mb-1">
                        <strong>Status:</strong>
                        <span class="badge 
                            @if($p->status=='pending') bg-warning 
                            @elseif($p->status=='approve') bg-success 
                            @else bg-danger @endif">
                            {{ ucfirst($p->status) }}
                        </span>
                    </p>
                    <p class="mb-3"><strong>Tanggal:</strong> {{ $p->created_at->format('d-m-Y') }}</p>

                    <a href="{{ route('pupuk.show-user', $p->id) }}" class="btn btn-primary btn-sm btn-alert" 
                       data-alert="Detail permintaan #{{ $p->id }}">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada permintaan pupuk.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection

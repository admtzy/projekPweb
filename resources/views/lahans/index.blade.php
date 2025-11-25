@extends('layouts.app')
@section('title', 'Data Lahan')
@section('body-class', 'has-bg')
@section('content')

<h4>Data Lahan</h4>
<a href="{{ route('lahans.create') }}" class="btn btn-success mb-3 btn-alert" data-alert="Form tambah lahan dibuka!">
    Tambah Lahan
</a>

<div class="row">
    @forelse($lahans as $l)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $l->nama_lahan }}</h5>
                    <p class="card-text">
                        <strong>Luas:</strong> {{ $l->luas_lahan }} m² <br>
                        <strong>Jenis Tanah:</strong> {{ $l->jenis_tanah }} <br>
                        <strong>pH:</strong> {{ $l->ph_tanah }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('lahans.edit', $l->id) }}" class="btn btn-sm btn-primary btn-alert" data-alert="Edit lahan {{ $l->nama_lahan }}">
                            Edit
                        </a>
                        <form action="{{ route('lahans.destroy', $l->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-alert" data-alert="Lahan {{ $l->nama_lahan }} dihapus?">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning">Belum ada data lahan.</div>
        </div>
    @endforelse
</div>

@endsection

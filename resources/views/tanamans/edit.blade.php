@extends('layouts.app')
@section('title', 'Edit Tanaman')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-warning text-white">
            <h4>Edit Tanaman</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tanamans.update', $tanaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Tanaman</label>
                        <input type="text" name="nama_tanaman" class="form-control" value="{{ old('nama_tanaman', $tanaman->nama_tanaman) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Jenis Tanah</label>
                        <select name="jenis_tanah" class="form-select" required>
                            @foreach(['Alluvial','Lempung','Pasir','Andosol','Latosol','Regosol','Grumosol'] as $jenis)
                                <option value="{{ $jenis }}" {{ old('jenis_tanah', $tanaman->jenis_tanah) == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Suhu Min (°C)</label>
                        <input type="number" step="0.1" name="suhu_min" class="form-control" value="{{ old('suhu_min', $tanaman->suhu_min) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Suhu Max (°C)</label>
                        <input type="number" step="0.1" name="suhu_max" class="form-control" value="{{ old('suhu_max', $tanaman->suhu_max) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Curah Hujan Min (mm)</label>
                        <input type="number" step="0.1" name="curah_hujan_min" class="form-control" value="{{ old('curah_hujan_min', $tanaman->curah_hujan_min) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Curah Hujan Max (mm)</label>
                        <input type="number" step="0.1" name="curah_hujan_max" class="form-control" value="{{ old('curah_hujan_max', $tanaman->curah_hujan_max) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>pH Min</label>
                        <input type="number" step="0.1" name="ph_min" class="form-control" value="{{ old('ph_min', $tanaman->ph_min) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>pH Max</label>
                        <input type="number" step="0.1" name="ph_max" class="form-control" value="{{ old('ph_max', $tanaman->ph_max) }}" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('tanamans.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

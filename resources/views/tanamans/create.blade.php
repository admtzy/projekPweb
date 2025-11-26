@extends('layouts.app')
@section('title', 'Tambah Tanaman')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4" style="max-width: 500px;">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4>Tambah Tanaman</h4>
        </div>

        <div class="card-body p-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tanamans.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Tanaman</label>
                    <input type="text" name="nama_tanaman" class="form-control"
                           value="{{ old('nama_tanaman') }}" required>
                </div>

                <div class="mb-3">
                    <label>Jenis Tanah</label>
                    <select name="jenis_tanah" class="form-select" required>
                        <option value="">Pilih Jenis Tanah</option>
                        <option value="Alluvial" {{ old('jenis_tanah')=='Alluvial'?'selected':'' }}>Alluvial</option>
                        <option value="Lempung" {{ old('jenis_tanah')=='Lempung'?'selected':'' }}>Lempung</option>
                        <option value="Pasir" {{ old('jenis_tanah')=='Pasir'?'selected':'' }}>Pasir</option>
                        <option value="Liat" {{ old('jenis_tanah')=='Liat'?'selected':'' }}>Liat</option>
                        <option value="Gambut" {{ old('jenis_tanah')=='Gambut'?'selected':'' }}>Gambut</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Suhu Min (°C)</label>
                    <input type="number" step="0.1" name="suhu_min" class="form-control"
                           value="{{ old('suhu_min') }}" required>
                </div>

                <div class="mb-3">
                    <label>Suhu Max (°C)</label>
                    <input type="number" step="0.1" name="suhu_max" class="form-control"
                           value="{{ old('suhu_max') }}" required>
                </div>

                <div class="mb-3">
                    <label>Curah Hujan Min (mm)</label>
                    <input type="number" step="0.1" name="curah_hujan_min" class="form-control"
                           value="{{ old('curah_hujan_min') }}" required>
                </div>

                <div class="mb-3">
                    <label>Curah Hujan Max (mm)</label>
                    <input type="number" step="0.1" name="curah_hujan_max" class="form-control"
                           value="{{ old('curah_hujan_max') }}" required>
                </div>


                <div class="d-flex justify-content-end">
                    <a href="{{ route('tanamans.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

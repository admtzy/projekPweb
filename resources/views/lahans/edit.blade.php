@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container">
    <div class="card shadow-sm mt-3">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4>Edit Lahan</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('lahans.update', $lahan->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Lahan</label>
                    <input type="text" name="nama_lahan" 
                        value="{{ old('nama_lahan', $lahan->nama_lahan) }}" 
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Luas Lahan (m²)</label>
                    <input type="number" name="luas_lahan" 
                        value="{{ old('luas_lahan', $lahan->luas_lahan) }}" 
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Provinsi</label>
                    <input type="text" name="provinsi" 
                        value="{{ old('provinsi', $lahan->provinsi) }}" 
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kabupaten</label>
                    <input type="text" name="kabupaten" 
                        value="{{ old('kabupaten', $lahan->kabupaten) }}" 
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bulan Tanam</label>
                    <select name="bulan_tanam" class="form-select" required>
                        @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                            <option value="{{ $bulan }}" 
                                {{ $lahan->bulan_tanam === $bulan ? 'selected' : '' }}>
                                {{ $bulan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Tanah</label>
                    <select name="jenis_tanah" class="form-select" required>
                        <option value="">Pilih Jenis Tanah</option>
                        <option value="Liat" {{ $lahan->jenis_tanah == 'Liat' ? 'selected' : '' }}>Liat</option>
                        <option value="Lempung" {{ $lahan->jenis_tanah == 'Lempung' ? 'selected' : '' }}>Lempung</option>
                        <option value="Latosol" {{ $lahan->jenis_tanah == 'Latosol' ? 'selected' : '' }}>Latosol</option>
                        <option value="Andosol" {{ $lahan->jenis_tanah == 'Andosol' ? 'selected' : '' }}>Andosol</option>
                        <option value="Aluvial" {{ $lahan->jenis_tanah == 'Aluvial' ? 'selected' : '' }}>Aluvial</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary btn-alert" data-alert="Lahan berhasil disimpan!">Simpan</button>
                    <a href="{{ route('lahans.index') }}" class="btn btn-secondary btn-alert" data-alert="Edit dibatalkan!">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

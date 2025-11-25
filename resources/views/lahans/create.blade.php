@extends('layouts.app')
@section('title', 'Input Lahan')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4>Tambah Lahan & Lokasi</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lahans.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lahan</label>
                    <input type="text" name="nama_lahan"
                        class="form-control @error('nama_lahan') is-invalid @enderror"
                        value="{{ old('nama_lahan') }}" required>
                    @error('nama_lahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Luas Lahan (m²)</label>
                    <input type="number" name="luas_lahan"
                        class="form-control @error('luas_lahan') is-invalid @enderror"
                        value="{{ old('luas_lahan') }}" required>
                    @error('luas_lahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Provinsi</label>
                        <select id="provinsi" name="provinsi"
                            class="form-select @error('provinsi') is-invalid @enderror" required>
                            <option value="">Pilih Provinsi</option>
                        </select>
                        @error('provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kabupaten</label>
                        <select id="kabupaten" name="kabupaten"
                            class="form-select @error('kabupaten') is-invalid @enderror" required>
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        @error('kabupaten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bulan Tanam</label>
                    <select name="bulan_tanam"
                        class="form-select @error('bulan_tanam') is-invalid @enderror" required>
                        @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                            <option value="{{ $bulan }}" {{ old('bulan_tanam') == $bulan ? 'selected' : '' }}>
                                {{ $bulan }}
                            </option>
                        @endforeach
                    </select>
                    @error('bulan_tanam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Tanah</label>
                    <select name="jenis_tanah"
                        class="form-select @error('jenis_tanah') is-invalid @enderror" required>
                        <option value="">Pilih Jenis Tanah</option>
                        @foreach(['Latosol','Andosol','Liat','Lempung','Aluvial'] as $jenis)
                            <option value="{{ $jenis }}" {{ old('jenis_tanah') == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_tanah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Filter Tanaman (pisahkan koma)</label>
                    <input type="text" name="tanaman_filter_input"
                        class="form-control @error('tanaman_filter_input') is-invalid @enderror"
                        value="{{ old('tanaman_filter_input') }}"
                        placeholder="Contoh: padi, jagung, kedelai" required>
                    <small class="text-muted">Pisahkan dengan koma, contoh: padi, jagung, kedelai</small>
                    @error('tanaman_filter_input')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('lahans.index') }}" class="btn btn-secondary btn-alert" data-alert="Input dibatalkan!">Kembali</a>
                    <button type="submit" class="btn btn-success btn-alert" data-alert="Lahan berhasil ditambahkan!">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', async () => {
    const provSelect = document.getElementById('provinsi');
    const kabSelect = document.getElementById('kabupaten');

    const provs = await fetch('https://ibnux.github.io/data-indonesia/provinsi.json').then(res => res.json());
    provs.forEach(p => {
        provSelect.innerHTML += `<option value="${p.nama}" data-id="${p.id}">${p.nama}</option>`;
    });

    provSelect.addEventListener('change', async () => {
        kabSelect.innerHTML = `<option value="">Pilih Kabupaten</option>`;
        const provId = provSelect.selectedOptions[0].dataset.id;
        if (!provId) return;

        const kabs = await fetch(`https://ibnux.github.io/data-indonesia/kabupaten/${provId}.json`).then(res => res.json());
        kabs.forEach(k => {
            kabSelect.innerHTML += `<option value="${k.nama}">${k.nama}</option>`;
        });
    });
});
</script>
@endsection

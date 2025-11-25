@extends('layouts.app')
@section('title','Hasil Rekomendasi')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <h4>Data Rekomendasi</h4>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-success text-center">
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th> 
                        <th>Kabupaten</th> 
                        <th>Lahan</th>
                        <th>Tanaman</th>
                        <th>Skor Kecocokan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekomendasis as $index => $r)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>

                        {{-- Tambahan wilayah --}}
                        <td>{{ $r->lahan->provinsi ?? '-' }}</td>
                        <td>{{ $r->lahan->kabupaten ?? '-' }}</td>

                        <td>{{ $r->lahan->nama_lahan ?? '-' }}</td>
                        <td>{{ $r->tanaman->nama_tanaman ?? '-' }}</td>
                        <td class="text-center">{{ $r->skor_kecocokan }}%</td>
                        <td>{{ $r->tanggal }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">
                            Tidak ada data rekomendasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

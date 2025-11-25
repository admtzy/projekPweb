@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4" id="pdfArea">
    <h3 style="text-align:center;">Detail Permintaan Pupuk</h3>
    <div class="card mt-3 p-3" style="border:1px solid #ccc; padding:15px;">
        <p><strong>Lahan:</strong> {{ $pupuk->lahan->nama_lahan }}</p>
        <p><strong>Jenis Pupuk:</strong> {{ $pupuk->jenis_pupuk }}</p>
        <p><strong>Jumlah:</strong> {{ $pupuk->jumlah }} Kg</p>
        <p><strong>Catatan:</strong> {{ $pupuk->catatan ?? '-' }}</p>

        <p><strong>Status:</strong>
            <span class="badge 
                @if($pupuk->status=='pending') bg-warning 
                @elseif($pupuk->status=='approve') bg-success 
                @else bg-danger @endif">
                {{ ucfirst($pupuk->status) }}
            </span>
        </p>

        <p><strong>Foto:</strong><br>
            @if($pupuk->foto_petani)
                <img src="{{ asset('images/'.$pupuk->foto_petani) }}" style="max-width:300px; margin-bottom:10px;">
            @else
                Tidak ada foto
            @endif
        </p>

        <p><strong>Tanda Tangan:</strong><br>
            @if($pupuk->tanda_tangan)
                <img src="{{ asset('images/'.$pupuk->tanda_tangan) }}" style="max-width:300px;">
            @else
                Tidak ada tanda tangan
            @endif
        </p>
    </div>

    <div class="mt-3">
        <a href="{{ route('pupuk.index-user') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('pupuk.downloadPdf', $pupuk->id) }}" class="btn btn-success">Download PDF</a>
    </div>
</div>
@endsection

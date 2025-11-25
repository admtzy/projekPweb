@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4>Ajukan Permintaan Pupuk</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pupuk.store', $lahanId) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Jenis Pupuk</label>
                    <input type="text" name="jenis_pupuk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah (Kg)</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Foto Petani</label>
                    <input type="file" name="foto_petani" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label>Tanda Tangan</label>
                    <input type="file" name="tanda_tangan" class="form-control" accept="image/png">
                </div>
                
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pupuk.index-user') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button class="btn btn-success">Kirim Permintaan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

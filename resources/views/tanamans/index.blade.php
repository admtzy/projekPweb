@extends('layouts.app')
@section('title', 'Data Tanaman')
@section('body-class', 'has-bg')
@section('content')
<h4>Data Tanaman</h4>
<a href="{{ route('tanamans.create') }}" class="btn btn-success mb-3">Tambah Tanaman</a>

<table class="table table-bordered">
    <thead><tr><th>Nama</th><th>Jenis Tanah</th><th>Suhu</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($tanamans as $t)
        <tr>
            <td>{{ $t->nama_tanaman }}</td>
            <td>{{ $t->jenis_tanah }}</td>
            <td>{{ $t->suhu_min }} - {{ $t->suhu_max }}</td>
            <td>
                <a href="{{ route('tanamans.edit', $t->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('tanamans.destroy', $t->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

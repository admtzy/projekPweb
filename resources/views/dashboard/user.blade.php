@extends('layouts.app')
@section('title', 'Dashboard User')
@section('body-class', 'has-bg')
@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-4">Halo, {{ Auth::user()->name }} 👋</h4>
    <p class="text-muted">Kelola lahanmu, ajukan permintaan pupuk, dan lihat rekomendasi terbaik berdasarkan kondisi lahan & cuaca 🌱</p>

    {{-- 🔹 Card Statistik Singkat --}}
    <div class="row g-3">
        <div class="col-md-4">
            <a href="{{ route('rekomendasis.index') }}" class="text-decoration-none">
                <div class="card card-hover bg-primary text-white shadow-sm h-100">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">Rekomendasi Hari Ini</h6>
                        <p class="mb-0">Cek tanaman terbaik 🌿</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('pupuk.index-user') }}" class="text-decoration-none">
                <div class="card card-hover bg-danger text-white shadow-sm h-100">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">Permintaan Pupuk</h6>
                        <p>Pantau statusnya 🧪</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('cuaca.index') }}" class="text-decoration-none">
                <div class="card card-hover bg-warning shadow-sm h-100">
                    <div class="card-body text-center">
                        <h6 class="fw-bold text-dark">Cuaca Hari Ini</h6>
                        <p class="mb-0 text-dark">Pantau Cuaca ☀️</p>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="row mt-4 g-3">
        <div class="col-md-4">
            <a href="{{ route('lahans.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100 text-center">
                    <div class="card-body">
                        <img src="{{ asset('images/foto/sk.png') }}" alt="SK Icon" class="img-fluid w-25">
                        <h5 class="mt-3 text-dark">Kelola Lahan</h5>
                        <p class="text-muted">Input data lahan & perkembangan tanaman.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('rekomendasis.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100 text-center">
                    <div class="card-body">
                        <img src="https://img.icons8.com/ios-filled/80/2e7d32/plant-under-sun--v1.png"/>
                        <h5 class="mt-3 text-dark">Lihat Rekomendasi Tanaman</h5>
                        <p class="text-muted">Tanaman paling cocok untuk lahanmu.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('pupuk.index-user') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100 text-center">
                    <div class="card-body">
                        <img src="{{ asset('images/foto/w.png') }}" alt="SK Icon" class="img-fluid w-25">
                        <h5 class="mt-3 text-dark">Ajukan Pupuk</h5>
                        <p class="text-muted">Ajukan kebutuhan pupuk kamu.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-4 g-3">

        <div class="col-md-6">
            <a href="{{ route('cuaca.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100 text-center">
                    <div class="card-body">
                        <img src="{{ asset('images/foto/e.png') }}" alt="SK Icon" class="img-fluid w-25">
                        <h5 class="mt-3 text-dark">Lihat Cuaca</h5>
                        <p class="text-muted">Prakiraan cuaca harian & 7 hari ke depan.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('akun.show') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100 text-center">
                    <div class="card-body">
                        <img src="{{ asset('images/foto/s.png') }}" alt="SK Icon" class="img-fluid w-25">
                        <h5 class="mt-3 text-dark">Akun Saya</h5>
                        <p class="text-muted">Kelola profil & informasi akun.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

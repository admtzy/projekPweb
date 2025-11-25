@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('body-class', 'has-bg')
@section('content')
<div class="container">

    <div class="mb-4">
        <h3 class="fw-semibold">Selamat Datang, {{ Auth::user()->name }} 👋</h3>
        <p class="text-muted">
            Kelola data tanaman, rekomendasi, dan proses approval permintaan pupuk.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('tanamans.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-tree-fill fs-1 text-success"></i>
                        <h6 class="mt-2 fw-semibold text-dark">Kelola Tanaman</h6>
                        <p class="text-muted small">Perbarui data tanaman</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('rekomendasis.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-lightbulb-fill fs-1 text-warning"></i>
                        <h6 class="mt-2 fw-semibold text-dark">Rekomendasi</h6>
                        <p class="text-muted small">Lihat hasil rekomendasi</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('pupuk.index-admin') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-bag-check-fill fs-1 text-primary"></i>
                        <h6 class="mt-2 fw-semibold text-dark">Approval Pupuk</h6>
                        <p class="text-muted small">Proses permintaan pupuk</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('users.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill fs-1 text-info"></i>
                        <h6 class="mt-2 fw-semibold text-dark">Kelola Akun</h6>
                        <p class="text-muted small">Manajemen user</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

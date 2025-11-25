@extends('layouts.app')
@section('title', 'Register')
@section('body-class', 'has-bg')
@section('content')
<div class="auth-page">
    <div class="bg-sawah-full d-flex justify-content-center align-items-center">
        <div class="form-container-custom text-center p-5" style="width: 420px;">

            <img src="{{ asset('images/s.png') }}" 
                alt="Petani" 
                class="img-fluid mb-3" 
                style="max-width: 160px; opacity: 0.9;">

            <h4 class="mb-3 text-success fw-bold">Daftar Akun Petani</h4>

            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-3 text-start">
                    <label class="fw-semibold">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>
                <div class="mb-4 text-start">
                    <label class="fw-semibold">Komunitas Petani</label>
                    <input type="text" name="komunitas_petani" class="form-control" required>
                </div>

                <button class="btn btn-success w-100 fw-semibold py-2">Daftar</button>

                <p class="text-center mt-3">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-decoration-none text-success">Login Sekarang</a>
                </p>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

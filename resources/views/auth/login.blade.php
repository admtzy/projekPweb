@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'has-bg')
@section('content')
<div class="auth-page">
    <div class="bg-sawah-full d-flex justify-content-center align-items-center">
        <div class="form-container-custom text-center p-5" style="width: 380px;">
            
            <img src="{{ asset('images/login.png') }}" 
                alt="Petani" 
                class="img-fluid mb-3" 
                style="max-width: 160px; opacity: 0.9;">

            <h4 class="mb-3 text-success fw-bold">Login Petani</h4>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3 text-start">
                    <label class="fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-success w-100 fw-semibold py-2">Masuk</button>

                <p class="text-center mt-3">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-decoration-none text-success">Daftar Sekarang</a>
                </p>
            </form>
        </div>
    </div>
</div>

@endsection

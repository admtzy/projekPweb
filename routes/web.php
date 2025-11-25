<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\CuacaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () { return view('layouts.landing');})->name('landing');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([IsAdmin::class])->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'store']);
});

Route::get('/akun-saya', [UserController::class, 'showSelf'])->name('akun.show');
Route::get('/akun-saya/edit', [UserController::class, 'editSelf'])->name('akun.edit');
Route::put('/akun-saya/update', [UserController::class, 'updateSelf'])->name('akun.update');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () { return Auth::user()->role === 'admin' ? view('dashboard.admin') : view('dashboard.user');})->name('dashboard');

    Route::resource('lahans', LahanController::class);

    Route::get('/pupuks', [PupukController::class,'userIndex'])->name('pupuk.index-user');
    Route::get('/pupuks/create/{lahanId}', [PupukController::class,'createUser'])->name('pupuk.create-user');
    Route::post('/pupuks/store/{lahanId}', [PupukController::class,'store'])->name('pupuk.store');
    Route::get('/pupuks/{id}', [PupukController::class,'userShow'])->name('pupuk.show-user');
    Route::get('/pupuks/pdf/{id}', [PupukController::class, 'downloadPdf'])->name('pupuk.downloadPdf');

    Route::get('/admin/pupuks', [PupukController::class,'adminIndex'])->name('pupuk.index-admin');
    Route::get('/admin/pupuks/{id}', [PupukController::class,'adminShow'])->name('pupuk.show-admin');
    Route::post('/admin/pupuks/{id}/status', [PupukController::class,'updateStatus'])->name('pupuk.status-admin');

    Route::get('/cuaca', [CuacaController::class, 'index'])->name('cuaca.index');
    Route::get('/sync-cuaca', [CuacaController::class, 'fetchCuaca'])->name('cuaca.sync');


    Route::resource('tanamans', TanamanController::class);

    Route::get('rekomendasis', [RekomendasiController::class, 'index'])->name('rekomendasis.index');
    Route::post('rekomendasis/generate', [RekomendasiController::class, 'generate'])->name('rekomendasis.generate');
});

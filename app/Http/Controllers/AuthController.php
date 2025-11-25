<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() { return view('auth.register'); }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'lokasi' => 'required',
            'komunitas_petani' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lokasi' => $request->lokasi,
            'komunitas_petani' => $request->komunitas_petani
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success','Registrasi berhasil! Selamat datang, '.$user->name);
    }

    public function showLogin() { return view('auth.login'); }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}

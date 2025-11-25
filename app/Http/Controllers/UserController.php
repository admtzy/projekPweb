<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::paginate(10); 
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'lokasi' => 'nullable|string',
            'komunitas_petani' => 'nullable|string',
            'role' => 'required|in:admin,user',
        ]);

        $user->update($request->only('name', 'email', 'lokasi', 'komunitas_petani', 'role'));

        return redirect()->route('users.index')->with('success', 'Akun berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri!');
        }

        $user->delete();
        return back()->with('success', 'Akun berhasil dihapus!');
    }

    public function showSelf()
    {
        $user = Auth::user();
        return view('users.show-self', compact('user'));
    }

    public function editSelf()
    {
        $user = Auth::user();
        return view('users.edit-self', compact('user'));
    }

    public function updateSelf(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'lokasi' => 'nullable|string',
            'komunitas_petani' => 'nullable|string',
        ]);

        $data = $request->only('name', 'email', 'lokasi', 'komunitas_petani');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('akun.show')->with('success', 'Akun kamu berhasil diperbarui!');
    }
}

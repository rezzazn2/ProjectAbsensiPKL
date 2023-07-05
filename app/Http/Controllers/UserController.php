<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data yang diterima dari form register
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        // Buat user baru
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        // Redirect ke halaman login setelah berhasil mendaftar
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}

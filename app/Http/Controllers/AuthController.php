<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('absensi.index');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users',
        'password' => 'required|min:6',
    ]);

    User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')->with('success', 'Registration successful. Please login.');
}
}

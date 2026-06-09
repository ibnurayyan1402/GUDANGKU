<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        // Validasi inputan
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek apakah email dan password cocok di database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 🎯 JIKA YANG LOGIN ADALAH ADMIN GUDANG
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/dashboard')->with('success', 'Selamat Datang di Sistem Gudang!');
            }

            // 🎯 JIKA YANG LOGIN ADALAH ROLE STAFF TOKO
            if (Auth::user()->role === 'toko') {
                return redirect()->intended('/toko/dashboard')->with('success', 'Selamat Datang Toko!');
            }
        }

        // Jika gagal, kembalikan ke login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
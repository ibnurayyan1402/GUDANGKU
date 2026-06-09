<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // 1. Fungsi Menampilkan Halaman Edit Profil
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    // 2. Fungsi Memproses Update Email dan Password
    public function update(Request $request)
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        
        // Validasi inputan form
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Proses ganti email
        $user->email = $request->email;

        // Proses ganti password jika diisi oleh user
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $user->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('status', 'Profil berhasil diperbarui!');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Fungsi index untuk memanggil halaman utama dashboard
    public function index()
    {
        // diarahkan ke folder auth/dashboard.blade.php sesuai struktur barumu
        return view('auth.dashboard'); 
    }

    // Fungsi laporan jika nanti diakses
    public function laporan()
    {
        return view('laporan.index');
    }
}
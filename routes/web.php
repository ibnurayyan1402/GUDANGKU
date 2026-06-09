<?php

// =========================================================================
// PENGALAMATAN CONTROLLER (Wajib di-import agar tidak merah/error di bawah)
// =========================================================================
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WmsTokoController;
use Illuminate\Support\Facades\Route;

// =========================================================================
// 1. ROUTE LOGIN (Bebas Diakses & Otomatis Mendaftarkan Akun)
// =========================================================================
Route::get('/', function() {
    // Membuat Otomatis Akun Admin Gudang
    \App\Models\User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Admin Gudang',
            'password' => bcrypt('password123'),
            'role' => 'admin'
        ]
    );

    // Membuat Otomatis Akun Staff Toko
    \App\Models\User::updateOrCreate(
        ['email' => 'toko@gmail.com'],
        [
            'name' => 'Staff Toko Cabang',
            'password' => bcrypt('toko123'),
            'role' => 'toko'
        ]
    );

    return view('auth.login');
})->name('login');

// Menerima form login
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

// =========================================================================
// 2. ROUTE SISTEM (Wajib Login - Versi Aman & Bebas Bug Middleware)
// =========================================================================
Route::middleware('auth')->group(function () {

    // Menggunakan resource agar otomatis membuat rute index, create, store, edit, update, destroy
    Route::resource('barang', BarangController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);
    
    // MENU UTAMA ADMIN GUDANG
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('supplier', SupplierController::class);
    Route::resource('barang', BarangController::class);
    
    // Transaksi Barang Masuk
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index');
    Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store');

    // Transaksi Barang Keluar Otomatis Resource
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar.index');
    Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang-keluar.store');
    
    // Menu Tambahan Admin
    Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan.index');

    // MENU UTAMA STAFF TOKO (Menggunakan WmsTokoController agar integrasi lancar)
    Route::get('/toko/dashboard', function() {
        return view('toko.dashboard');
    })->name('toko.dashboard');

    // A. Sub-Menu: Minta Barang
    Route::get('/toko-permintaan', [WmsTokoController::class, 'mintaBarangIndex'])->name('toko-permintaan.index');
    Route::post('/toko-permintaan/store', [WmsTokoController::class, 'mintaBarangStore'])->name('toko-permintaan.store');

    // B. Sub-Menu: Penerimaan Barang
    Route::get('/toko-penerimaan', [WmsTokoController::class, 'penerimaanIndex'])->name('toko-penerimaan.index');
    Route::post('/toko-penerimaan/{id}/terima', [WmsTokoController::class, 'terimaBarangAction'])->name('toko-penerimaan.action');

    // C. Sub-Menu: Stok Etalase
    Route::get('/toko-etalase', [WmsTokoController::class, 'stokEtalaseIndex'])->name('toko-etalase.index');

    // BISA DIAKSES KEDUA ROLE SELESAI LOGIN (Profile & Logout)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
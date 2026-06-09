<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;

class TokoPermintaanController extends Controller
{
    // 1. Menampilkan Tabel Riwayat Pengeluaran Toko
    public function index()
    {
        // Mengambil daftar barang untuk modal pop-up
        $barangs = Barang::where('stok', '>', 0)->get();

        // Mengambil data riwayat barang keluar beserta informasi nama barangnya
        $permintaans = BarangKeluar::with('barang')->latest()->get();
        
        // Disesuaikan agar mengarah ke file view: toko/minta_barang.blade.php
        return view('toko.minta_barang', compact('permintaans', 'barangs'));
    }

    // 2. Menampilkan Form Isian Ambil Barang (Jika diakses via URL terpisah)
    public function create()
    {
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('toko.minta_barang', compact('barangs'));
    }

    // 3. Memproses Penyimpanan Data & Memotong Stok Gudang Secara Otomatis
    public function store(Request $request)
    {
        // Diselaraskan dengan name="jumlah_minta" dari formulir HTML
        $request->validate([
            'barang_id'    => 'required|exists:barangs,id',
            'jumlah_minta' => 'required|numeric|min:1',
        ]);

        // Cek ketersediaan stok barang di gudang utama terlebih dahulu
        $barang = Barang::findOrFail($request->barang_id);
        if ($barang->stok < $request->jumlah_minta) {
            return redirect()->back()->with('error', 'Maaf, stok di gudang utama tidak mencukupi!');
        }

        // A. Masukkan data ke tabel barang keluar
        BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'jumlah'    => $request->jumlah_minta, // Menggunakan nilai dari jumlah_minta
            'tanggal'   => now(),
        ]);

        // B. POTONG STOK OTOMATIS: Kurangi stok di gudang utama
        $barang->decrement('stok', $request->jumlah_minta);

        return redirect()->route('toko-permintaan.index')->with('success', 'Barang berhasil dikeluarkan dan stok gudang otomatis berkurang!');
    }
}
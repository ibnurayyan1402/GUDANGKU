<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WmsTokoController extends Controller
{
    /**
     * === MENU 1: HALAMAN DAFTAR PERMINTAAN BARANG ===
     * Menampilkan riwayat request barang dari toko ke gudang
     */
    public function mintaBarangIndex()
    {
        // Ambil data log permintaan gabung dengan tabel master barang untuk mengambil 'nama_barang'
        $permintaans = DB::table('permintaan_barangs')
            ->join('barangs', 'permintaan_barangs.barang_id', '=', 'barangs.id')
            ->select('permintaan_barangs.*', 'barangs.nama_barang')
            ->orderBy('permintaan_barangs.created_at', 'desc')
            ->get();

        // Ambil semua daftar barang untuk kebutuhan pilihan dropdown di form modal toko
        $barangs = DB::table('barangs')
            ->orderBy('nama_barang', 'asc')
            ->get();

        // Lempar data ke view toko/minta_barang.blade.php
        return view('toko.minta_barang', compact('permintaans', 'barangs'));
    }

    /**
     * === MENU 2: PROSES SIMPAN PERMINTAAN BARANG ===
     * Memproses data ketika toko mengklik tombol 'Kirim Permintaan'
     */
    public function mintaBarangStore(Request $request)
    {
        // Validasi inputan dari form modal toko
        $request->validate([
            'barang_id' => 'required',
            'jumlah'    => 'required|integer|min:1',
        ]);

        // Masukkan data request baru ke tabel dengan status default 'Pending'
        DB::table('permintaan_barangs')->insert([
            'barang_id'  => $request->barang_id,
            'jumlah'     => $request->jumlah,
            'status'     => 'Pending', // Menunggu persetujuan admin gudang
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('toko-permintaan.index')
            ->with('success', 'Permintaan pasokan barang berhasil dikirim ke Gudang Utama! Menunggu konfirmasi.');
    }
}
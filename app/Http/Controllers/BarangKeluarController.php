<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    // Menampilkan halaman utama barang keluar beserta data dropdown barang
    public function index() 
    {
        $barang_keluars = BarangKeluar::with('barang')->latest()->get();
        $barangs = Barang::where('stok', '>', 0)->get(); // Hanya barang yang punya stok
        return view('barang_keluar.index', compact('barang_keluars', 'barangs'));
    }

    // Memproses data simpan barang keluar & langsung memotong stok gudang
    public function store(Request $request) 
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah'    => 'required|integer|min:1',
        ]);

        // Validasi apakah stok di gudang mencukupi
        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Gagal! Stok di gudang utama tidak mencukupi.');
        }

        // Catat data keluar
        BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'jumlah'    => $request->jumlah,
            'tanggal'   => now(),
        ]);

        // Otomatis potong stok barang di gudang utama
        $barang->decrement('stok', $request->jumlah);

        return redirect()->back()->with('success', 'Transaksi barang keluar berhasil dicatat, stok berkurang!');
    }
}
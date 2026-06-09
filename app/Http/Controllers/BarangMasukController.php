<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    // Menampilkan halaman riwayat barang masuk beserta modal form-nya
    public function index()
    {
        $barang_masuks = BarangMasuk::with(['barang', 'supplier'])->latest()->get();
        $barangs = Barang::all();
        $suppliers = Supplier::all();

        return view('barang_masuk.index', compact('barang_masuks', 'barangs', 'suppliers'));
    }

    // Memproses penyimpanan pasokan barang masuk & otomatis menambah stok global
    public function store(Request $request)
    {
        $request->validate([
            'barang_id'     => 'required|exists:barangs,id',
            'supplier_id'   => 'required|exists:suppliers,id',
            'jumlah'        => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        // 1. Catat log transaksi masuk
        BarangMasuk::create([
            'barang_id'     => $request->barang_id,
            'supplier_id'   => $request->supplier_id,
            'jumlah'        => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // 2. Otomatis Tambah Stok Barang di Gudang Utama
        $barang = Barang::find($request->barang_id);
        $barang->increment('stok', $request->jumlah);

        return redirect()->route('barang-masuk.index')->with('success', 'Log pasokan barang masuk berhasil dicatat, stok global bertambah!');
    }
}
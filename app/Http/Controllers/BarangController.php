<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function store(Request $request) {
        $request->validate([
            'kode_barang' => 'required|string|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|max:255',
        ]);
        // Saat pertama kali dibuat, stok otomatis 0 sesuai default migration
        Barang::create($request->all());
        return redirect()->back()->with('success', 'Master barang berhasil ditambahkan!');
    }

    public function destroy(Barang $barang) {
        $barang->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus!');
    }
}

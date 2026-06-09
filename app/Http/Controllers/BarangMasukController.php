<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;       
use App\Models\Supplier;     
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        // 1. Ambil semua riwayat barang masuk untuk tabel beserta relasinya
        $barang_masuks = BarangMasuk::with(['barang', 'supplier'])->latest()->get();

        // 2. Ambil data barang dan supplier dari database untuk pilihan di modal popup
        $barangs = Barang::orderBy('nama_barang', 'asc')->get();
        $suppliers = Supplier::orderBy('nama_supplier', 'asc')->get();

        // 3. Kirim ketiga data tersebut ke halaman view
        return view('barang_masuk.index', compact('barang_masuks', 'barangs', 'suppliers'));
    }

    public function store(Request $request)
    {
        // Validasi input data dari form
        $request->validate([
            'barang_id'     => 'required|exists:barangs,id',
            'supplier_id'   => 'required|exists:suppliers,id',
            'jumlah'        => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            
            // 1. Simpan data transaksi barang masuk
            BarangMasuk::create([
                'barang_id'     => $request->barang_id,
                'supplier_id'   => $request->supplier_id,
                'jumlah'        => $request->jumlah,
                'tanggal_masuk' => $request->tanggal_masuk,
            ]);

            // 2. Tambahkan stok barang yang bersangkutan secara otomatis
            $barang = Barang::find($request->barang_id);
            if ($barang) {
                $barang->increment('stok', (int) $request->jumlah);
            }
        });

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Log masuk berhasil disimpan dan stok barang telah bertambah!');
    }
}
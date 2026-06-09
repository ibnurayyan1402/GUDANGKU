<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PermintaanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WmsTokoController extends Controller
{
    // === MENU 1: MINTA BARANG ===
    public function mintaBarangIndex()
    {
        $permintaans = PermintaanBarang::with('barang')->latest()->get();
        $barangs = Barang::orderBy('nama_barang', 'asc')->get();
        return view('toko.minta_barang', compact('permintaans', 'barangs'));
    }

    public function mintaBarangStore(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_diminta' => 'required|integer|min:1',
        ]);

        PermintaanBarang::create([
            'barang_id' => $request->barang_id,
            'jumlah_diminta' => $request->jumlah_diminta,
            'status' => 'Pending'
        ]);

        return redirect()->route('toko.minta.index')->with('success', 'Permintaan pasokan baru berhasil diajukan ke Gudang Utama!');
    }

    // === MENU 2: PENERIMAAN BARANG ===
    public function penerimaanIndex()
    {
        // Menampilkan barang permintaan yang statusnya sudah 'Disetujui' oleh gudang utama
        $kirimanGudang = PermintaanBarang::with('barang')
            ->whereIn('status', ['Disetujui', 'Diterima Toko'])
            ->latest()
            ->get();

        return view('toko.penerimaan_barang', compact('kirimanGudang'));
    }

    public function terimaBarangAction($id)
    {
        $permintaan = PermintaanBarang::findOrFail($id);

        if ($permintaan->status === 'Diterima Toko') {
            return redirect()->back()->with('error', 'Barang ini sudah pernah diterima sebelumnya.');
        }

        DB::transaction(function () use ($permintaan) {
            // Update status pengajuan
            $permintaan->update(['status' => 'Diterima Toko']);

            // Tambahkan kuantitas ke stok etalase ritel toko
            $barang = Barang::find($permintaan->barang_id);
            if ($barang) {
                $barang->increment('stok_etalase', $permintaan->jumlah_diminta);
            }
        });

        return redirect()->route('toko.penerimaan.index')->with('success', 'Stok berhasil masuk dan menambah display etalase ritel!');
    }

    // === MENU 3: STOK ETALASE ===
    public function stokEtalaseIndex()
    {
        // Tampilkan daftar real-time stok yang ada di etalase toko saat ini
        $barangs = Barang::orderBy('nama_barang', 'asc')->get();
        return view('toko.stok_etalase', compact('barangs'));
    }
}
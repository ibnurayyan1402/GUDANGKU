<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // 1. Menampilkan Semua Data Supplier
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('supplier.index', compact('suppliers'));
    }

    // 2. 🎯 FUNGSI MENAMPILKAN HALAMAN FORM TAMBAH (Ini yang bikin eror tadi)
    public function create()
    {
        return view('supplier.create');
    }

    // 3. Memproses Simpan Data Supplier Baru dari Form
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => '',
            'telepon'       => '',
            'alamat'        => '',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    // 5. Memproses Update Data ke Database
    public function update(Request $request, $id)
    {
        //  KODE YANG BENAR
        $request->validate([
            'nama_supplier' => 'required|string|max:255', // Menggunakan aturan validasi, bukan variabel input
            'kontak'        => 'required|string|max:15',
            'alamat'        => 'required|string',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui!');
    }

    // 6. Fungsi Hapus Data
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->back()->with('success', 'Data supplier berhasil dihapus!');
    }
}
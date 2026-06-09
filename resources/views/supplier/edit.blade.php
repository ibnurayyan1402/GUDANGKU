<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier - SiGudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 p-8 flex items-center justify-center min-h-screen">

    <div class="bg-slate-950 border border-slate-800 p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <div class="mb-6">
            <h2 class="text-xl font-black text-white tracking-tight">Edit Data Supplier</h2>
            <p class="text-xs text-slate-400 mt-1">Ubah informasi data pemasok berelasi.</p>
        </div>

        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nama PT / Perusahaan</label>
                <input type="text" name="nama_supplier" value="{{ $supplier->nama_supplier }}" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-blue-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Kontak / HP</label>
                <input type="text" name="telepon" value="{{ $supplier->telepon }}" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-blue-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Alamat Kantor</label>
                <textarea name="alamat" required rows="3" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-blue-500 transition">{{ $supplier->alamat }}</textarea>
            </div>

            <div class="pt-4 flex gap-3 border-t border-slate-900">
                <a href="{{ route('supplier.index') }}" class="w-1/2 text-center bg-slate-900 border border-slate-800 text-slate-400 py-3 rounded-xl text-sm font-bold transition hover:bg-slate-800">Batal</a>
                <button type="submit" class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl text-sm transition shadow-lg shadow-blue-500/20">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</body>
</html>
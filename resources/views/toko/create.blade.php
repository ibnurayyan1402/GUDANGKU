<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ambil Barang - WMS Toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen flex justify-center items-center p-4">

    <div class="bg-slate-950 border border-slate-800 p-8 rounded-2xl shadow-2xl w-full max-w-lg">
        <div class="mb-6">
            <h2 class="text-xl font-black text-white tracking-tight">Form Ambil Barang</h2>
            <p class="text-xs text-slate-400 mt-1">Silakan pilih item produk dan tentukan jumlah barang yang ingin dikeluarkan menuju toko.</p>
        </div>

        @if(session('error'))
        <div class="mb-4 p-3 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-xl text-xs">
            ⚠️ {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('toko-permintaan.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Pilih Barang</label>
                <select name="barang_id" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-emerald-500 transition">
                    <option value="">-- Silakan Pilih Item --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }} (Tersedia: {{ $barang->stok }} Pcs)</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Jumlah Kuantitas Keluar</label>
                <input type="number" min="1" name="jumlah" required placeholder="Contoh: 15" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-emerald-500 transition">
            </div>

            <div class="pt-4 flex gap-3 border-t border-slate-900">
                <a href="{{ route('toko-permintaan.index') }}" class="w-1/2 text-center bg-slate-900 border border-slate-800 text-slate-400 py-3 rounded-xl text-sm font-bold transition hover:bg-slate-800">Batal</a>
                <button type="submit" class="w-1/2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl text-sm transition shadow-lg shadow-emerald-500/20">Keluarkan Barang</button>
            </div>
        </form>
    </div>

</body>
</html>
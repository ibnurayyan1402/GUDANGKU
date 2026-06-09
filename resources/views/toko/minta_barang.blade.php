<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minta Barang - WMS Toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen" x-data="{ open: false }">
    <div class="flex min-h-screen w-full">
        <!-- SIDEBAR -->
        <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between shrink-0">
            <div>
                <div class="mb-8">
                    <h1 class="text-xl font-black text-emerald-500 tracking-wider">WMS TOKO</h1>
                    <p class="text-xs text-slate-500">Panel Hak Akses Gerai</p>
                </div>
                <nav class="space-y-2">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-chart-pie w-5"></i> Dashboard</a>
                    <a href="{{ route('toko.minta.index') }}" class="flex items-center gap-3 px-4 py-3 bg-emerald-600 text-white rounded-xl text-sm font-bold transition"><i class="fa-solid fa-code-pull-request w-5"></i> Minta Barang</a>
                    <a href="{{ route('toko.penerimaan.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-truck-ramp-box w-5"></i> Penerimaan Barang</a>
                    <a href="{{ route('toko.etalase.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-store w-5"></i> Stok Etalase</a>
                </nav>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex-1 p-8 overflow-y-auto">
            <div class="flex justify-between items-center mb-8 w-full">
                <div>
                    <h2 class="text-2xl font-black text-white tracking-tight">Minta Pasokan Barang Baru</h2>
                    <p class="text-sm text-slate-400 mt-1">Ajukan dokumen permintaan pemenuhan stok eceran langsung ke gudang utama.</p>
                </div>
                <button @click="open = true" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl text-sm font-bold transition flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Buat Pengajuan
                </button>
            </div>

            <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 text-xs font-bold uppercase tracking-wider">
                            <th class="pb-4">Waktu Pengajuan</th>
                            <th class="pb-4">Nama Item Barang</th>
                            <th class="pb-4">Kuantitas Diminta</th>
                            <th class="pb-4">Status Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-900">
                        @forelse($permintaans as $item)
                        <tr>
                            <td class="py-4 text-slate-400">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-4 font-bold text-white">{{ $item->barang->nama_barang }}</td>
                            <td class="py-4 text-slate-300">{{ $item->jumlah_diminta }} Pcs</td>
                            <td class="py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold 
                                    {{ $item->status == 'Pending' ? 'bg-amber-500/10 text-amber-400' : ($item->status == 'Disetujui' ? 'bg-blue-500/10 text-blue-400' : 'bg-emerald-500/10 text-emerald-400') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-slate-500 text-sm italic text-center py-8">Belum ada riwayat pengajuan permintaan barang dari gerai ini.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL FORM -->
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" x-cloak>
        <div class="bg-slate-950 border border-slate-800 p-8 rounded-2xl w-full max-w-md" @click.away="open = false">
            <h2 class="text-xl font-black text-white mb-4">Form Pengajuan Barang</h2>
            <form action="{{ route('toko.minta.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-400 mb-2">Pilih Item Barang</label>
                    <select name="barang_id" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_barang }} (Stok Gudang: {{ $b->stok }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 mb-2">Jumlah Kuantitas</label>
                    <input type="number" min="1" name="jumlah_diminta" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="button" @click="open = false" class="w-1/2 bg-slate-900 text-slate-400 py-3 rounded-xl text-sm font-bold">Batal</button>
                    <button type="submit" class="w-1/2 bg-emerald-600 text-white py-3 rounded-xl text-sm font-bold">Kirim Pengajuan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
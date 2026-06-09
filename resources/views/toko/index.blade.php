<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Barang - WMS Toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen flex">

    <div class="flex min-h-screen">
        <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between shrink-0">
            <div>
                <div class="mb-8">
                    <h1 class="text-xl font-black text-emerald-500 tracking-wider">WMS TOKO</h1>
                    <p class="text-xs text-slate-500 font-medium">Panel Hak Akses Gerai</p>
                </div>
                
                <nav class="space-y-2">
                    <a href="{{ route('toko.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-chart-pie w-5"></i> Dashboard
                    </a>
                    <a href="{{ route('toko-permintaan.index') }}" class="flex items-center gap-3 px-4 py-3 bg-emerald-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-emerald-600/10">
                        <i class="fa-solid fa-code-pull-request w-5"></i> Minta Barang
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-truck-ramp-box w-5"></i> Penerimaan Barang
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-boxes-stacked w-5"></i> Stok Etalase
                    </a>
                </nav>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-center bg-slate-900 hover:bg-slate-800 text-slate-300 py-2.5 rounded-xl text-sm font-semibold transition border border-slate-800">
                    Keluar Sistem
                </button>
            </form>
        </div>

    <div class="flex-1 p-8 overflow-y-auto">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-black text-white tracking-tight">Riwayat Pengambilan Barang</h2>
                <p class="text-sm text-slate-400">Daftar log data barang yang berhasil dikeluarkan untuk gerai tokomu.</p>
            </div>
            <a href="{{ route('toko-permintaan.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center gap-2 shadow-lg shadow-emerald-600/20">
                <i class="fa-solid fa-plus"></i> Ambil Barang Baru
            </a>
        </header>

        @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl text-sm flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
        @endif

        <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="pb-4">Tanggal Keluar</th>
                        <th class="pb-4">Nama Produk / Barang</th>
                        <th class="pb-4">Kuantitas</th>
                        <th class="pb-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-900">
                    @forelse($permintaans as $item)
                    <tr>
                        <td class="py-4 text-slate-400">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                        <td class="py-4 font-bold text-white">{{ $item->barang->nama_barang ?? 'Produk Dihapus' }}</td>
                        <td class="py-4 text-slate-300">{{ $item->jumlah }} Pcs</td>
                        <td class="py-4 text-center"><span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-3 py-1 rounded-full text-xs font-semibold">Selesai / Diterima</span></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-slate-500 text-sm italic text-center py-8">Belum ada riwayat pengeluaran barang untuk gerai toko.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
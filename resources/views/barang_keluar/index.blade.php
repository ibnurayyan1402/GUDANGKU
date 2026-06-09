<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Keluar - WMS Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen" x-data="{ open: false }">
    <div class="flex min-h-screen w-full">
        
        <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between shrink-0">
            <div>
                <div class="mb-8">
                    <h1 class="text-xl font-black text-blue-500 tracking-wider">WMS GUDANG</h1>
                    <p class="text-xs text-slate-500">Panel Hak Akses Admin</p>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-chart-pie w-5"></i> Dashboard</a>
                    <a href="{{ route('supplier.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-truck w-5"></i> Data Supplier</a>
                    <a href="{{ route('barang.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-box w-5"></i> Data Barang</a>
                    <a href="{{ route('barang-masuk.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-arrow-down-long w-5"></i> Barang Masuk</a>
                    <a href="{{ route('barang-keluar.index') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-xl text-sm font-bold transition"><i class="fa-solid fa-arrow-up-long w-5"></i> Barang Keluar</a>
                    <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 rounded-xl text-sm font-medium transition"><i class="fa-solid fa-file-invoice w-5"></i> Laporan</a>
                </nav>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-slate-900 hover:bg-red-950 hover:text-red-400 text-slate-400 py-3 rounded-xl text-sm font-bold transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar Sistem
                </button>
            </form>
        </div>

        <div class="flex-1 p-8 overflow-y-auto">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-8 w-full">
                <div>
                    <h2 class="text-2xl font-black text-white tracking-tight">Pengeluaran Pasokan Barang (Outbound)</h2>
                    <p class="text-sm text-slate-400 mt-1">Pencatatan distribusi mutasi komoditas stok dari gudang menuju gerai retail.</p>
                </div>
                <button type="button" @click="open = true" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-red-500/20 transition flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Catat Barang Keluar
                </button>
            </div>

            <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 text-xs font-bold uppercase tracking-wider">
                            <th class="pb-4">Tanggal Distribusi</th>
                            <th class="pb-4">Nama Produk</th>
                            <th class="pb-4">Jumlah Kuantitas Keluar</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-900">
                        @forelse($barang_keluars ?? [] as $log)
                        <tr>
                            <td class="py-4 text-slate-400">{{ \Carbon\Carbon::parse($log->tanggal)->format('d/m/Y H:i') }}</td>
                            <td class="py-4 font-bold text-white">{{ $log->barang->nama_barang ?? 'N/A' }}</td>
                            <td class="py-4 text-rose-400 font-semibold">- {{ $log->jumlah }} Pcs</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-slate-500 text-sm italic text-center py-8">Belum ada riwayat pencatatan log barang keluar dari gudang ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm" x-cloak>
        <div class="bg-slate-950 border border-slate-800 p-8 rounded-2xl w-full max-w-md shadow-2xl" @click.away="open = false">
            
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-black text-white">Form Catat Barang Keluar</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Mutasi pengeluaran stok komoditas utama.</p>
                </div>
                <button @click="open = false" class="text-slate-500 hover:text-white transition"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>

            <form action="{{ route('barang-keluar.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Pilih Item Barang</label>
                    <select name="barang_id" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs ?? [] as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_barang }} (Sisa Stok: {{ $b->stok }} Pcs)</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Jumlah Kuantitas Keluar</label>
                    <input type="number" min="1" name="jumlah" required placeholder="Masukkan jumlah item..." class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" @click="open = false" class="w-1/2 bg-slate-900 border border-slate-800 text-slate-400 py-3 rounded-xl text-sm font-bold transition hover:bg-slate-800">Batal</button>
                    <button type="submit" class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl text-sm font-bold transition shadow-lg shadow-blue-500/20">Simpan Log Keluar</button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
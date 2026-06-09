<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang - SiGudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen" x-data="{ open: false }">

    <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between">
        <div>
            <div class="mb-8">
                <h1 class="text-xl font-black text-blue-500 tracking-wider">SiGUDANG</h1>
                <p class="text-xs text-slate-500">Sistem Informasi Gudang</p>
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                    <i class="fa-solid fa-chart-pie w-5"></i> Dashboard
                </a>
                <a href="{{ route('supplier.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                    <i class="fa-solid fa-truck-field w-5"></i> Data Supplier
                </a>
                <a href="{{ route('barang.index') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-xl text-sm font-bold transition shadow-lg shadow-blue-600/20">
                    <i class="fa-solid fa-boxes-stacked w-5"></i> Data Barang
                </a>
                <a href="{{ route('barang-masuk.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                    <i class="fa-solid fa-square-arrow-down-left text-emerald-500 w-5"></i> Barang Masuk
                </a>
                <a href="{{ route('barang-keluar.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                    <i class="fa-solid fa-square-arrow-up-right text-rose-500 w-5"></i> Barang Keluar
                </a>
                <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                    <i class="fa-solid fa-file-invoice w-5"></i> Laporan
                </a>
            </nav>
        </div>
    </div>

    <div class="flex-1 p-8">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-black text-white tracking-tight">Data Barang</h2>
                <p class="text-sm text-slate-400">Manajemen katalog produk, pelacakan SKU, dan kendali stok master.</p>
            </div>
            <button type="button" @click="open = true" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 transition">
                <i class="fa-solid fa-plus mr-1"></i> Tambah Barang Baru
            </button>
        </header>

        <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 text-xs uppercase font-bold tracking-wider">
                            <th class="pb-4">Kode Barang</th>
                            <th class="pb-4">Nama Barang</th>
                            <th class="pb-4">Kategori</th>
                            <th class="pb-4 text-center">Stok Global</th>
                            <th class="pb-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-slate-300 divide-y divide-slate-800">
                        <tr>
                            <td class="py-4 font-mono text-blue-400">Gudangku - 15:53/08/06/26</td>
                            <td class="py-4 font-semibold text-white">SSD Samsung EVO 500GB</td>
                            <td class="py-4"><span class="bg-slate-900 border border-slate-800 px-2.5 py-1 rounded-md text-xs font-medium">Elektronik</span></td>
                            <td class="py-4 text-center text-emerald-400 font-bold">1,240 Pcs</td>
                            <td class="py-4 text-center">
                                <button class="text-blue-400 hover:underline text-xs mr-3"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                <button class="text-rose-400 hover:underline text-xs"><i class="fa-solid fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="text-sm text-slate-300 divide-y divide-slate-800">
                        <tr>
                            <td class="py-4 font-mono text-blue-400">Gudangku - 10:53/09/06/26</td>
                            <td class="py-4 font-semibold text-white">Samsung Flip 42GB</td>
                            <td class="py-4"><span class="bg-slate-900 border border-slate-800 px-2.5 py-1 rounded-md text-xs font-medium">E</span></td>
                            <td class="py-4 text-center text-emerald-400 font-bold">140 Pcs</td>
                            <td class="py-4 text-center">
                                <button class="text-blue-400 hover:underline text-xs mr-3"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                <button class="text-rose-400 hover:underline text-xs"><i class="fa-solid fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm" x-cloak>
    <div class="bg-slate-950 border border-slate-800 p-8 rounded-2xl w-full max-w-md shadow-2xl" @click.away="open = false">
        
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-black text-white">Tambah Barang Baru</h2>
                <p class="text-xs text-slate-400 mt-0.5">Masukkan informasi data katalog produk master.</p>
            </div>
            <button @click="open = false" class="text-slate-500 hover:text-white transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <form action="{{ route('barang.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" required placeholder="Contoh: SSD Samsung EVO 500GB" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Kategori</label>
                <input type="text" name="kategori" required placeholder="Contoh: Elektronik / HandPhone" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Stok Awal</label>
                <input type="number" min="0" name="stok" required placeholder="Contoh: 100" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition">
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" @click="open = false" class="w-1/2 bg-slate-900 border border-slate-800 text-slate-400 py-3 rounded-xl text-sm font-bold transition hover:bg-slate-800">
                    Batal
                </button>
                <button type="submit" class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl text-sm font-bold transition shadow-lg shadow-blue-500/20">
                    Simpan Barang
                </button>
            </div>
        </form>

    </div>
</div>
</body>
</html>
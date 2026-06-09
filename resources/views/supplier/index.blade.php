<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier - SiGudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen flex">

    <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between">
        <div>
            <div class="mb-8"><h1 class="text-xl font-black text-blue-500 tracking-wider">SiGUDANG</h1></div>
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-chart-pie w-5"></i> Dashboard</a>
                <a href="{{ route('supplier.index') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-xl text-sm font-bold transition"><i class="fa-solid fa-truck-field w-5"></i> Data Supplier</a>
                <a href="{{ route('barang.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-boxes-stacked w-5"></i> Data Barang</a>
                <a href="{{ route('barang-masuk.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-square-arrow-down-left text-emerald-500 w-5"></i> Barang Masuk</a>
                <a href="{{ route('barang-keluar.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-square-arrow-up-right text-rose-500 w-5"></i> Barang Keluar</a>
                <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-file-invoice w-5"></i> Laporan</a>
            </nav>
        </div>
    </div>

    <div class="flex-1 p-8">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-black text-white tracking-tight">Manajemen Supplier</h2>
                <p class="text-sm text-slate-400">Kelola daftar perusahaan penyalur barang ke gudang.</p>
            </div>
            <a href="{{ route('supplier.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 transition inline-block">
                <i class="fa-solid fa-plus mr-1"></i> Tambah Supplier
            </a>
        </header>

        <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 text-xs uppercase font-bold tracking-wider">
                            <th class="pb-4">Nama PT / Perusahaan</th>
                            <th class="pb-4">Kontak / HP</th>
                            <th class="pb-4">Alamat Kantor</th>
                            <th class="pb-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-slate-300 divide-y divide-slate-800">
                        <tr>
                            <td class="py-4 font-semibold text-white">PT. Sumber Sentosa Abadi</td>
                            <td class="py-4">0812-3456-7890</td>
                            <td class="py-4">Jl. Industri Raya No. 45, Jakarta</td>
                            <td class="py-4 text-center flex items-center justify-center gap-4">
                                <a href="{{ route('supplier.edit', 1) }}" class="text-blue-400 hover:text-blue-300 font-medium text-xs transition flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>

                                <form action="{{ route('supplier.destroy', 1) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus supplier ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:text-rose-400 font-medium text-xs transition flex items-center gap-1">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat & Laporan - SiGudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen flex">

    <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between">
        <div>
            <div class="mb-8"><h1 class="text-xl font-black text-blue-500 tracking-wider">SIGUDANG</h1></div>
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-chart-pie w-5"></i> Dashboard</a>
                <a href="{{ route('supplier.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-truck-field w-5"></i> Data Supplier</a>
                <a href="{{ route('barang.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-boxes-stacked w-5"></i> Data Barang</a>
                <a href="{{ route('barang-masuk.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-square-arrow-down-left text-emerald-500 w-5"></i> Barang Masuk</a>
                <a href="{{ route('barang-keluar.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition"><i class="fa-solid fa-square-arrow-up-right text-rose-500 w-5"></i> Barang Keluar</a>
                <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-xl text-sm font-bold transition"><i class="fa-solid fa-file-invoice w-5"></i> Laporan</a>
            </nav>
        </div>
    </div>

    <div class="flex-1 p-8">
        <header class="mb-8">
            <h2 class="text-2xl font-black text-white tracking-tight">Laporan Mutasi Barang</h2>
            <p class="text-sm text-slate-400">Cetak dokumen rekapan barang masuk dan keluar untuk arsip berkala.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-white text-lg">Laporan Inbound (Masuk)</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Format file: Dokumen .PDF resmi</p>
                </div>
                <button class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-xl text-sm transition">
                    <i class="fa-solid fa-print mr-1"></i> Cetak PDF
                </button>
            </div>

            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-white text-lg">Laporan Outbound (Keluar)</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Format file: Dokumen .PDF resmi</p>
                </div>
                <button class="bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-xl text-sm transition">
                    <i class="fa-solid fa-print mr-1"></i> Cetak PDF
                </button>
            </div>
        </div>
    </div>
</body>
</html>
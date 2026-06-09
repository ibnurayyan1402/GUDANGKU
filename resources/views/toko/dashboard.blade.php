<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Toko - WMS Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen flex">

    <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between shrink-0">
        <div>
            <div class="mb-8">
                <h1 class="text-xl font-black text-emerald-500 tracking-wider">WMS TOKO</h1>
                <p class="text-xs text-slate-500 font-medium">Panel Hak Akses Gerai</p>
            </div>
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-emerald-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-emerald-600/10">
                    <i class="fa-solid fa-chart-pie w-5"></i> Dashboard
                </a>
                <a href="{{ route('toko-permintaan.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                    <i class="fa-solid fa-code-pull-request w-5"></i> Minta Barang
                </a>
            </nav>
        </div>
        
        <a href="/dashboard" class="w-full text-center bg-slate-900 hover:bg-slate-800 text-slate-400 hover:text-white py-2.5 rounded-xl text-sm font-semibold transition border border-slate-800">
             Kembali ke Admin
        </a>
    </div>

    <div class="flex-1 p-8 overflow-y-auto">
        <header class="mb-8">
            <h2 class="text-2xl font-black text-white tracking-tight">Selamat Datang, Staff Toko </h2>
            <p class="text-sm text-slate-400">Di halaman ini, gerai toko bisa mengajukan permintaan pasokan barang ke gudang utama.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800">
                <div class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-2">Total Pengajuan Stok</div>
                <div class="text-3xl font-black text-white">0 <span class="text-sm font-normal text-slate-400">Transaksi</span></div>
            </div>
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800">
                <div class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-2">Barang Sukses Diterima</div>
                <div class="text-3xl font-black text-emerald-400">0 <span class="text-sm font-normal text-slate-400">Pcs</span></div>
            </div>
        </div>
    </div>

</body>
</html>
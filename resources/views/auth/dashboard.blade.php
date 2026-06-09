<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utama - SiGudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen flex">

    <div class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="mb-8">
                <h1 class="text-xl font-black text-blue-500 tracking-wider">SiGUDANG</h1>
                <p class="text-xs text-slate-500">Sistem Manajemen Stok </p>
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-xl text-sm font-bold transition shadow-lg shadow-blue-600/20">
                    <i class="fa-solid fa-chart-pie w-5"></i> Dashboard
                </a>
                <a href="{{ route('supplier.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
                    <i class="fa-solid fa-truck-field w-5"></i> Data Supplier
                </a>
                <a href="{{ route('barang.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-900 hover:text-white rounded-xl text-sm font-medium transition">
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

        <div class="border-t border-slate-800 pt-4">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white shadow-md shadow-blue-500/20">
                    AG
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">Admin Gudang</h4>
                    <p class="text-xs text-slate-500 capitalize">Super Admin</p>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-slate-900 hover:bg-rose-950 hover:text-rose-400 text-slate-400 font-semibold py-2.5 px-4 rounded-xl text-xs transition border border-slate-800 hover:border-rose-900 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar Sistem
                </button>
            </form>
        </div>
    </div>

    <div class="flex-1 p-6 md:p-8 space-y-8 overflow-y-auto max-h-screen">
        
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black text-white tracking-tight">Dashboard Overview</h2>
                <p class="text-sm text-slate-400">Panel pemantauan data stok barang secara real-time.</p>
            </div>
            <div class="bg-slate-950 px-4 py-2 rounded-xl border border-slate-800 text-xs font-semibold text-slate-400 flex items-center gap-2">
                <i class="fa-regular fa-calendar text-blue-500"></i> Selasa, 09 Juni 2026
            </div>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 flex items-center justify-between shadow-xl">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Item Barang</p>
                    <h3 class="text-3xl font-black text-white">1,240 <span class="text-xs font-normal text-slate-400">Pcs</span></h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
            </div>
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 flex items-center justify-between shadow-xl">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Total Supplier</p>
                    <h3 class="text-3xl font-black text-white">10 <span class="text-xs font-normal text-slate-400">Mitra</span></h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-500 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-truck-field"></i>
                </div>
            </div>
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 flex items-center justify-between shadow-xl">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Barang Masuk</p>
                    <h3 class="text-3xl font-black text-emerald-400">+340 <span class="text-xs font-normal text-slate-500">Bulan Ini</span></h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-square-arrow-down-left"></i>
                </div>
            </div>
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 flex items-center justify-between shadow-xl">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Barang Keluar</p>
                    <h3 class="text-3xl font-black text-rose-500">-120 <span class="text-xs font-normal text-slate-500">Bulan Ini</span></h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-rose-500/10 text-rose-500 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-square-arrow-up-right"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 lg:col-span-2 shadow-xl">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h4 class="text-lg font-black text-white">Grafik Arus Logistik</h4>
                        <p class="text-xs text-slate-500">Perbandingan barang masuk dan keluar 5 bulan terakhir.</p>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="chartLogistik"></canvas>
                </div>
            </div>

            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 shadow-xl flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-black text-white mb-1">Aktivitas Terkini</h4>
                    <p class="text-xs text-slate-500 mb-4">Mutasi inventaris terbaru di gudang.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 border-b border-slate-900 pb-3">
                            <div class="p-2 rounded-lg bg-emerald-500/10 text-emerald-400 text-xs mt-0.5"><i class="fa-solid fa-plus"></i></div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-white">SSD Samsung EVO masuk</p>
                                <p class="text-xs text-slate-500">Jumlah: +50 Pcs • Oleh Admin</p>
                            </div>
                            <span class="text-[10px] text-slate-600 font-medium">10 Menit lalu</span>
                        </div>
                        <div class="flex items-start gap-3 border-b border-slate-900 pb-3">
                            <div class="p-2 rounded-lg bg-rose-500/10 text-rose-400 text-xs mt-0.5"><i class="fa-solid fa-minus"></i></div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-white">Monitor Asus TUF keluar</p>
                                <p class="text-xs text-slate-500">Jumlah: -12 Pcs • Distribusi Toko</p>
                            </div>
                            <span class="text-[10px] text-slate-600 font-medium">1 Jam lalu</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="p-2 rounded-lg bg-blue-500/10 text-blue-400 text-xs mt-0.5"><i class="fa-solid fa-truck"></i></div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-white">Mitra Supplier Baru</p>
                                <p class="text-xs text-slate-500">PT. Sentral Teknologi Perkasa</p>
                            </div>
                            <span class="text-[10px] text-slate-600 font-medium">Kemasukan</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('laporan.index') }}" class="block text-center text-xs font-bold text-blue-500 hover:text-blue-400 hover:underline mt-4 transition">Lihat Semua Riwayat →</a>
            </div>
        </div>

    </div>

    <script>
        const ctx = document.getElementById('chartLogistik').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Februari', 'Maret', 'April', 'Mei', 'Juni'],
                datasets: [
                    {
                        label: 'Barang Masuk',
                        data: [120, 230, 180, 310, 340],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Barang Keluar',
                        data: [80, 150, 110, 200, 120],
                        borderColor: '#f43f5e',
                        backgroundColor: 'rgba(244, 63, 94, 0.1)',
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#94a3b8', font: { weight: 'bold' } }
                    }
                },
                scales: {
                    x: { grid: { color: '#1e293b' }, ticks: { color: '#94a3b8' } },
                    y: { grid: { color: '#1e293b' }, ticks: { color: '#94a3b8' } }
                }
            }
        });
    </script>
</body>
</html>
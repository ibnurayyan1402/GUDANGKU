{{-- Struktur head & sidebar sama seperti di atas --}}
        <!-- MAIN CONTENT -->
        <div class="flex-1 p-8 overflow-y-auto">
            <div class="mb-8">
                <h2 class="text-2xl font-black text-white tracking-tight">Katalog Monitor Stok Etalase Toko</h2>
                <p class="text-sm text-slate-400 mt-1">Sisa kuantitas barang retail yang siap dipasarkan atau dipajang di rak penjualan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($barangs as $b)
                <div class="bg-slate-950 border border-slate-800 rounded-2xl p-6 shadow-xl flex items-center justify-between">
                    <div>
                        <h3 class="font-black text-white text-lg tracking-tight">{{ $b->nama_barang }}</h3>
                        <p class="text-xs text-slate-500 mt-1">Kode: BRG-00{{ $b->id }}</p>
                    </div>
                    <div class="text-right">
                        <span class="block text-2xl font-black text-emerald-400">{{ $b->stok_etalase }}</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500">Pcs di Rak</span>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-slate-500 text-sm italic text-center py-8">Belum ada entri master produk yang terdaftar di database.</div>
                @endforelse
            </div>
        </div>
{{-- Struktur head & sidebar sama seperti di atas --}}
        <!-- MAIN CONTENT -->
        <div class="flex-1 p-8 overflow-y-auto">
            <div class="mb-8">
                <h2 class="text-2xl font-black text-white tracking-tight">Konfirmasi Penerimaan Drop Stok</h2>
                <p class="text-sm text-slate-400 mt-1">Konfirmasi paket kiriman barang dari Gudang Utama agar langsung menambah inventaris pajangan toko.</p>
            </div>

            <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 text-xs font-bold uppercase tracking-wider">
                            <th class="pb-4">Nama Barang</th>
                            <th class="pb-4">Jumlah Pasokan</th>
                            <th class="pb-4">Status</th>
                            <th class="pb-4 text-center">Aksi Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-900">
                        @forelse($kirimanGudang as $k)
                        <tr>
                            <td class="py-4 font-bold text-white">{{ $k->barang->nama_barang }}</td>
                            <td class="py-4 text-amber-400 font-semibold">{{ $k->jumlah_diminta }} Pcs</td>
                            <td class="py-4 text-slate-300">{{ $k->status }}</td>
                            <td class="py-4 text-center">
                                @if($k->status == 'Disetujui')
                                    <form action="{{ route('toko.penerimaan.action', $k->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition">
                                            <i class="fa-solid fa-check"></i> Sudah Sampai, Masukkan Etalase
                                        </button>
                                    </form>
                                @else
                                    <span class="text-emerald-400 font-medium text-xs"><i class="fa-solid fa-circle-check"></i> Selesai Ditambahkan</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-slate-500 text-sm italic text-center py-8">Belum ada paket kiriman yang siap diverifikasi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. OTOMATIS GENERATE DATA SUPPLIER NYATA
        $suppliers = [
            [
                'nama_supplier' => 'PT. Sumber Sentosa Abadi',
                'telepon'       => '081234567890',
                'alamat'        => 'Jl. Industri Raya No. 45, Jakarta Pusat',
            ],
            [
                'nama_supplier' => 'CV. Logistik Maju Jaya',
                'telepon'       => '085711223344',
                'alamat'        => 'Kawasan Pergudangan Margomulyo Blok C-12, Surabaya',
            ],
            [
                'nama_supplier' => 'PT. Elektronik Nusantara',
                'telepon'       => '082199887766',
                'alamat'        => 'Kawasan Industri Jababeka Tahap II No. 8, Cikarang',
            ],
            [
                'nama_supplier' => 'Global Distribusi Utama',
                'telepon'       => '081344556677',
                'alamat'        => 'Jl. Jendral Sudirman No. 102, Bandung',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::updateOrCreate(
                ['nama_supplier' => $supplier['nama_supplier']], // Cegah duplikat jika dijalankan ulang
                $supplier
            );
        }
    }
}
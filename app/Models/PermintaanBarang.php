<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanBarang extends Model
{
    use HasFactory;

    // Pastikan fillable mencakup kolom foreign key barang_id
    protected $fillable = [
        'barang_id', 
        'jumlah', 
        'status',
        // tambahkan kolom lain milikmu jika ada (misal: 'keterangan')
    ];

    /**
     * Relasi ke model Barang
     * Nama fungsi ini harus "barang" agar sesuai dengan with('barang') di Controller
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
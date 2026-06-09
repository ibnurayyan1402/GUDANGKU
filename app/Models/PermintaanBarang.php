<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanBarang extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'jumlah_diminta', 'status'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
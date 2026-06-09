<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class Barang extends Model {
    protected $fillable = ['kode_barang', 'nama_barang', 'stok'];

    public function barangMasuk(){
        return $this->hasMany(barangMasuk::class);
    }
    public function barangKeluar() {
        return $this->hasMany(BarangKeluar::class);
    }
}

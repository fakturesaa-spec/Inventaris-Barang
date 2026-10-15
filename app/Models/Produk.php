<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        "kode_barang",
        "nama_barang",
        "kategori",
        "stok",
        "satuan",
        "harga_satuan",
        "kondisi",
    ];
}

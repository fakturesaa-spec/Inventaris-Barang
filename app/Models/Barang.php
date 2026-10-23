<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    protected $fillable = [
        'user_id',
        'kode_barang',
        'nama_barang',
        'kategori',
        'stok',
        'satuan',
        'harga_satuan',
        'kondisi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function peminjaman (){
        return $this->hasMany(Peminjaman::class, 'barang_id');
    }
}

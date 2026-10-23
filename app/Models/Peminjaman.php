<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $fillable = [
        'barang_id',
        'nama_peminjam',
        'jumlah_pinjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}

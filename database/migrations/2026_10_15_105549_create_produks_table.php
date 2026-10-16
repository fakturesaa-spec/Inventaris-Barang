<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->enum('kategori', ['Elektronik', 'ATK', 'Furniture', 'Lainnya']);
            $table->integer('stok');
            $table->enum('satuan', ['pcs', 'unit', 'box']);
            $table->decimal('harga_satuan',15, 2);
            $table->enum('kondisi', ['Baik','Rusak Ringan', 'Rusak Berat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};

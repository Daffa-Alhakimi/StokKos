<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bahan_makanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('kategori', 50);
            $table->decimal('jumlah', 10, 2)->default(0);
            $table->string('satuan', 20);
            $table->date('tanggal_kedaluwarsa')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bahan_makanan');
    }
};

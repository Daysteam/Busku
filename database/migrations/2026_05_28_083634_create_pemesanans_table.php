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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('rute_id')->constrained()->cascadeOnDelete();
            $table->integer('jumlah_tiket');
            $table->string('kode_pemesanan')->unique();
            $table->string('qr_code')->unique();
            $table->decimal('total_harga',12,2);
            $table->enum('status',['pending','dibayar','batal','selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};

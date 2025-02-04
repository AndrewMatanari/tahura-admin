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
        Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('kode_transaksi');
        $table->date('tanggal_transaksi');
        $table->integer('jumlah');
        $table->decimal('total_harga', 10, 2);
        $table->string('no_kendaraan');
        $table->string('jenis_kendaraan');
        $table->string('status');
        $table->string('metode_pembayaran');
        $table->string('qr_code')->nullable();
        $table->timestamps();
    });
    }
    
        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produksi_dryers', function (Blueprint $table) {
            $table->bigIncrements('id_produksi_dryer'); // Primary Key

            $table->date('tanggal_produksi'); // Tanggal produksi
            $table->unsignedBigInteger('id_mesin'); // FK ke tabel mesins
            $table->integer('jumlah_pekerja'); // Jumlah pekerja
            $table->text('kendala')->nullable(); // Kendala, bisa kosong

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_mesin')->references('id_mesin')->on('mesins')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_dryers');
    }
};

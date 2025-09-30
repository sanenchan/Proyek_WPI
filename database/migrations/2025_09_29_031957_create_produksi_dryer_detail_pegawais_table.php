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
        Schema::create('produksi_dryer_detail_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_produksi_dryer_pegawais'); // Primary Key

            // Foreign key
            $table->unsignedBigInteger('id_pegawai'); // FK ke tabel pegawais

            // Data kerja
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->integer('potongan_target')->default(0);
            $table->text('keterangan')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_pegawai')
                ->references('id_pegawai')
                ->on('pegawais')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_produksi_dryer');
            $table->foreign('id_produksi_dryer')->references('id_produksi_dryer')->on('produksi_dryers')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_dryer_detail_pegawais');
    }
};

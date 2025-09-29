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
        Schema::create('produksi_dryer_detail_veneers', function (Blueprint $table) {
            $table->bigIncrements('id_produksi_dryer_veneer'); // Primary Key

            // Foreign keys
            $table->unsignedBigInteger('id_produksi_dryer'); // FK ke tabel produksi_dryers
            $table->unsignedBigInteger('id_ukuran');          // FK ke tabel ukurans
            $table->unsignedBigInteger('id_jenis_kayu');      // FK ke tabel jenis_kayu
            $table->unsignedBigInteger('id_target');          // FK ke tabel targets

            // Data produksi
            $table->integer('veneer_basah_kw1')->default(0);
            $table->integer('veneer_basah_kw2')->default(0);
            $table->integer('veneer_basah_kw3')->default(0);
            $table->integer('veneer_basah_kw4')->default(0);

            $table->integer('hasil_kw1')->default(0);
            $table->integer('hasil_kw2')->default(0);
            $table->integer('hasil_kw3')->default(0);
            $table->integer('hasil_kw4')->default(0);

            $table->integer('total')->default(0);
            $table->time('jam_mulai_kerja')->nullable();
            $table->time('jam_selesai_kerja')->nullable();
            $table->decimal('kubikasi', 10, 2)->default(0);
            $table->decimal('target_kubikasi', 10, 2)->default(0);
            $table->integer('status')->default(0);
            $table->integer('potongan_target')->default(0);

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_produksi_dryer')->references('id_produksi_dryer')->on('produksi_dryers')->onDelete('restrict');
            $table->foreign('id_ukuran')->references('id_ukuran')->on('ukurans')->onDelete('restrict');
            $table->foreign('id_jenis_kayu')->references('id_jenis')->on('jenis_kayu')->onDelete('restrict');
            $table->foreign('id_target')->references('id_target')->on('targets')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_dryer_detail_veneers');
    }
};

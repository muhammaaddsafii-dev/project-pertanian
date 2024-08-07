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
        Schema::create('pertanian', function (Blueprint $table) {
            $table->id();
            $table->string('dnop')->nullable();
            $table->foreignId('desa_id')->constrained('desa')->onDelete('cascade');
            $table->foreignId('kelompok_tani_id')->constrained('kelompok_tani')->onDelete('cascade');
            $table->foreignId('erdkk_id')->constrained('erdkk')->onDelete('cascade');
            $table->foreignId('pemilik_id')->constrained('pemilik')->onDelete('cascade');
            $table->foreignId('penggarap_id')->constrained('penggarap')->onDelete('cascade');
            $table->foreignId('penyewa_id')->constrained('penyewa')->onDelete('cascade');
            $table->string('komoditas_1')->nullable();
            $table->string('komoditas_2')->nullable();
            $table->string('komoditas_3')->nullable();
            $table->string('masa_tanam_1')->nullable();
            $table->string('masa_tanam_2')->nullable();
            $table->string('masa_tanam_3')->nullable();
            $table->string('produktivitas_1')->nullable();
            $table->string('produktivitas_2')->nullable();
            $table->string('produktivitas_3')->nullable();
            $table->string('jumlah_ptk')->nullable();
            $table->string('subsidi_pupuk')->nullable();
            $table->string('alat_sistem_tanam')->nullable();
            $table->string('sumber_air')->nullable();
            $table->string('nama_daerah')->nullable();
            $table->decimal('luas', 10, 2)->nullable();
            $table->decimal('shape_leng', 20, 15)->nullable();
            $table->decimal('shape_area', 20, 15)->nullable();
            $table->geometry('geom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanian');
    }
};

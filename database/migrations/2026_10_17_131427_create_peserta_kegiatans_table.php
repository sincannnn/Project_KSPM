<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_kegiatans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kegiatan_id')
                ->constrained('kegiatans')
                ->cascadeOnDelete();

            $table->string('nama_peserta');
            $table->string('email');
            $table->string('nomor_hp')->nullable();
            $table->string('instansi')->nullable();

            $table->string('status')->default('terdaftar');
            $table->timestamp('tanggal_daftar')->nullable();

            $table->timestamps();

            $table->unique(['kegiatan_id', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_kegiatans');
    }
};
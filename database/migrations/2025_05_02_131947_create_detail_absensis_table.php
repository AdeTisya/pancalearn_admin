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
        Schema::create('detail_absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('absensi_id')->constrained('absensis')->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('siswas');
            $table->enum('status_kehadiran', ['hadir', 'izin', 'sakit', 'alpa']);
            $table->time('waktu_absen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_absensis');
    }
};

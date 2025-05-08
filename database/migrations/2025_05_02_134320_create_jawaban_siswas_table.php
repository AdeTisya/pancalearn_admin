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
        Schema::create('jawaban_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_quiz_id')->constrained('hasil_quizzes')->onDelete('cascade');
            $table->foreignId('soal_id')->constrained('soal_quizzes');
            $table->foreignId('pilihan_id')->nullable()->constrained('pilihan_jawabans')->nullOnDelete();
            $table->text('jawaban_text')->nullable()->comment('untuk esai');
            $table->string('jawaban_gambar')->nullable()->comment('path ke gambar');
            $table->float('nilai')->nullable()->comment('untuk esai dan gambar yang memerlukan penilaian manual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_siswas');
    }
};

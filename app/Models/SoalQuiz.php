<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoalQuiz extends Model
{
    use HasFactory;

    protected $table = 'soal_quizzes';

    protected $fillable = [
        'quiz_id',
        'pertanyaan',
        'jenis_soal',
        'gambar_soal',
        'bobot_nilai',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function pilihanJawaban()
    {
        return $this->hasMany(PilihanJawaban::class, 'soal_id');
    }

    public function jawabanSiswa()
    {
        return $this->hasMany(JawabanSiswa::class, 'soal_id');
    }

    public function pilihanBenar()
    {
        return $this->pilihanJawaban()->where('is_jawaban_benar', true)->first();
    }
}

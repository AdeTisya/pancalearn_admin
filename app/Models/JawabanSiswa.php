<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JawabanSiswa extends Model
{
    use HasFactory;

    protected $table = 'jawaban_siswas';

    protected $fillable = [
        'hasil_quiz_id',
        'soal_id',
        'pilihan_id',
        'jawaban_text',
        'jawaban_gambar',
        'nilai',
    ];

    public function hasilQuiz()
    {
        return $this->belongsTo(HasilQuiz::class);
    }

    public function soalQuiz()
    {
        return $this->belongsTo(SoalQuiz::class, 'soal_id');
    }

    public function pilihanJawaban()
    {
        return $this->belongsTo(PilihanJawaban::class, 'pilihan_id');
    }
}

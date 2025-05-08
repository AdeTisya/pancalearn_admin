<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PilihanJawaban extends Model
{
    use HasFactory;

    protected $table = 'pilihan_jawabans';

    protected $fillable = [
        'soal_id',
        'pilihan',
        'gambar_pilihan',
        'is_jawaban_benar',
    ];

    protected $casts = [
        'is_jawaban_benar' => 'boolean',
    ];

    public function soalQuiz()
    {
        return $this->belongsTo(SoalQuiz::class, 'soal_id');
    }

    public function jawabanSiswa()
    {
        return $this->hasMany(JawabanSiswa::class, 'pilihan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'jadwal_id',
        'judul_quiz',
        'deskripsi',
        'waktu_mulai',
        'waktu_selesai',
        'durasi',
        'status',
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    public function jadwalPelajaran()
    {
        return $this->belongsTo(JadwalPelajaran::class, 'jadwal_id');
    }

    public function soalQuiz()
    {
        return $this->hasMany(SoalQuiz::class);
    }

    public function hasilQuiz()
    {
        return $this->hasMany(HasilQuiz::class);
    }
}
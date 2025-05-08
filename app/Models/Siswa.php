<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'pengguna_id',
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'id_kelas',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id')->where('role', 'siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function detailAbsensi()
    {
        return $this->hasMany(DetailAbsensi::class);
    }

    public function hasilQuiz()
    {
        return $this->hasMany(HasilQuiz::class);
    }
}

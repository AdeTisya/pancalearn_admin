<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailAbsensi extends Model
{
    use HasFactory;

    protected $table = 'detail_absensis';

    protected $fillable = [
        'absensi_id',
        'siswa_id',
        'status_kehadiran',
        'waktu_absen',
    ];

    protected $casts = [
        'waktu_absen' => 'datetime',
    ];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

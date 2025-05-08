<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\JadwalPelajaran;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'jadwal_id',
        'tanggal',
        'waktu_buka',
        'waktu_tutup',
        'status',
    ];
    protected $casts = [
        'tanggal' => 'date',
        'waktu_buka' => 'datetime',
        'waktu_tutup' => 'datetime',
    ];

    public function jadwalPelajaran()
    {
        return $this->belongsTo(JadwalPelajaran::class, 'jadwal_id');
    }

    public function detailAbsensi()
    {
        return $this->hasMany(DetailAbsensi::class);
    }
    
    public function jumlahHadir()
    {
        return $this->detailAbsensi()->where('status_kehadiran', 'hadir')->count();
    }
    public function jumlahTidakHadir()
    {
        return $this->detailAbsensi()->whereIn('status_kehadiran', ['izin', 'sakit', 'alpa'])->count();
    }
}

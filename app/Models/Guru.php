<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pengguna_id',
        'nip',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class);
    }
}

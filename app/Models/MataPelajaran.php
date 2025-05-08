<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class mataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'guru_id',
        'kode_mapel',
        'nama_mapel',
        'deskripsi',
        
    ];

    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class, 'mapel_id');
    }
}

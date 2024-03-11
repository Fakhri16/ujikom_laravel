<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table ='siswa';
    protected $primaryKey = 'id';
    protected $fillable =
     ['nisn',
    'nama_siswa',
    'kode_kelas',
    'jenkel',
    'no_tlp',
    'alamat'
     ]
    ;

    // public function jurusan()
    // {
    //     return $this->belongsTo(Jurusan::class, 'kode_jurusan')->select(['id', 'jurusan']);
    // }

    // public function kelas()
    // {
    //     return $this->belongsTo(Kelas::class, 'kode_kelas')->select(['id', 'tingkat']);
    // }
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'siswa_id');
    }
    
}

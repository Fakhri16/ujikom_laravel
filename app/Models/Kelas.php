<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table;
    protected $fillable=
    ['tingkat',
    'kode_jurusan',
    'tipe'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'id');
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'kode_guru');
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kode_kelas');
    }
     public function getHasilattribute()  {
        return $this->tingkat. ' ' .$this->jurusan->jurusan . ' ' . $this->tipe;
     }
  
}

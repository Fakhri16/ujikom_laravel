<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    
    protected $table;
    protected $fillable=
    ['
    jurusan
    '];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kode_jurusan');
    }
}

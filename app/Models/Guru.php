<?php

namespace App\Models;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $table='guru';
    protected $primaryKey = 'id';
    protected $fillable =
    ['
    nama_guru',
    'kode_mapel'];

    public function mapel()
    {
    return $this->belongsTo(Mapel::class, 'kode_mapel', 'id');
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'guru_id');
    }
}

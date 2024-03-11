<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    
    {
   
        return new Siswa([
            'nisn' => $row['1'],
            'nama_siswa' => $row['2'],
            'kode_kelas' => $row['3'],
            'jenkel' => $row['4'],
            'no_tlp' => $row['5'],
            'alamat' => $row['6'],
        ]);
    }
}

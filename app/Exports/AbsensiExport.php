<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Http\Request;

class AbsensiExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
  
    public function collection()
    {
        // Ambil data absensi beserta relasinya dengan Guru dan Siswa
        $absensi = Absensi::with('guru', 'siswa')->orderBy('id')->get();
        
        // Mengatur ulang ID
        $absensi->transform(function ($item, $key) {
            $item->id = $key + 1;
            return $item;
        });

        return $absensi;
    }

    public function headings(): array
    {
        // Definisikan judul kolom untuk file Excel
        return [
            'ID',
            'Nama Guru',
            'Nama Siswa',
            'Kode Kelas Siswa',
            'Tanggal',
            'Status',
            'Deskripsi'
        ];
    }

    public function map($absensi): array
    {
        // Mapping data absensi beserta data Guru dan Siswa ke dalam array
        return [
            $absensi->id,
            $absensi->guru->nama_guru, // Mengambil nama guru dari relasi
            $absensi->siswa->nama_siswa, // Mengambil nama siswa dari relasi
            $absensi->siswa->kode_kelas, // Mengambil kode kelas siswa dari relasi
            $absensi->tanggal,
            $absensi->status,
            $absensi->deskripsi
        ];
    }
    
    public function collection2(Request $request)
{
    $query = Absensi::with('guru', 'siswa')->orderBy('id');

    // Cek apakah ada kriteria pencarian (contoh: kelas yang dipilih oleh pengguna)
    if ($request->has('kode_kelas') && $request->kode_kelas != '') {
        $query->whereHas('siswa', function ($query) use ($request) {
            $query->where('kode_kelas', 'like', '%' . $request->kode_kelas . '%');
        });
    }

    // Eksekusi query
    $absensi = $query->get();

    // Mengatur ulang ID
    $absensi->transform(function ($item, $key) {
        $item->id = $key + 1;
        return $item;
    });

    return $absensi;
}

}

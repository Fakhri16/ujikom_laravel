<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\AbsensiExport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with(['guru', 'siswa'])
        ->join('guru', 'absensi.guru_id', '=', 'guru.id')
        ->leftJoin('siswa', 'absensi.siswa_id', '=', 'siswa.id')
        ->select(
            'absensi.id',
            'siswa.nama_siswa',
            'guru.nama_guru',
            'siswa.kode_kelas',
            'absensi.tanggal',
            'absensi.status',
            'absensi.deskripsi'
        )
        ->get();
        $presensi = null;

    return view('absensi.index', compact('absensi', 'presensi',));
    
    }

    public function create()
    {
        $guruOptions = Guru::pluck('nama_guru', 'id'); // Mengambil opsi guru dari tabel guru
        $siswaOptions = Siswa::pluck('nama_siswa', 'id');
        $siswaKelas = Siswa::pluck('kode_kelas', 'id'); // Mengambil opsi siswa dari tabel siswa
        return view('absensi.create', compact('guruOptions', 'siswaOptions','siswaKelas'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'guru_id' => 'required|exists:guru,id',
            'tanggal' => 'required|date',
            'siswakelas' => 'required',
            'status' => 'required|in:Hadir,Izin,Alpha,Sakit',
            'deskripsi' => 'required|string',
        ]);
    
        // Lakukan pengecekan apakah data sudah ada sebelumnya
        $existingAbsensi = Absensi::where('siswa_id', $request->siswa_id)
                                    ->where('tanggal', $request->tanggal)
                                    ->exists();
    
        if ($existingAbsensi) {
            return redirect()->back()->withInput()->With('delete2', 'Data absensi berhasil disimpan.');
        }
    
        // Jika tidak ada data absensi yang sudah ada sebelumnya, simpan data baru
        Absensi::create([
            'siswa_id' => $request->siswa_id,
            'guru_id' => $request->guru_id,
            'tanggal' => $request->tanggal,
            'siswakelas' => $request->siswakelas,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);
    
        // Redirect setelah menyimpan data
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil disimpan.');
    }
    

public function edit($id)
{
    $guruOptions = Guru::pluck('nama_guru', 'id'); // Mengambil opsi guru dari tabel guru
    $siswaOptions = Siswa::pluck('nama_siswa', 'id'); // Mengambil opsi siswa dari tabel siswa
    $siswaKelas = Siswa::pluck('kode_kelas', 'id');
    
    // Fetch the data for editing
    $absensi = Absensi::findOrFail($id);

    // Pass the data to the view for editing
    return view('absensi.update', compact('absensi', 'guruOptions', 'siswaOptions', 'siswaKelas'));
}

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'guru_id' => 'required|exists:guru,id',
            'siswakelas' => 'required', // Menghapus karakter yang tidak valid setelah 'required|'
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Alpha,Sakit',
            'deskripsi' => 'required|string',
        ]);
    
        // Update the record in the database
        $absensi = Absensi::findOrFail($id);
        $absensi->siswa_id = $request->siswa_id;
        $absensi->guru_id = $request->guru_id;
        $absensi->siswakelas = $request->siswakelas;
        $absensi->tanggal = $request->tanggal;
        $absensi->status = $request->status;
        $absensi->deskripsi = $request->deskripsi;
        $absensi->save();
    
        // Redirect with success message if the update is successful
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui.');
    }
    

public function delete($id)
{
    // Gunakan Query Builder atau Eloquent untuk menghapus data absensi
    DB::table('absensi')->where('id', $id)->delete();
    return redirect()->route('absensi.index')->with('delete', 'Delete absensi berhasil dihapus!');
}public function collection2(Request $request)
{
    // Ambil query pencarian kelas
    $kelas = $request->input('kode_kelas');
    $guruOptions = Guru::pluck('nama_guru', 'id'); // Mengambil opsi guru dari tabel guru
    $siswaOptions = Siswa::pluck('nama_siswa', 'id'); // Mengambil opsi siswa dari tabel siswa
    $siswaKelas = Siswa::pluck('kode_kelas', 'id');
    
    // Ambil data absensi beserta relasinya dengan Guru dan Siswa
    $query = Absensi::with('guru', 'siswa')->orderBy('id');

    // Cek apakah ada kriteria pencarian kelas
    if ($kelas) {
        $query->whereHas('siswa', function ($query) use ($kelas) {
            $query->where('kode_kelas', $kelas);
        });
    }

    // Ambil koleksi data absensi tanpa menjalankan get()
    $presensi = $query->get();
    
    // Kembalikan view dengan data absensi yang sudah difilter
    return view('absensi.index', compact('presensi', 'kelas', 'guruOptions', 'siswaOptions', 'siswaKelas'));
}

public function export_excel()
{
  return (new AbsensiExport)->download('LAPORAN PRESENSI SMK CITRA NEGARA.xlsx');
}
// public function export_excel2(Request $request)
// {
//     // Panggil fungsi collection2 dengan parameter sesuai kriteria pencarian
//     $absensi = $this->collection2($request);

//     // Membuat instansi AbsensiExport
//     $export = new AbsensiExport();

//     // Set data untuk diekspor
//     $export->setData($absensi);

//     // Ekspor data absensi ke file Excel
//     return $export->download('sesuaikelas.xlsx');
// }


}

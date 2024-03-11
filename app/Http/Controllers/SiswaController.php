<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Absensi;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
// use illuminate\Routing\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class SiswaController extends Controller
{
    public function index()
    {
   
        $siswa = DB::table('siswa')->get();
       
        return view('siswa.index',['siswa'=>$siswa]);
    }

    public function create()
    {
        // $jurusan = DB::table('jurusan')->select()->get();
        // $kelas = DB::table('kelas')->select()->get();
        return view('siswa.create');
        
    }
    public function store(Request $request){
        // Validasi input
        $validatedData = $request->validate([
            'nisn' => 'required|numeric|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:255',
            'kode_kelas' => 'required|string',
            'jenkel' => 'required|in:laki-laki,perempuan',
            'no_tlp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);
    
        // Jika validasi gagal, kembalikan pengguna ke formulir dengan pesan kesalahan
        // Jika sukses, data akan disimpan
        DB::table('siswa')->insert([
            'nisn' => $validatedData['nisn'],
            'nama_siswa' => $validatedData['nama_siswa'],
            'kode_kelas' => $validatedData['kode_kelas'],
            'jenkel' => $validatedData['jenkel'],
            'no_tlp' => $validatedData['no_tlp'],
            'alamat' => $validatedData['alamat'],
            'created_at' => now()
        ]);
    
        return redirect('/siswa')->with('success', 'Data Siswa Berhasil ditambahkan');
    }

    public function edit($id){
        $siswa = DB::table('siswa')->where('id',$id)->first();
        // $jurusan = DB::table('jurusan')->select()->where('id','!=', $siswa->kode_jurusan)->get();
        // $kelas = DB::table('kelas')->select()->where('id','!=', $siswa->kode_kelas)->get();
        return view('siswa.update',['siswa'=>$siswa]);
    }
    public function update(Request $request){
        $validatedData = $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'kode_kelas' => 'required',
            'jenkel' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);
    
        DB::table('siswa')->where('id', $request->id)->update([
            'nisn' => $validatedData['nisn'],
            'nama_siswa' => $validatedData['nama_siswa'],
            'kode_kelas' => $validatedData['kode_kelas'],
            'jenkel' => $validatedData['jenkel'],
            'no_tlp' => $validatedData['no_tlp'],
            'alamat' => $validatedData['alamat']
        ]);
    
        return redirect('/siswa')->with('update', 'Data siswa berhasil ditambahkan!');
    }
    
    public function delete($id){
        // Mulai transaksi database
        DB::beginTransaction();
    
        try {
            // Hapus absensi terkait dengan siswa
            Absensi::where('siswa_id', $id)->delete();
    
            // Hapus siswa
            DB::table('siswa')->where('id', $id)->delete();
    
            // Commit transaksi jika berhasil
            DB::commit();

            // Redirect dengan pesan sukses
            return redirect('/siswa')->with('success2', 'Data siswa berhasil dihapus!');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
    
            // Redirect dengan pesan error
            return redirect('/siswa')->with('error', 'Gagal menghapus data siswa: ' . $e->getMessage());
        }
    }
   
    public function import_excel(Request $request) 
    {
        // Periksa apakah file ada
        if (!$request->hasFile('file')) {
            return redirect('/siswa')->with('error', 'File tidak ditemukan.');
        }
    
        // Periksa apakah file memiliki ekstensi yang valid
        $allowedExtensions = ['csv', 'xls', 'xlsx'];
        $fileExtension = $request->file('file')->getClientOriginalExtension();
        if (!in_array($fileExtension, $allowedExtensions)) {
            return redirect('/siswa')->with('error', 'Ekstensi file tidak valid. Hanya file dengan ekstensi csv, xls, atau xlsx yang diperbolehkan.');
        }
        
        // Jika semua validasi berhasil, lanjutkan proses import
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_siswa', $nama_file);
        (new SiswaImport)->import(public_path('/file_siswa/' . $nama_file));
    
        // Redirect dengan pesan sukses
        return redirect('/siswa')->with('update', 'Data siswa berhasil ditambahkan!');
    }
    
}

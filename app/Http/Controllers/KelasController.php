<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['jurusan', 'guru'])
        ->join('jurusan', 'kelas.kode_jurusan', '=', 'jurusan.id')
        ->leftJoin('guru', 'kelas.kode_guru', '=', 'guru.id')
        ->select('kelas.id', 'kelas.tingkat', 'jurusan.jurusan', 'kelas.tipe', 'guru.nama_guru')
        ->get();
        return view('kelas.index',['kelas'=>$kelas]);
    }

    public function create(){

        $jurusan = DB::table('jurusan')->select()->get();
        $guru = DB::table('guru')->select()->get();
        return view('kelas.create',['jurusan'=>$jurusan,'guru'=>$guru]);
    }

    public function store(Request $data) {
        $validatedData = $data->validate([
            'tingkat' => 'required|integer|min:1',
            'kode_jurusan' => 'required|exists:jurusan,id',
            'tipe' => 'required|string|max:255',
            'kode_guru' => 'nullable|exists:guru,id',
        ]);

        DB::table('kelas')->insert([
            'tingkat' => $validatedData['tingkat'],
            'kode_jurusan' => $validatedData['kode_jurusan'],
            'tipe' => $validatedData['tipe'],
            'kode_guru' => $validatedData['kode_guru'],
        ]);

        return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan!');
    }

        public function edit($id){
            
            $kelas = DB::table('kelas')->where('id',$id)->first();
            $jurusan = DB::table('jurusan')->select()->where('id','!=', $kelas->kode_jurusan)->get();
            $guru = DB::table('guru')->select()->where('id','!=', $kelas->kode_guru)->get();
            return view('kelas.update',['kelas'=>$kelas,'jurusan'=>$jurusan,'guru'=>$guru]);
            }
            public function update(Request $request)
            {
                $validatedData = $request->validate([
                    'tingkat' => 'required|integer|min:1',
                    'kode_jurusan' => 'required|exists:jurusan,id',
                    'tipe' => 'required|string|max:255',
                    'kode_guru' => 'nullable|exists:guru,id',
                ]);
            
                DB::table('kelas')->where('id', $request->id)->update([
                    'tingkat' => $validatedData['tingkat'],
                    'kode_jurusan' => $validatedData['kode_jurusan'],
                    'tipe' => $validatedData['tipe'],
                    'kode_guru' => $validatedData['kode_guru'],
                ]);
            
                return redirect('/kelas')->with('update', 'Data Kelas berhasil ditambahkan!');
            }
            

        public function delete($id){
            DB::table('kelas')->where('id',$id)->delete();
            return redirect('/kelas')->with('delete', 'Delete kelas berhasil di hapus!');
        }
}   

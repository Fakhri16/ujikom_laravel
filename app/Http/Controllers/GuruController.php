<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('mapel')
        ->join('mapel', 'guru.kode_mapel', '=', 'mapel.id')
        ->select('guru.id', 'guru.nama_guru', 'mapel.nama_mapel')
        ->get();
        return view('guru.index',['guru'=>$guru]);
    }
    public function index2()
    {
        $guru = Guru::with('mapel')
        ->join('mapel', 'guru.kode_mapel', '=', 'mapel.id')
        ->select('guru.id', 'guru.nama_guru', 'mapel.nama_mapel')
        ->get();
        return view('guru.tampildata',['guru'=>$guru]);
    }

    public function create()
    {
        $mapel = DB::table('mapel')->select()->get();
        return view('guru.create',['mapel'=>$mapel]);
    }

    public function store(Request $data)
    {
        $validator = Validator::make($data->all(), [
            'nama_guru' => 'required|string|max:255',
            'kode_mapel' => 'required|integer'
        ]);
    
        if ($validator->fails()) {
            return redirect('/guru/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        DB::table('guru')->insert([
            'nama_guru' => $data->nama_guru,
            'kode_mapel' => $data->kode_mapel
        ]);
    
        return redirect('/guru')->with('success', 'Data guru berhasil ditambahkan!');
    }
    
    public function edit($id){
    

        $guru = DB::table('guru')->where('id',$id)->first();
        $mapel = DB::table('mapel')->select()->where('id','!=', $guru->kode_mapel)->get();
        return view('guru.update',['guru'=>$guru,'mapel'=>$mapel]);
        }

        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'nama_guru' => 'required|string|max:255',
                'kode_mapel' => 'required|integer|exists:mapel,id' // Pastikan nama kolom 'id' di tabel mapel sudah benar
            ]);
        
            if ($validator->fails()) {
                return redirect('/guru/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
            }
        
            DB::table('guru')->where('id', $id)->update([
                'nama_guru' => $request->nama_guru,
                'kode_mapel' => $request->kode_mapel
            ]);
        
            return redirect('/guru')->with('update', 'Data guru berhasil diperbarui!');
        }
        
        public function delete($id){
            DB::table('guru')->where('id', $id)->delete();
            return redirect('/guru')->with('delete', 'Data Guru berhasil dihapus!');
        }
        
}
    


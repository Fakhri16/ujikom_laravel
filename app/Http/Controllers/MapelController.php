<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index()
    {
       
        $mapel = DB::table('mapel')->get();
       
        return view('mapel.index', ['mapel' => $mapel]);
    }

    public function create()
    {
        return view('mapel.create');
    }
    
    public function store(Request $data)
    {
        // Validation rules
        $validatedData = $data->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);

        DB::table('mapel')->insert([
            'nama_mapel' => $validatedData['nama_mapel']
        ]);

        return redirect('/mapel')->with('success', 'Data Mata pelajaran berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $mapel = DB::table('mapel')->where('id',$id)->get();

        return view('mapel.update',['mapel' => $mapel]);
    }

    public function update(Request $request){
        // Validasi data
        $validatedData = $request->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);
    
        // Lakukan pembaruan data jika validasi berhasil
        DB::table('mapel')->where('id', $request->id)->update([
            'nama_mapel' => $validatedData['nama_mapel']
        ]);
    
        // Redirect kembali ke halaman mapel jika pembaruan berhasil
        return redirect('/mapel')->with('update', 'Data Mata Pelajaran berhasil diperbarui!');
    }
    
    public function delete($id)
    {
        DB::table('mapel')->where('id',$id)->delete();

        return redirect('/mapel')->with('delete', 'Delete Mata Pelajaran berhasil ditambahkan!');
    }
    public function index2()
    {
       
        $mapel = DB::table('mapel')->get();
       
        return view('mapel.tampildata', ['mapel' => $mapel]);
    }
}

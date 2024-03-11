<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $role = DB::table('role')->get();
        return view('role.index',['role' => $role]);
    }
    public function create()
    {
        return view('penting.role');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_role' => 'required|string|max:255', // Contoh aturan validasi
        ]);
    
        // Jika validasi gagal, pengguna akan dialihkan kembali ke halaman sebelumnya
        // dengan pesan kesalahan, jika sukses, data akan disimpan
        DB::table('role')->insert([
            'nama_role' => $request->nama_role,
        ]);
    
        return redirect()->route('roley')->with('success', 'Data role berhasil ditambahkan!');
    }
    public function edit($id){
    $role = DB::table('role')->where('id',$id)->get();

    return view('role.update',['role'=>$role]);
    }

    public function update(Request $request){
        DB::table('role')->where('id',$request->id)->update([
            'nama_role' => $request->nama_role
        ]);

        return redirect('/role2')->with('update','Data Role sudah di tambahkan');
    }

    public function delete($id){
        DB::table('role')->where('id',$id)->delete();

        return redirect('/role2')->with('delete', 'Delete Mata Pelajaran berhasil ditambahkan!');
    }
}

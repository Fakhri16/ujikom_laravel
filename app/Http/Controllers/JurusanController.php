<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index(){
        $jurusan = DB::table('jurusan')->get();
        return view('jurusan.index',['jurusan'=>$jurusan]);
        
        }
        public function index2(){
            $jurusan = DB::table('jurusan')->get();
            return view('jurusan.tampildata',['jurusan'=>$jurusan]);
            
            }
        public function create()
        {
            return view('jurusan.create');
        }
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'jurusan' => 'required|string|max:255'
            ], [
                'jurusan.required' => 'Nama jurusan tidak boleh kosong.',
                'jurusan.string' => 'Nama jurusan harus berupa teks.',
                'jurusan.max' => 'Nama jurusan tidak boleh melebihi 255 karakter.'
            ]);
    
            if ($validator->fails()) {
                return redirect('/jurusan/create')
                            ->withErrors($validator)
                            ->withInput();
            }
    
            DB::table('jurusan')->insert([
                'jurusan' => $request->jurusan
            ]);
    
            return redirect('/jurusan')->with('success', 'Data Jurusan berhasil ditambahkan!');
        }
        public function edit($id){
    
        $jurusan = DB::table('jurusan')->where('id',$id)->get();
        
        return view('jurusan.update',['jurusan'=>$jurusan]);
        }
    
        public function update(Request $request){
            // Validasi data
            $validator = Validator::make($request->all(), [
                'jurusan' => 'required|string|max:255',
            ]);
        
            // Jika validasi gagal, kembalikan dengan pesan error
            if ($validator->fails()) {
                return redirect('/jurusan')->withErrors($validator)->withInput();
            }
        
            // Lakukan pembaruan data jika validasi berhasil
            DB::table('jurusan')->where('id', $request->id)->update([
                'jurusan' => $request->jurusan
            ]);
        
            // Redirect kembali ke halaman jurusan dengan pesan sukses
            return redirect('/jurusan')->with('update', 'Data Jurusan berhasil diperbarui!');
        }
    
        public function delete($id){
            DB::table('jurusan')->where('id',$id)->delete();
            return redirect('/jurusan')->with('delete', 'Delete Jurusan berhasil di hapus!');
        }
}

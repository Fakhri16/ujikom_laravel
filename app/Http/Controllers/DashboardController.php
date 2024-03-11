<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {   
        $mapel = DB::table('mapel')->count();
        $guru = DB::table('guru')->count();
        $jurusan = DB::table('jurusan')->count();
        $absensi = DB::table('absensi')->count();
        return view('welcome2',['jurusan'=>$jurusan,'mapel'=>$mapel , 'guru'=>$guru ,'absensi'=>$absensi]);

    }
    
}

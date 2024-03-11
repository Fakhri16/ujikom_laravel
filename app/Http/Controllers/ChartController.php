<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function barChart()
    {
        // Ambil data absensi dari AbsensiController@index
        $absensiController = new AbsensiController();
        $absensiData = $absensiController->index();
    
        // Inisialisasi array untuk menyimpan jumlah absensi per tanggal
        $jumlahAbsensiPerTanggal = [];
    
        // Proses data absensi
        foreach ($absensiData as $absensi) {
            // Ambil tanggal absensi
            $tanggal = $absensi->tanggal;
    
            // Tingkatkan jumlah absensi pada tanggal yang sesuai
            if (!isset($jumlahAbsensiPerTanggal[$tanggal])) {
                $jumlahAbsensiPerTanggal[$tanggal] = 1;
            } else {
                $jumlahAbsensiPerTanggal[$tanggal]++;
            }
        }
    
        // Sorting berdasarkan tanggal
        ksort($jumlahAbsensiPerTanggal);
    
        // Konversi array jumlah absensi per tanggal ke format yang sesuai untuk grafik
        $labels = [];
        $data = [];
    
        foreach ($jumlahAbsensiPerTanggal as $tanggal => $jumlah) {
            $labels[] = $tanggal;
            $data[] = $jumlah;
        }
    
        // Kirim data yang sudah diolah ke tampilan
        return view('chart', compact('labels', 'data'));
    }
}

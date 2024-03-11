<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('penting.login');
});
// Route::get('/r', function () {
//     return view('penting.register');
// });

// login



Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenicate']);


// logout
Route::get('/logut',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
// role
Route::get('/role2',[Rolecontroller::class,'index'])->name('roley');
Route::get('/role', [RoleController::class, 'create'])->name('role');
Route::post('/role/store', [RoleController::class, 'store']);
Route::get('/role/edit/{id}',[RoleController::class,'edit']);
Route::put('/role/update/{id}',[RoleController::class,'update']);
Route::delete('/role/hapus/{id}',[RoleController::class,'delete']);

// Route::get('/role',[MapelController::class,'index'])->name('mapel');
Route::get('/awalview', function () {
    return view('welcome2');
})->name('dashboard');
// chart
route::get('/chart',[ChartController::class,'barChart']);


// dashboard
Route::get('/welcome',[DashboardController::class,'index'])->name('dashboard');

// mapel
Route::get('/mapel',[MapelController::class,'index'])->name('mapel');
Route::get('/mapel2',[MapelController::class,'index2'])->name('tampilym');
Route::get('/mapel/create',[MapelController::class,'create'])->name('createmapel');
Route::post('/mapel/store',[MapelController::class,'store']);
Route::get('/mapel/edit/{id}',[MapelController::class,'edit']);
Route::put('/mapel/update/{id}',[MapelController::class,'update']);
Route::delete('/mapel/hapus/{id}',[MapelController::class,'delete']);


// Jurusan
Route::get('/jurusan',[JurusanController::class,'index'])->name('jurusan');
Route::get('/jurusan2',[JurusanController::class,'index2'])->name('tampilj');
Route::get('/jurusan/create',[JurusanController::class,'create'])->name('createjurusan');
Route::post('/jurusan/store',[JurusanController::class,'store']);
Route::get('/jurusan/edit/{id}',[JurusanController::class,'edit']);
Route::put('/jurusan/update/{id}',[JurusanController::class,'update']);
Route::delete('/jurusan/hapus/{id}',[JurusanController::class,'delete']);

// Guru
Route::get('/guru',[GuruController::class,'index'])->name('guru');
Route::get('/guru2',[GuruController::class,'index2'])->name('tampilg');
Route::get('/guru/create',[GuruController::class,'create'])->name('createguru');
Route::post('/guru/store',[GuruController::class,'store']);
Route::get('/guru/edit/{id}',[GuruController::class,'edit']);
Route::put('/guru/update/{id}',[GuruController::class,'update']);
Route::delete('/guru/hapus/{id}',[GuruController::class,'delete']);

// kelas
Route::get('/kelas',[KelasController::class,'index'])->name('kelas');
Route::get('/kelas/create',[KelasController::class,'create'])->name('createkelas');
Route::post('/kelas/store',[KelasController::class,'store']);
Route::get('/kelas/edit/{id}',[KelasController::class,'edit']);
Route::put('/kelas/update/{id}',[KelasController::class,'update']);
Route::delete('/kelas/hapus/{id}',[KelasController::class,'delete']);

// siswa
Route::get('/siswa',[SiswaController::class,'index'])->name('siswa');
Route::get('/siswa/create',[SiswaController::class,'create'])->name('createsiswa');
Route::post('/siswa/store',[SiswaController::class,'store']);
Route::get('/siswa/edit/{id}',[SiswaController::class,'edit'])->name('editsiswa');
Route::put('/siswa/update/{id}',[SiswaController::class,'update']);
Route::delete('/siswa/hapus/{id}',[SiswaController::class,'delete']);
Route::post('/siswa/import',[SiswaController::class,'import_excel'])->name('importexcel');

// Absensi 
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/create',[AbsensiController::class,'create'])->name('absensi');
Route::post('/absensi/store',[AbsensiController::class,'store']);
Route::get('/absensi/edit/{id}',[AbsensiController::class,'edit'])->name('editabsensi');
Route::put('/absensi/update/{id}',[AbsensiController::class,'update']);
Route::delete('/absensi/hapus/{id}',[AbsensiController::class,'delete']);
Route::get('/search',[AbsensiController::class,'collection2'])->name('search');
Route::get('/absensi/export_excel',[AbsensiController::class,'export_excel'])->name('exporexcel');


// Register
Route::get('/register',[RegisterController::class,'index'])->name('register.tampil');
// Route::post('/register',[RegisterController::class,'store']);

// register
Route::get('/register/create',[UserController::class,'create'])->name('register');
Route::post('/register/store',[UserController::class,'store']);
Route::get('/register', [UserController::class, 'index'])->name('register.index');
Route::get('/register/edit/{id}',[UserController::class,'edit'])->name('editabsensi');
Route::put('/register/update/{id}',[UserController::class,'update'])->name('register.update');
Route::delete('/register/delete/{id}',[UserController::class,'delete']);

});
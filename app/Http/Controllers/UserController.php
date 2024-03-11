<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;  
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    // Menggunakan Query Builder untuk mengambil data user bersama rolenya
    $user = User::with(['roles'])->get();
    // Mengirimkan data ke view
    return view('register.index', ['users' => $user]);
    }    
    public function create()
{
    // Mengambil data role menggunakan Query Builder
    $role = DB::table('role')->get();

    // Mengambil data guru menggunakan Query Builder
    $dataGuru = DB::table('guru')->get();

    // Mengirimkan data ke view
    return view('register.create', ['dataGuru' => $dataGuru, 'role' => $role]);
}


public function store(Request $request)
{
  
  
            // Mengecek apakah guru yang di daftarkan itu ada data nya di table guru
            $guru = Guru::where('id', $request->guru_id)->first();

            // Pengecekan bila tidak ada
            if (!$guru) {

                return redirect()->route('user')->with('warning', 'Data Guru Tidak tersedia');
            }

            $guruId = $guru->id;
            $guruName = $guru->nama_guru;
            $email = $request->email;
            $password = Hash::make($request->password);
            
            $createUser = DB::table('users')->insertGetId([
                'guru_id' => $guruId,
                'name' => $guruName,
                'email' => $email,
                'password' => $password
            ]);
            
            $createUser = DB::table('users')->where('id', $createUser)->first();
            // Menambahkan/register user baru

           
    
// Membuat role user yang di pilih
$roles = $request->role;
foreach ($roles as $role) {
    $createRoleUser = DB::table('role_user')->insert([
        'user_id' => $createUser->id,
        'role_id' => $role
    ]);
}

// Melakukan pengecekan manambah dan membuat role untuk user nya harus berhasil semua
if ($createUser && isset($createRoleUser) && $createRoleUser) {
    // Berhasil membuat user dan role
    // toast('Berhasil membuat user', 'success');
}  

// Menambahkan role user
foreach ($roles as $role) {
    DB::table('role_user')->insert([
        'user_id' => $createUser->id,
        'role_id' => $role
    ]);
}
    return redirect()->route('register.index')->with('success', 'Data register berhasil ditambahkan!');
}
public function edit(User $user)
{
   // Mengambil data role menggunakan Query Builder
   $role = DB::table('role')->get();

   // Mengambil data guru menggunakan Query Builder
   $dataGuru = DB::table('guru')->get();

    return view('register.update', compact('user', 'role', 'dataGuru'));
}
public function update(Request $request, User $user)
{
    $request->validate([
        'guru_id' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|min:6', // Ubah menjadi nullable agar tidak selalu wajib diisi saat update
        'roles' => 'required|array',
    ]);

    // Ambil data dari request
    $userData = [
        'guru_id' => $request->guru_id,
        'name' => $request->name,
        'email' => $request->email,
    ];

    // Jika password diisi, maka tambahkan ke data untuk diupdate
    if ($request->has('password')) {
        $userData['password'] = Hash::make($request->password);
    }

    // Update data pengguna
    $user->updateData($userData);

    return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diperbarui!');
}
// public function delete(User $user)
// {
//     $user->deleteData();

//     return redirect()->route('user.index')->with('success', 'Data pengguna berhasil dihapus!');
// }

// }
// public function edit(User $user)
// {

//     $roles = Role::all();
//     $dataGuru = Guru::where('id', '!=', $user->guru_id)->get();

//     return view('Dashboard.User.edit', ['dataGuru' => $dataGuru, 'roles' => $roles, 'user' => $user]);
// }

// public function update(User $user, UserPutRequest $request)
// {

//     try {

//         $guru = Guru::where('id', $user->guru_id)->first();

//         if (!$guru) {

//             // toast('Guru tidak tersedia', 'warning');
//             return redirect()->route('user');
//         }

//         // Menghapus data lama lalu membuat yang baru
//         $deleteOldRoleUser =  RoleUser::where('user_id', $user->id)->delete();

//         $updateUser = $user->update([
//             'guru_id' => $guru->id,
//             'username' => $guru->nama,
//             'email' => $request->validated('email'),
//             'password' => Hash::make($request->validated('password'))
//         ]);

//         $updateNewRoleUser = null;
//         foreach ($request->validated('roles') as $role) {
//             $updateNewRoleUser = DB::table('role_user')->insert([
//                 'user_id' => $user->id,
//                 'role_id' => $role
//             ]);
//         }

//         if ($updateUser && $updateNewRoleUser) {

//             // toast('Berhasil mengupdate user', 'success');
//         }
//     } catch (\Throwable $th) {

//         // Jika terjadi kesalahan/error akan membuat sebuah pesan Log kesalahan nya
//         // toast("Terjadi kesalahan", 'error');
//         Log::error("Error Update User: " . $th->getMessage());
//     }

//     return redirect()->route('user');
// }

public function delete(User $user)
{
    try {
        // Memeriksa apakah pengguna yang masuk memiliki izin yang tepat
        if (Auth::user()->id === $user->id) {
            return redirect()->route('register.index')->with('warning', 'Anda tidak dapat menghapus akun Anda sendiri');
        }
        // Menghapus entri dari tabel 'role_user' terlebih dahulu
        RoleUser::where('user_id', $user->id)->delete();

        // Menghapus pengguna itu sendiri
        $user->delete();

        // Memberikan respons berhasil
        return redirect()->route('register.index')->with('success', 'Data pengguna berhasil dihapus!');
    } catch (\Throwable $th) {
        // Mencatat kesalahan ke log
        Log::error("Error Delete User: " . $th->getMessage());
        // Memberikan respons gagal
        return redirect()->route('register.index')->with('error', 'Terjadi kesalahan saat menghapus pengguna');
    }
}

}
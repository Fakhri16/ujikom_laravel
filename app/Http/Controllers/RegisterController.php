<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
 
    $users = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('role', 'role_user.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.name as role_name')
        ->get();

    // Mengirimkan data ke view
    return view('register.index', ['users' => $users]);
    }
        public function create()
        {
            $roles = DB::table('role')->get();

           $dataGuru = DB::table('guru')->get();

            return view('register.create',['dataGuru' => $dataGuru, 'roles' => $roles]);
        }

        public function store(Request $data)
        {
        DB::table('users')->insert([
            'name' => $data->name,
            'email' => $data->email,
            'guru_id'=> $data->guru_id,
            'password' => Hash::make($data->password)
        ]);
    
        return redirect()->route('register')->with('success', 'Data register berhasil ditambahkan!');
        }
}

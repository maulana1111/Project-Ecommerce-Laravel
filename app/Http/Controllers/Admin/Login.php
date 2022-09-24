<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function index()
    {
        return view('layouts.login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $admin = DB::table('admin')->where('username', $username)->first();
        $count = DB::table('admin')->where('username', $username)->get()->count();

        if($count > 0){
            if(Hash::check($password, $admin->password)){

                session([
                    'admin_id' => $admin->id,
                    'admin_name' => $admin->name,
                    'admin_title' => $admin->title,
                    'admin_logged_in' => TRUE
                ]);

                return redirect('/Admin/Home')->with('success', 'Berhasil Login');

            }else{
                return redirect('/Admin/Login')->with('failed', 'Password Salah');
            }
        }else{
            return redirect('/Admin/Login')->with('failed', 'username Salah');
        }
        
    }

    public function logout()
    {
        session()->forget([
            'admin_id', 'admin_name', 'admin_title', 'admin_logged_in'
        ]);
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}

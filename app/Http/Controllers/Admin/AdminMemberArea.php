<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\memberArea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminMemberArea extends Controller
{
    public function index()
    {
        $data = memberArea::all();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.member_area', compact('data'));
    }

    public function deleteMember($name)
    {
        memberArea::where('member_name', $name)->delete();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return redirect('/Admin/memberArea')->with('success', 'Admin Berhasil Dihapus');
    }

    public function updateMember($name)
    {
        $data = memberArea::where('member_name', $name)->first();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.memberArea.memberAreaUpdate', compact('data'));
    }

    public function doUpdateMember(Request $request)
    {
        $this->validate($request, [
            'member_name' =>'required',
            'email'=> 'required',
            'telpon'=> 'required',
            'shipping_address'=> 'required',
            'username'=> 'required',
            'password' => 'required|min:5',
            'retype_password' => 'required_with:password|same:password|min:5'
        ]);

        memberArea::where('id',$request->id)->update([
            'member_name' => $request->member_name,
            'email' => $request->email,
            'telp' => $request->telpon,
            'shipping_address' => $request->shipping_address,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/Admin/memberArea')->with('success', 'Berhasil Meng-Update Member');

    }
    
    public function addMember()
    {
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.memberArea.memberAreaAdd');
    }

    public function insertMember(Request $request)
    {
        $this->validate($request, [
            'member_name' =>'required',
            'email'=> 'required',
            'telpon'=> 'required',
            'shipping_address'=> 'required',
            'username'=> 'required',
            'password' => 'required|min:5',
            'retype_password' => 'required_with:password|same:password|min:5'
        ]);

        memberArea::insert([
            'member_name' => $request->member_name,
            'email' => $request->email,
            'telp' => $request->telpon,
            'shipping_address' => $request->shipping_address,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/Admin/memberArea')->with('success', 'Berhasil Menambahkan Member');

    }
}
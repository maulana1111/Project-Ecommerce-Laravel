<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\model\Color;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminColor extends Controller
{
    public function index()
    {
        $data = Color::all();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.color.color', compact('data'));
    }

    public function delete($color_name)
    {
        Color::where('color_name', $color_name)->delete();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return redirect('/Admin/Product/Color')->with('success', 'Berhasil Menghapus Color');
    }

    public function add()
    {
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.color.addColor');
    }

    public function doInsert(Request $request)
    {
        Color::insert([
            'color_name' => $request->color_name,
        ]);

        return redirect('/Admin/Product/Color')->with('success', 'Berhasil Menambah Color');

    }

    public function update($color_name)
    {
        $data = Color::where('color_name', $color_name)->first();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.color.colorUpdate', compact('data'));
    }

    public function doUpdate(Request $request)
    {
        Color::where('id', $request->id)->update([
            'color_name' => $request->color_name,
        ]);
        // dd($request->color_name);

        return redirect('/Admin/Product/Color')->with('success', 'Berhasil Merubah Color');
    }
}

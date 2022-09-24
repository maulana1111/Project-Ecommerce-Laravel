<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\model\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services;

class AdminCategory extends Controller
{
    public function index()
    {
        $data = Category::all();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.category.category', compact('data'));
    }

    public function delete($slug)
    {
        Category::where('slug', $slug)->delete();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return redirect('/Admin/Product/Category')->with('success', 'Berhasil Menghapus Category');
    }

    public function add()
    {
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.category.addCategory');
    }

    public function doInsert(Request $request)
    {
        $category = $request->category_name;
        $text = str_slug($category, '-');

        Category::insert([
            'category_name' => $category,
            'slug' => $text
        ]);

        return redirect('/Admin/Product/Category')->with('success', 'Berhasil Menambah Category');

    }

    public function update($slug)
    {
        $data = Category::where('slug', $slug)->first();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.category.categoryUpdate', compact('data'));
    }

    public function doUpdate(Request $request)
    {
        $text = str_slug($request->category_name, '-');
        $d=Category::where('id', $request->id)->update([
            'category_name' => $request->category_name,
            'slug' => $text
        ]);
        // dd($d);

        return redirect('/Admin/Product/Category')->with('success', 'Berhasil Merubah Category');
    }
}

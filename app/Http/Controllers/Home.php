<?php

namespace App\Http\Controllers;
use App\model\Product;
use App\model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Home extends Controller
{

    public function index()
    {
        $data = Product::get();
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.home', compact('data'));
    }

    public function detail($slug)
    {
        $data = Product::where('slug', $slug)->get();
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.detail', compact('data'));
    }

    public function SelectByCategory($slug)
    {
        $data = DB::table('product')->select('product.*')
                                    ->join('category', 'product.category_id', '=', 'category.id')
                                    ->where('category.slug', $slug)
                                    ->get();
        // dd($data);
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.category', compact('data'));
    }

    public function search(Request $request)
    {
        $name_product = $request->product;

        $data = Product::where('product_name', 'like', '%' . $name_product . '%')->get();
        // dd($data);
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.search', compact('data'));
    }

}

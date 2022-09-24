<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\model\Product;
use App\model\Category;
use App\model\Color;

class AdminProduct extends Controller
{
    public function index()
    {
        $data = DB::table('product')->select('product.*', 'category.category_name')
                                    ->join('category', 'product.category_id', '=', 'category.id')
                                    ->get();
        // dd($data);
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.product.index', compact('data'));
    }

    public function add()
    {
        $color = Color::all();
        $category = Category::all();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.product.addProduct', compact('color', 'category'));
    }

    public function doAdd(Request $request)
    {
        $now = \Carbon\Carbon::now();
        
        // if($request->hasFile('foto')){     
        // $file = $request->foto;
        // $extension = $file->getClientOriginalExtension(); //get extennsion
        // $filename = time().'.'.$extension;
        // $file->move('/uploads/products/', $filename); //tempat file
        // dd($filename);
        // }else{
        //     echo "null";
        // }

        if($request->hasFile('foto')){     
            //for upload foto
            $file = $request->foto;
            $extension = $file->getClientOriginalExtension(); //get extennsion
            $filename = time().'.'.$extension;
            $file->move('uploads/products/', $filename); //tempat file
            
            Product::insert([
                'category_id' => $request->category,
                'product_name' => $request->product_name,
                'slug' => str_slug($request->product_name, '-'),
                'price' => $request->price,
                'description' => $request->description,
                'thumbnail' => $filename,
                'weight' => $request->weight,
                'datetime' => $now
            ]);

            $last_id = DB::getPdo()->lastInsertId();

            foreach($request->color as $items){
                DB::table('product_color')->insert([
                    'product_id' => $last_id,
                    'color_id' => $items
                ]);
            }

        }else{
            Product::insert([
                'category_id' => $request->category,
                'product_name' => $request->product_name,
                'slug' => str_slug($request->product_name, '-'),
                'price' => $request->price,
                'description' => $request->description,
                'thumbnail' => '',
                'weight' => $request->weight,
                'datetime' => $now
            ]);

            $last_id = DB::getPdo()->lastInsertId();

            foreach($request->color as $items){
                DB::table('product_color')->insert([
                    'product_id' => $last_id,
                    'color_id' => $items
                ]);
            }
        }

        return redirect('/Admin/Product')->with('success', 'Product Berhasil Ditambah');

    }

    public function delete($slug)
    {
        $get = Product::where('slug', $slug)->first();
        // dd($get);
        DB::table('product_color')->where('product_id', $get->id)->delete();
        Product::where('slug', $slug)->delete();        
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return redirect('/Admin/Product')->with('success', 'Product Berhasil Dihapus');
    }

    public function update($slug)
    {
        $product = DB::table('product')->select('product.*', 'category.category_name')
                                       ->where('product.slug', $slug)
                                       ->join('category', 'product.category_id', '=', 'category.id')
                                       ->first();
                                   
        $color = Color::all();
        $category = Category::all();                       

        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.product.updateProduct', compact('product','color', 'category'));
        
    }

    public function doUpdate(Request $request)
    {

        $now = \Carbon\Carbon::now();
        if($request->hasFile('foto')){     
            //for upload foto
            $file = $request->foto;
            $extension = $file->getClientOriginalExtension(); //get extennsion
            $filename = time().'.'.$extension;
            $file->move('uploads/products/', $filename); //tempat file
            
            Product::where('id', $request->id)->update([
                'category_id' => $request->category,
                'product_name' => $request->product_name,
                'slug' => str_slug($request->product_name, '-'),
                'price' => $request->price,
                'description' => $request->description,
                'thumbnail' => $filename,
                'weight' => $request->weight,
                'datetime' => $now
            ]);


            foreach($request->color as $items){
                DB::table('product_color')->where('product_id', $request->id)->update([
                    'color_id' => $items
                ]);
            }

        }else{
            Product::where('id', $request->id)->update([
                'category_id' => $request->category,
                'product_name' => $request->product_name,
                'slug' => str_slug($request->product_name, '-'),
                'price' => $request->price,
                'description' => $request->description,
                'weight' => $request->weight,
                'datetime' => $now
            ]);
            DB::table('product_color')->where('product_id', $request->id)->delete();

            foreach($request->color as $items){
                DB::table('product_color')->insert([
                    'product_id' => $request->id,
                    'color_id' => $items
                ]);
            }
        }

        return redirect('/Admin/Product')->with('success', 'Product Berhasil Diubah');
    }

}

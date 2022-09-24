<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class shoppingCart extends Controller

{   
    public function index()
    {   
        $data = Cart::content();
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        // dd($data);
        return view('pages.shopping_cart', compact('data'));
    }
    
    public function add(Request $request)
    {
        $color = $request->color;
        $qty = $request->qty;
        $id = $request->id;
        $data = Product::where('id', $id)->first();
        
        Cart::add([
            'id' => $data->id,
            'name' => $data->product_name,
            'price' => $data->price,
            'qty' => $qty,
            'options' => [
                'color' => $color, 
                'description' => $data->description,
                'image' => $data->thumbnail,
                'weight' => ($data->weight * $qty)
                ]
        ]);

        return redirect('/')->with('success', 'Barang Berhasil Masuk Ke keranjang');

    }

    public function delete($rowid)
    {
        Cart::remove($rowid);
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return redirect('/shoppingCart');
    }

    public function detail($rowId)
    {
        $items = Cart::get($rowId);
        // dd($data);
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.update_shoppingCart', compact('items'));
    }

    public function update(Request $request)
    {
        $qty = $request->qty;
        $rowid = $request->rowId;
        $color = $request->color;
        $id = $request->id;

        $data = Product::where('id', $id)->first();

        // dd($color);
        
        Cart::update($rowid, [
                'qty' => $qty,
                'options' => [
                        'color' => $color,
                        'weight' => ($data->weight * $qty)
                    ]
                ]);            
        
        return redirect('/shoppingCart');

    }

}

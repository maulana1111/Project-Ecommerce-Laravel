<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\model\historyOrder;

class History extends Controller
{
    public function HistoryOrder()
    {
        $data = DB::table('history_order')
                ->select('history_order.*','member.member_name')
                ->join('member', 'history_order.member_id', '=', 'member.id')
                ->get();
        // dd($data);
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.history.history_order', compact('data'));
    }

    public function historyOrderDetail($code)
    {
        $data1 = DB::table('history_order')
                ->where('history_order.code', $code)
                ->select('history_order.*','member.member_name')
                ->join('member', 'history_order.member_id', '=', 'member.id')
                ->get();

        $data2 = DB::table('history_order_detail')
                ->where('order_code', $code)
                ->select('history_order_detail.*', 'product.product_name', 'color.color_name')
                ->join('product', 'history_order_detail.product_id', '=', 'product.id')
                ->join('color', 'history_order_detail.color', '=', 'color.id')
                ->get();

        $data3 = DB::table('history_shipping')->where('order_code', $code)->get(); 

        // dd($data2);
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.history.history_order_detail', compact('data1', 'data2', 'data3'));
    }

    public function UpdateStatusHistory($status, $code)
    {
        historyOrder::where('code', $code)->update([
            'status' => $status
        ]);
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }

        return redirect('/Admin/historyOrder/Detail/'.$code)->with('success', 'Berhasi Merubah Status');
    }
}

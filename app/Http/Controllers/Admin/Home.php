<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Product;
use App\model\admin;
use App\model\memberArea;
use App\model\paymentConfirm;
use App\model\historyOrder;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    public function index()
    {
        $member = memberArea::all();
        $historyOrder = DB::table('history_order')
                            ->where('history_order.status', 1)
                            ->select('history_order.*', 'member.member_name')
                            ->join('member', 'history_order.member_id', '=' ,'member.id')
                            ->get();
        $historyOrderSuccessSum = historyOrder::where('status', 4)->count('id');
        $newHistoryOrderSum = historyOrder::where('status', 1)->count('id');
        $productSum = Product::all()->count('id');
        $memberSum = memberArea::all()->count('id');

        // dd(session()->all());
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        
        return view('pagesAdmin.home', compact('member', 'historyOrder', 'historyOrderSuccessSum', 'newHistoryOrderSum', 'productSum' ,'memberSum'));
    }

    public function listAdmin()
    {
        $admin = admin::all();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        
        return view('pagesAdmin.listAdmin', compact('admin'));
    }

    public function addAdmin()
    {
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.addAdmin');
    }

    public function insertAdmin(Request $request)
    {
        $name = $request->name;
        $tingkat = $request->tingkat;
        $pass = password_hash($request->password, PASSWORD_DEFAULT);

        admin::insert([
            'name' => $name,
            'title' => $tingkat,
            'username' => $request->username,
            'password' => $pass
        ]);

        return redirect('/Admin/listAdmin')->with('success', "Admin Berhasil Ditambah");

        // dd($PASS);
    }

    public function deleteAdmin($name)
    {
        admin::where('name', $name)->delete();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return redirect('/Admin/listAdmin')->with('success', "Admin Berhasil Dihapus");
    }

    public function updateAdmin($name)
    {
        $data = admin::where('name', $name)->first();
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.updateAdmin', compact('data'));
    }

    public function doUpdateAdmin(Request $request)
    {
        admin::where('id', $request->id)->update([
            'name' => $request->name,
            'title' => $request->tingkat,
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT)
        ]);
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }

        return redirect('/Admin/listAdmin')->with('success', "Admin Berhasil Diupdate");

    }

    public function paymentApprove()
    {
        $data = DB::table('payment_confirm')
                    ->select('payment_confirm.*','history_order.status', 'member.member_name')
                    ->join('history_order', 'payment_confirm.code', '=', 'history_order.code')
                    ->join('member', 'history_order.member_id' ,'=', 'member.id')
                    ->where('history_order.status', '1')
                    ->get();

        // dd($data);
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.payment_approve', compact('data'));
    }

    public function doApprove($code)
    {
        historyOrder::where('code', $code)->update([
            'status' => '2'
        ]);
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return redirect('/Admin/Payment')->with('success', "Berhasi DiApprove");
    }

    public function AdminProfile()
    {
        if(!session()->get('admin_logged_in')){
            return redirect('/Admin/Login')->with('failed', 'Need Access');
        }
        return view('pagesAdmin.profileAdmin');
    }
}

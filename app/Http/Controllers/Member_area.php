<?php

namespace App\Http\Controllers;
use App\model\memberArea;
use App\model\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class Member_area extends Controller
{
    public function index(){
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.memberArea');
    }
    
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $member = memberArea::where('username', $username)->first();
        $count = memberArea::where('username', $username)->get()->count();

        
        if($count > 0){
            if(Hash::check($password, $member->password)){

                session([
                    'member_id' => $member->id,
                    'member_name' => $member->member_name,
                    'member_logged_in' => TRUE
                ]);

                return redirect('/')->with('success', 'Berhasil Login');

            }else{
                return redirect('/')->with('failed', 'Password Salah');
            }
        }else{
            return redirect('/')->with('failed', 'username Salah');
        }

    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Berhasil Logout');
    }

    public function daftar()
    {
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.daftar_member');
    }

    public function insert_member(Request $request)
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

        $data = memberArea::insert([
            'member_name' => $request->member_name,
            'email' => $request->email,
            'telp' => $request->telpon,
            'shipping_address' => $request->shipping_address,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        $last_id = DB::getPdo()->lastInsertId();

        // dd($last_id);

        $member = memberArea::where('id', $last_id)->first();

        session([
            'member_id' => $member->id,
            'member_name' => $member->member_name,
            'member_logged_in' => TRUE
        ]);
        
        return redirect('/memberArea/DaftarMember')->with('success', 'Berhasil Mendaftar');

    }

    public function showInvoice(){
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.invoice');
    }

    public function profile()
    {
        $data_member = memberArea::where('id', session()->get('member_id'))->first();
        // dd($data_member);
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.profile', compact('data_member'));
    }

    public function history_order()
    {
        $history_order = DB::table('history_order')->where('member_id', session()->get('member_id'))->get();
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.history_order', compact('history_order'));
    }

    public function history_order_detail($code)
    {
        $data = DB::table('history_order_detail')->where('order_code', $code)->get();
        // dd($data);
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        return view('pages.history_order_detail', compact('data'));
    }

    public function payment()
    {

        $count = DB::table('history_order')->where([
                        ['member_id', session()->get('member_id')],
                        ['status', '1']
                    ])->sum('id');
        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }

        if($count == 1){

            $payment = DB::table('history_order')->where('member_id', session()->get('member_id'))->first();
            return view('pages.payment', ['payment' => $payment]);

        }else{

            $payment = null;
            return view('pages.payment', ['payment' => $payment]);
        }
        // dd($count);
        
    }

    public function payment_confirm($code)
    {
        $data = $code;
        return view('pages.payment_bill', ['data' => $data]);
    }

    public function insert_payment(Request $request)
    {
        $this->validate($request, [
            'no_account' => 'required',
            'payment_date' => 'required',
            'foto' => 'required'
        ]);

        $code = $request->order_code;    
        $jumlah_uang = $request->nominal;
        $noAccount = $request->no_account;
        $date = $request->payment_date;

        if($request->hasFile('foto')){
            $file = $request->foto;
            $extension = $file->getClientOriginalExtension(); //get extennsion
            $filename = time().'.'.$extension;
            $file->move('uploads/payment_picture/', $filename);

            DB::table('payment_confirm')->insert([
                'code' => $code,
                'order_code' => $code,
                'no_account' => $noAccount,
                'jum_uang' => $jumlah_uang,
                'foto' => $filename,
                'paymen_date' => $date
            ]);
        }else{
            DB::table('payment_confirm')->insert([
                'order_code' => $code,
                'no_account' => $noAccount,
                'jum_uang' => $jumlah_uang,
                'foto' => '',
                'paymen_date' => $date
            ]);
        }

        return redirect('/memberArea/Payment');

    }

    public function invoice($code)
    {   
        $history_order = DB::table('history_order')->where('code', $code)->get();
        $history_order_detail = DB::table('history_order_detail')->where('order_code', $code)->get();
        $history_shipping = DB::table('history_shipping')->where('order_code', $code)->first();
        $member = DB::table('member')->where('id', session()->get('member_id'))->first();
        
        $pdf = PDF::loadview('pages.invoice_print', compact('history_order','history_order_detail','history_shipping', 'member'));
        return $pdf->download('laporan_invoice');

    }

}

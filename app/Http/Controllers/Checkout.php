<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkout extends Controller
{
    private $api_key = '44908468b9ea0d3f1d05ab16c08884b1';
    public function index()
    {   
        $data = $this->get_province();
        $shipping_cost = session()->get('shipping_cost');

        if(Cart::count()){
          $items = Cart::content();
        }

        if(session()->get('admin_logged_in')){
            return redirect('/Admin/Home')->with('failed', 'Need Logout');
        }
        
        return view('pages.checkout', [
            'data' => $data,
            'items' => $items,
            'shipping_cost' => $shipping_cost
          ]);
        // dd($shipping_cost);
    }

    public function nextStep(Request $request)
    {
      $code = str_random(10);
      $checked_number = $request->checked_number;
      $ongkir = $request->input('cost'.$checked_number);
      $cost = Cart::total();
      $total_cost = $ongkir+$cost; 
      $now = \Carbon\Carbon::now();

      // Carbon\Carbon {#657
      //       +"date": "2017-03-04 06:54:17.000000",
      //       +"timezone_type": 3,
      // }

      DB::table('history_order')->insert([
        'code' => $code,
        'member_id' => session()->get('member_id'),
        'total_qty' => Cart::count(),
        'price_product' => Cart::total(),
        'total_cost' => $total_cost,
        'keterangan' => session()->get('catatan_member'),
        'datetime' => $now
      ]);

      foreach(Cart::content() as $items){

        DB::table('history_order_detail')->insert([
          'order_code' => $code,
          'product_id' => $items->id,
          'qty' => $items->qty,
          'color' => $items->options->color,
          'subtotal' => $items->total
        ]);

      }

      DB::table('history_shipping')->insert([
        'order_code' => $code,
        'courier_name' => $request->courier_name,
        'courier_code' => $request->courier_code,
        'origin' => $request->origin,
        'destination' => $request->destination,
        'weight' => $request->weight,
        'service' => $request->input('service'.$checked_number),
        'description' => $request->input('description'.$checked_number),
        'cost' => $request->input('cost'.$checked_number),
        'etd' => $request->input('etd'.$checked_number)
      ]);

      Cart::destroy(); 
      return view('pages.home')->with('success', 'Berhasi Membeli Barang');
      // dd($request->input('cost'.$checked_number));
      // dd(str_random(10));
      // dd($now);
    }

    public function get_province()
    {
        $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/province/",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: $this->api_key"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return json_decode($response);
			}
    }

    public function get_total_weight()
    {
      $items = Cart::content();
      $weight = 0;
      foreach($items as $item)
      {
        $weight += $item->options->weight;
      }
      return $weight;

    }

    public function get_city($province_id){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: $this->api_key"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return json_decode($response);
        }

    }

    public function get_city_by_province($province_id){

        if($province_id){
            //dapatkan kota
            $city = $this->get_city($province_id);
            //render html
            $output = '<option value="">-- Pilih Kota --</option>';

            foreach($city->rajaongkir->results as $cty){
                $output .= '<option value="'.$cty->city_id.'">'.$cty->city_name.'</option>';
            }

        }else{

            $output = '<option value="">Pilih Kota</option>';

        }

        echo $output;

    }

    public function get_cost($origin, $destination, $weight, $courier){

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
			  CURLOPT_HTTPHEADER => array(
			    "content-type: application/x-www-form-urlencoded",
			    "key: $this->api_key"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return json_decode($response);
			}

		}

    public function check_shipping_cost(Request $request)
    {
      $origin = 152;
      $destination = $request->destination_city;
      $weight = $this->get_total_weight();
      $courier = $request->courier;
      $catatan = $request->catatan;
      $shipping_cost = $this->get_cost($origin, $destination, $weight, $courier);

      session([
        'catatan_member' => $catatan,
        'shipping_origin' => $origin,
        'shipping_destination' => $destination,
        'shipping_weight' => $weight,
        'shipping_courier' => $courier,
        'shipping_cost' => $shipping_cost,
        'shipping_checked_cost' => TRUE
      ]);

      return redirect('/checkout');

    }


}

<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>	
    <link rel="stylesheet" href="</css/bootstrap.min.css">
    <link rel="stylesheet" href="</css/custom.css">
    <link rel="stylesheet" href="</icons/font-awesome/css/font-awesome.css">
    <script src="</js/jquery-3.1.1.min.js"></script>
    <script src="</js/bootstrap.min.js"></script>
</head>
<body>

        <div class="container-fluid">

                <div class="content" style="border:1px solid; overflow:hidden; padding: 10px;">
            
                    <div class="row">
                        <div class="col-md-3">
                            <h1>PT.Bigshop</h1>
                            <p>Jl.Petamburan 2</p>
                        </div>
                        <div class="col-md-9"></div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="text-align:center">INVOICE</h3>
                        </div>
                    </div>
            
                    <br><br>
            
                    <div class="row">
                        <div class="col-md-12">
                            <p> Nama Pembeli : {{ session()->get('member_name') }}</p>
                            <p> Alamat : {{ $member->shipping_address }} </p>
                            <p> Telepon : {{ $member->telp }} </p>
                            <p> Tanggal Order : {{ $history_order->datetime }} </p>
                            <p> Kode Order : {{ $history_order->code }} </p>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-12">
            
                            <table border="1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Warna</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($history_order_detail as $data)
                                        <?php 
                                            $next_data = DB::table('product')->where('id', $data->product_id)->first();
                                            $next_data1 = DB::table('color')->where('id', $data->color)->first(); 
                                        ?>
                                            <tr>
                                                <td>{{ $next_data->product_name }}</td>
                                                <td>{{ $next_data1->color_name }}</td>
                                                <td>{{ $data->qty }} (Items)</td>
                                                <td>Rp.{{ number_format($next_data->price, 0,',','.') }}</td>
                                                <td>Rp.{{ number_format($data->subtotal, 0,',','.') }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                                {{ print_r($data) }}
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><p class="text-right mb-0"> Total Harga Barang </p></td>
                                        <td>Rp.{{ number_format($history_order->price_product, 0,',','.') }}</td> 
                                    </tr>
                                    <tr>
                                        <td colspan="4"><p class="text-right mb-0"> Ongkir </p></td>
                                        <td>Rp.{{ number_format($history_shipping->cost, 0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><p class="text-right mb-0"> Total </p></td>
                                        <td>Rp.{{ number_format($history_order->total_cost, 0,',','.') }}</td>
                                    </tr>
                                </tfoot>

                            </table>
            
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-12">
            
                            <h3 style="text-align:center; color:red">Dikirim Kerekening Dibawah Ini !!</h3>
                            <h3 style="text-align:center; ">1522333665544</h3>
                            <br><br><br>
                            <h6>NOTE:</h6>
                            <p style="color:red">Harap Dibayar 1 Jam Setelah Pembayaran. Tika Tidak Dibayar, Maka Data Akan Terhapus Secara Otomatis</p>
                        </div>
                    </div>
            
                </div>
                
            </div>

</body>
</html>


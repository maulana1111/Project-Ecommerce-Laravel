@extends('layouts.master')

@section('body')
    
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
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <h3>INVOICE</h3>
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-md-6">
                <p> Nama Pembeli : </p>
                <p> Alamat : </p>
                <p> Kota : </p>
                <p> Telepon : </p>
            </div>
            <div class="col-md-6">
                <p> Tanggal Order : </p>
                <p> Kode Order : </p>
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
                        <tr>
                            <td>Samsung</td>
                            <td>Gold</td>
                            <td>1</td>
                            <td>Rp.99999999</td>
                            <td>Rp.99999999</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"><p class="text-right mb-0"> Total Harga Barang </p></td>
                            <td>Rp.99999999</td>
                        </tr>
                        <tr>
                            <td colspan="4"><p class="text-right mb-0"> Ongkir </p></td>
                            <td>Rp.99999999</td>
                        </tr>
                        <tr>
                            <td colspan="4"><p class="text-right mb-0"> Total </p></td>
                            <td>Rp.99999999</td>
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
    <br><br><br>
    <a href="/" class="btn btn-success float-left">Kembali Ke Home</a>
    <a href="" class="btn btn-warning" style="margin-left:22%">Cetak Invoice</a>
    <a href="/memberArea" class="btn btn-primary float-right">Lihat Pemesanan</a>
    
</div>

@endsection
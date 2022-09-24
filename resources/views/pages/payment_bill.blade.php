@extends('layouts.master')

@section('body')
    
    <form method="POST" action="/memberArea/InsertPayment" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label>Order Code</label>
            <input type="text" value=" {{ $data }} " name="order_code" class="form-control">
        </div>
        <div class="form-group">
            <label>No. Account/Rekening</label>
            <input type="text" name="no_account" class="form-control">
        </div>
        <div class="form-group">
            <label>Jumlah Uang Yang Ditransfer</label>
            <input type="text" name="nominal" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Transfer</label>
            <input type="text" name="payment_date" placeholder="Tahun-Bulan-Hari" class="form-control" id="datepicker">
        </div>
        <div class="form-group">
            <label>Bukti Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Konfirmasi" class="form-control btn btn-success">
        </div>
        

    </form>

@endsection
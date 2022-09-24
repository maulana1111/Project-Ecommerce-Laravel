@extends('layouts.master')

@section('body')
    
<div class="card-columns">
    <div class="card bg-primary">
        <div class="card-block">
            <a href="/memberArea/profile" class="d-block text-center text-white"><i class="fa fa-user"></i> My Profile</a>
        </div>
    </div>
    <div class="card bg-primary">
        <div class="card-block">
            <a href="/memberArea/HistoryOrder" class="d-block text-center text-white"><i class="fa fa-shopping-cart"></i> History Belanja</a>
        </div>
    </div>
    <div class="card bg-primary">
        <div class="card-block">
            <a href="/memberArea/Payment" class="d-block text-center text-white"><i class="fa fa-money"></i> Tagihan Pembayaran</a>
        </div>
    </div>
</div>

@endsection
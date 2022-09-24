@extends('layouts.master')

@section('body')

<table class="table table-striped table-bordered">

    <tbody>
        
        <tr>
            <th>Nama legkap</th>
            <th>{{ $data_member->member_name }}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{ $data_member->email }}</th>
        </tr>
        <tr>
            <th>Nomor Telpon</th>
            <th>{{ $data_member->telp }} </th>
        </tr>
        <tr>
            <th>Alamat</th>
            <th>{{ $data_member->shipping_address }} </th>
        </tr>
    </tbody>
    
</table>

<a href="/memberArea" class="btn btn-warning">&larr;Back</a>
    
@endsection
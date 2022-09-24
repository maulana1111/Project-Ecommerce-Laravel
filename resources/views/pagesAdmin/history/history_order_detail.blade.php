@extends('layouts.adminlayout')

@section('master')

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
    {{ $message }}
</div>
@endif
@if($message = Session::get('failed'))
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
    {{ $message }}
</div>
@endif

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <h2>HISTORY ORDER DETAIL</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another action</a></li>
                        <li><a href="javascript:void(0);">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-hover dashboard-task-infos">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME PRODUCT</th>
                            <th>QTY</th>
                            <th>COLOR</th>                            
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>@foreach($data2 as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ $row->qty }}</span></td>
                                <td>{{ $row->color_name }}</td>
                                <td>Rp.{{ number_format($row->subtotal, 0,',','.') }}</td>
                            </tr>
                        <?php $i++ ?>@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <h2>HISTORY SHIPPING INFO</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another action</a></li>
                        <li><a href="javascript:void(0);">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-hover dashboard-task-infos">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>COURIER NAME</th>
                            <th>TUJUAN</th>
                            <th>BERAT</th>                            
                            <th>SERVICE</th>
                            <th>DESCRIPTION</th>
                            <th>COST</th>
                            <th>ESTIMASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>@foreach($data3 as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->courier_name }}</td>
                                <td>{{ $row->origin }}</td>
                                <td>{{ $row->weight }} Kg</td>
                                <td>{{ $row->service }}</td>
                                <td>{{ $row->description }}</td>
                                <td>Rp.{{ number_format($row->cost, 0,',','.') }}</span></td>
                                <td></td>
                                <td>{{ $row->etd }} hari</td>
                            </tr>
                        <?php $i++ ?>@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <h2>HISTORY ORDER INFO</h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another action</a></li>
                        <li><a href="javascript:void(0);">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-hover dashboard-task-infos">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                            <th>TOTAL COST</th>
                            <th>STATUS</th>                            
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>@foreach($data1 as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->member_name }}</td>
                                <td>Rp.{{ number_format($row->total_cost, 0,',','.') }}</span></td>
                                <td>
                                    <?php
                                        switch ($row->status) {
                                                case 1:
                                                    echo '<span class="label bg-red">belum ada pembayaran</span>';
                                                    break;
                                                
                                                case 2:
                                                    echo '<span class="label bg-orange">pembayaran diterima</span>';
                                                    break;
        
                                                case 3:
                                                    echo '<span class="label bg-blue">barang dikirim</span>';
                                                    break;
                                                    
                                                case 4:
                                                    echo '<span class="label bg-green">barang diterima</span>';
                                                    break;	
                                            } 
                                    ?>
                                </td>
                                <td>{{ $row->datetime }}</td>
                                <td>
                                        <?php
                                        switch ($row->status) {
                                                case 1:
                                                    echo '<a href="/Admin/historyOrder/updateStatus/2/'. $row->code .'" class="btn btn-warning">Pemabayaran diterima ?</a>';
                                                    break;
                                                
                                                case 2:
                                                    echo '<a href="/Admin/historyOrder/updateStatus/3/'. $row->code .'" class="btn btn-success">Barang di Kirim ?</a>';
                                                    break;
        
                                                case 3:
                                                    echo '<a href="/Admin/historyOrder/updateStatus/4/'. $row->code .'" class="btn btn-warning">Barang diterima ?</a>';
                                                    break;
                                                    
                                                case 4:
                                                    echo '<p class="label label-primary">Order Success</p>';
                                                    break;	
                                            } 
                                    ?>
                                </td>
                            </tr>
                        <?php $i++ ?>@endforeach
                    </tbody>
                </table>
            </div>
            <a href="/Admin/historyOrder" class="btn btn-warning">BACK</a>
        </div>
    </div>

</div>

    

@endsection
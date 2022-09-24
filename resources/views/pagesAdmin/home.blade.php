@extends('layouts.adminlayout')

@section('master')
    
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">SUCCESS ORDERED</div>
                <div class="number count-to" data-from="0" data-to="{{ $historyOrderSuccessSum }}" data-speed="15" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">help</i>
            </div>
            <div class="content">
                <div class="text">ALL PRODUCT</div>
            <div class="number count-to" data-from="0" data-to="{{ $productSum }}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">forum</i>
            </div>
            <div class="content">
                <div class="text">NEW ORDERED</div>
                <div class="number count-to" data-from="0" data-to="{{ $newHistoryOrderSum }}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            <div class="content">
                <div class="text">MEMBER</div>
                <div class="number count-to" data-from="0" data-to="{{ $memberSum }}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>
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

<div class="row clearfix">
    <!-- Task Info -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2>MEMBER INFO</h2>
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
                                <th>EMAIL</th>
                                <th>TELEPON</th>
                                <th>ALAMAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>@foreach($member as $row)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->member_name }}</td>
                                    <td>{{ $row->email }}</span></td>
                                    <td>{{ $row->telp }}</td>
                                    <td>
                                        {{ $row->shipping_address }}
                                    </td>
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
                    <h2>NEW ORDERED</h2>
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
                                    <th>Pembeli</th>
                                    <th>Status</th>
                                    <th>Total QTY</th>
                                    <th>Harga Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>@foreach($historyOrder as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->member_name }}</td>
                                        <td>
                                            <?php
                                                switch ($row->status) {
                                                    case 1:
                                                        echo '<span class="label bg-red">Doing</span>';
                                                        break;
                                                    
                                                    case 2:
                                                        echo '<span class="label bg-orange">Doing</span>';
                                                        break;
                
                                                    case 3:
                                                        echo '<span class="label bg-green">Doing</span>';
                                                        break;
                                                        
                                                    case 4:
                                                        echo '<span class="label bg-blue">Doing</span>';
                                                        break;	
                                                } 
                                            ?>
                                        </td>
                                        <td>{{ $row->total_qty }}</td>
                                        <td>Rp.{{ number_format($row->price_product, 0,',','.') }}</td>
                                    </tr>
                                <?php $i++ ?>@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- #END# Task Info -->
</div>

@endsection
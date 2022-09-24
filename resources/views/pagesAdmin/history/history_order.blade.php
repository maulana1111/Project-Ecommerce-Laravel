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
                            <th>CODE</th>
                            <th>NAMA</th>
                            <th>TOTAL COST</th>
                            <th>STATUS</th>                            
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>@foreach($data as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->code }}</td>
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
                                    <a href="/Admin/historyOrder/Detail/{{ $row->code }}" class="btn btn-success">SEE -></a>
                                </td>
                            </tr>
                        <?php $i++ ?>@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
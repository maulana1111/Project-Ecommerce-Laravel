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
            <h2>PAYMENT INFO</h2>
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
                            <th>BUYER NAME</th>
                            <th>ORDER CODE</th>
                            <th>NO ACCOUNT</th>                            
                            <th>MONEY TRANSFERRED</th>
                            <th>FOTO</th>
                            <th>DATE</th>
                            <th>APPROVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>@foreach($data as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->member_name }}</td>
                                <td>{{ $row->order_code }}</span></td>
                                <td>{{ $row->no_account }}</td>
                                <td>Rp.{{ number_format($row->jum_uang, 0,',','.') }}</td>
                                <td>
                                    <img src="/uploads/payment_picture/{{ $row->foto }}" id="img" style="width:65px;" alt="Bukti pembayaran">    
                                </td>
                                <td>{{ $row->paymen_date }}</td>
                                <td>
                                    <a href="/Admin/Payment/doApprove/OrderCode/{{ $row->code }}" class="btn btn-success">approve</a>
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
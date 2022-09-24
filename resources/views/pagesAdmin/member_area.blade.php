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
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>@foreach($data as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->member_name }}</td>
                                <td>{{ $row->email }}</span></td>
                                <td>{{ $row->telp }}</td>
                                <td>{{ $row->shipping_address }}</td>
                                <td>
                                    <a href="/Admin/memberArea/Delete/{{ $row->member_name }}" class="btn btn-danger">Delete</a>
                                    <a href="/Admin/memberArea/Update/{{ $row->member_name }}" class="btn btn-warning">Update</a>
                                </td>
                            </tr>
                        <?php $i++ ?>@endforeach
                    </tbody>
                </table>
            </div>
            <a href="/Admin/memberArea/AddMember" class="btn btn-success">ADD MEMBER</a>
        </div>
    </div>

</div>

@endsection
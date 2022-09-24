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
            <h2>PRODUCT INFO</h2>
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
                            <th>NAME</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>                            
                            <th>DESCRIPTION</th>
                            <th>FOTO</th>
                            <th>WEIGHT</th>
                            <th>COLOR</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>@foreach($data as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ $row->category_name }}</span></td>
                                <td>Rp.{{ number_format($row->price, 0,',','.') }}</td>
                                <td>{{ $row->description }}</td>
                                <td><img src="/uploads/products/{{ $row->thumbnail }}" style="width:65px;" alt="product{{ $i }}"></td>
                                <td>{{ $row->weight }} Kg</td>
                                <?php
                                    $data_color = DB::table('color')->select('color.*')
                                                              ->where('product_color.product_id', $row->id)
                                                              ->join('product_color', 'color.id', '=', 'product_color.color_id')
                                                              ->get();
                                ?>
                                <td>
                                    @foreach ($data_color as $item)
                                        <p>{{ $item->color_name }}</p>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="/Admin/Product/Delete/{{ $row->slug }}" class="btn btn-danger">Delete</a>&nbsp;|&nbsp;
                                    <a href="/Admin/Product/Update/{{ $row->slug }}" class="btn btn-warning">Update</a>
                                </td>
                            </tr>
                        <?php $i++ ?>@endforeach
                    </tbody>
                </table>
            </div>
            <a href="/Admin/Product/Add" class="btn btn-success">ADD PRODUCT</a>
        </div>
    </div>

</div>

@endsection
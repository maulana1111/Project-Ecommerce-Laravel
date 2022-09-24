@extends('layouts.master')

@section('body')

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
    {{ $message }}
</div>
@endif

<!--products-->
<div class="card-columns">
    <!--products-->
    @foreach($data as $row)

    <div class="card">
        <img class="card-img-top" src="/uploads/products/{{ $row->thumbnail }}" alt="Card image cap">
        <div class="card-block">
            <h5 class="card-title">{{ $row->product_name }}</h5>
            <p class="card-text">Rp.{{ number_format($row->price, 0,',','.') }}</p>
            <a href="/product/detail/{{ $row->slug }}" class="btn btn-primary">Lihat</a>
        </div>
    </div>
    
    @endforeach
</div>

@endsection
@extends('layouts.master')

@section('body')

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


<!--slider-->
<div id="carouselSlider" class="carousel slide mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselSlider" data-slide-to="0" class="active"></li>
        <li data-target="#carouselSlider" data-slide-to="1"></li>
        <li data-target="#carouselSlider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="/uploads/banners/slider-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item ">
            <img class="d-block img-fluid" src="/uploads/banners/slider-2.jpg" alt="First slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

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
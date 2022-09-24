@extends('layouts.master')

@section('body')

@foreach ($data as $items)

<form action="/shoppingCart/add" method="post">
    {{ csrf_field() }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="/uploads/products/{{ $items->thumbnail }}" alt="">
                
            </div>
            <div class="col-md-6">
                <h2>{{ $items->product_name }}</h2><br>
                <h4>Rp.{{ number_format($items->price, 0,',','.') }}</h4><br>
                <p>{{ $items->description }}</p>
                <label for="exampleFormControlSelect1">Pilih Warna</label>
                <select class="form-control" name="color" id="exampleFormControlSelect1">
                {{ 
                    $color = DB::table('color')
                                ->select('color.*')
                                ->join('product_color', 'color.id', '=', 'product_color.color_id')
                                ->where('product_color.product_id', $items->id)
                                ->get()
                }}
                            
                    @foreach ($color as $colors)
                        <option value="{{ $colors->id }}">{{ $colors->color_name }}</option> 
                    @endforeach
                </select>
                <br><br>

                <label for="">Banyak yang diinginkan</label>
                <input type="number" name="qty" min="1" value="1" max="10" class="form-control">
                <input type="hidden" name="id" value="{{ $items->id }}">
                <br>
                <br>
                @if (session()->get('member_logged_in'))
                <button class="btn btn-primary" type="submit">Beli</button>&nbsp;&nbsp;
                <a href="/" class="btn btn-danger">Kembali</a>
                @else
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#loginModal">Silahkan Login Terlebih dahulu</a>
                @endif
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection
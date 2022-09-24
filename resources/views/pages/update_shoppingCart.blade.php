@extends('layouts.master')

@section('body')

<h3 class="alert alert-success">Update Keranjang Belanja</h3>
<br><br><br>

<form action="/shoppingCart/update" method="post">
    {{ csrf_field() }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="/uploads/products/{{ $items->options->image }}" alt="">                
            </div>
            <div class="col-md-6">
                <h2>{{ $items->product_name }}</h2><br>
                <h4>Rp.{{ number_format($items->price, 0,',','.') }}</h4><br>
                <p>{{ $items->options->description }}</p>
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
                    <?php
                        if($colors->id == $items->options->color){
                            $select = 'selected=""';
                        }else{
                            $select = '';
                        }
                    ?>
                    <option <?php echo $select ?> value="{{ $colors->id }}">{{ $colors->color_name }}</option>                        
                @endforeach
                </select>
                <br><br>

                <label for="">Banyak yang diinginkan</label>
                <input type="number" name="qty" min="1" value="{{ $items->qty }}" max="10" class="form-control">
                <input type="hidden" name="rowId" value="{{ $items->rowId }}">
                <input type="hidden" name="id" value="{{ $items->id }}">
                <br>
                <br>
                <button class="btn btn-primary" type="submit">Update</button>&nbsp;&nbsp;
                <a href="/shoppingCart" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
</form>

@endsection
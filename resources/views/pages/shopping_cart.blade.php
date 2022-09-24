@extends('layouts.master')

@section('body')

<!--products-->
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Library</li>
</ol>

<!--cart-->

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Delete/Update</th>
            <th>Item</th>
            <th>Color</th>
            <th>Qty</th>
            <th>Price (Rp)</th>
            <th>SubTotal (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $items)

        <tr>
            <td>
                <a href="/shoppingCart/remove/{{ $items->rowId }}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                <a href="/shoppingCart/detail/{{ $items->rowId }}" class="btn btn-success btn-sm"><i class="fa fa-exchange" aria-hidden="true"></i>

            </td>
            <td>{{ $items->name }}</td>
            <td>

                @foreach (DB::table('color')->where('id', $items->options->color)->get() as $color)
                <p>{{ $color->color_name }}</p>                    
                @endforeach

            </td>
            <td class="form-inline border-0">
                <p>{{ $items->qty }}</p>
                <input type="hidden" name="id[]" value="{{ $items->id }}">
                <input type="hidden" name="rowid[]" value="{{ $items->rowId }}">
            </td>
            <td>Rp.{{ number_format($items->price, 0,',','.') }}</td>
            <td>Rp.{{ number_format($items->total, 0,',','.') }}</td>
        </tr>
                    
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th colspan="5"><p class="text-right mb-0">Total (Rp)</p></th>
            <td>Rp.<?php echo number_format(Cart::total(), 0,',','.') ?></td>
        </tr>
    </tfoot>
</table>

<p class="py-2">
    @if (session()->get('member_logged_in'))
        <a href="/" class="btn btn-success float-left"><i class="fa fa-arrow-left"> Kembali Ke Home</i></a>
        <a  class="btn btn-primary float-right" id="checkout">Check Out <i class="fa fa-arrow-right"></i></a>
    @else
        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#loginModal">Silahkan Login Terlebih dahulu</a>
    @endif    
</p>

<script>
    var id = document.getElementById('checkout');
    id.addEventListener("click", function(){
        var tanya = confirm("Apakah Anda Sudah Yakin ?");

        if(tanya == true){
            location.href = "/checkout";
        }else{
            location.href = "/shoppingCart";
        }

    })
</script>

@endsection


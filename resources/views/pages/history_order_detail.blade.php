@extends('layouts.master')

@section('body')

@if($data)
        @foreach($data as $history_order)
<table class="table table-striped table-bordered">    
    
        <?php $product = DB::table('product')->where('id', $history_order->product_id)->first() ?>
        <?php $color = DB::table('color')->where('id', $history_order->color)->first() ?>

			<tr>
				<td>Code</td>
				<td>{{ $history_order->order_code }} </td>
			</tr>
			<tr>
                <td>Nama Product</td>
                <td>{{ $product->product_name }}</td>
            </tr>
            <tr>
                <td>Warna</td>
                <td>{{ $color->color_name }}</td>
			</tr>
			<tr>
				<td>Total Qty</td>
				<td>{{ $history_order->qty }} item</td>
			</tr>
			<tr>
				<td>Total Biaya</td>
				<td>Rp.{{ number_format($history_order->subtotal, 0,'.',',') }} </td>
			</tr>
</table>

@endforeach
@endif

<a href="/memberArea/HistoryOrder" class="btn btn-warning">&larr; Back</a>

@endsection
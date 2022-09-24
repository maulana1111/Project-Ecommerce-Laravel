@extends('layouts.master')

@section('body')
    
<table class="table table-bordered">
	<thead>
		<tr>
            <th>Order Kode</th>
            <th>Atas Nama</th>
            <th>Tanggal Pembelian</th>
            <th>Total Pembayaran</th>
			<th>Invoice</th>
			<th>Konfirmasi</th>
		</tr>
    </thead>
	<tbody>
        @if($payment != null)
        <tr>
            <td>{{ $payment->code }}</td>
            <td>{{ session()->get('member_name') }}</td>
            <td>{{ date('d/m/Y',strtotime($payment->datetime)) }}</td>
            <td>Rp.{{ number_format($payment->total_cost, 0,',','.') }}</td>
            <td>
                <a href="/memberArea/Invoice/{{ $payment->code }}" class="btn btn-success">
                    <i class="fa fa-sticky-note-o"></i>
                </a>
            </td>
            <td>
                <a href="/memberArea/ConfirmPayment/{{ $payment->code }}" class="btn btn-primary">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </td>
        </tr>
        @endif
	</tbody>
</table>

@endsection
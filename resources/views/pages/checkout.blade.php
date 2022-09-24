@extends('layouts.master')
 <?php $btn = session()->get('shipping_checked_cost') ?>
@section('body')
<!--checkout-->

    {{-- pilih province --}}
    @include('pages.checkout_cek_lokasi')

    <form action="/checkout/Step2" method="post">
    {{ csrf_field() }}
    <!--Ongkos Kirim-->

    @if (session()->get('shipping_cost')) 
        @foreach ($shipping_cost->rajaongkir->results as $results)
            <input type="hidden" name="courier_name" value="{{ $results->name }}">
            <input type="hidden" name="courier_code" value="{{ $results->code }}">
        @endforeach
            <input type="hidden" name="origin" value="{{ $shipping_cost->rajaongkir->origin_details->city_name }}">
            <input type="hidden" name="destination" value="{{ $shipping_cost->rajaongkir->destination_details->city_name }}">
            <input type="hidden" name="weight" value="{{ $shipping_cost->rajaongkir->query->weight }}">
    @endif

    <h4 class="bg-faded px-3 py-2 rounded"><span class="text-danger">*</span>Ongkos Kirim</h4>
                
    <table class="table">
            <thead>
                <tr>
                    <th>Pilih</th>
                    <th>Servis</th>
                    <th>Deskripsi</th>
                    <th>Biaya (Rp)</th>
                    <th>ETD (hari)</th>
                </tr>
            </thead>
            <tbody>
                    
                @if (session()->get('shipping_cost')) 
                    @foreach ($shipping_cost->rajaongkir->results as $results)
                        @if(count($results) > 0)
                            {{ $i = 1 }}@foreach($results->costs as $costs)
                                <tr>
                                    <td><input type="radio" id="checked_number" name="checked_number" value="{{ $i }}" /></td>
                                    <td>
                                        {{ $costs->service }}
                                        <input type="hidden" id="service{{ $i }}" name="service{{ $i }}" value="{{ $costs->service }}">
                                    </td>
                                    <td>
                                        {{ $costs->description }}
                                        <input type="hidden" name="description{{ $i }}" value="{{ $costs->description }}">
                                    </td>
                                        @foreach($costs->cost as $cost)
                                            <td>
                                                Rp.{{ number_format($cost->value, 0,',','.') }}
                                                <input type="hidden" id="cost{{ $i }}" name="cost{{ $i }}" value="{{ $cost->value }}">
                                            </td>
                                            <td>
                                                {{ $cost->etd }}
                                                <input type="hidden" name="etd{{ $i }}" value="{{ $cost->etd }}">
                                            </td>
                                        @endforeach
                                </tr>  
                            {{ $i++ }}@endforeach
                        @else 
                            <p class="alert alert-danger">Mohon maaf, layanan tidak tersedia.</p>
                        @endif               
                    @endforeach         
                @else 
                    <p class="badge badge-warning"> Silahkan pilih kota asal dan destinasi. </p>
                @endif
                
            </tbody>
        </table>

        <button type="button" id="cek" class="btn btn-success float-right">Click Kalau sudah</button>

              
        
    <br><br>

    <!-- ringkasan -->
    <h4 class="bg-faded px-3 py-2 rounded">Ringkasan</h4>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Options</th>
                <th>Qty</th>
                <th>Harga (Rp)</th>
                <th>SubTotal (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    @foreach (DB::table('color')->where('id', $item->options->color)->get() as $color)
                        <p class="mb-0">{{ $color->color_name }}</p>                    
                    @endforeach
                </td>
                <td>{{ $item->qty }}</td>
                <td>Rp.{{ number_format($item->price, 0,',','.') }}</td>
                <td>Rp.{{ number_format($item->total, 0,',','.') }}</td>
            </tr>                
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4"><p class="text-right mb-0">Total harga Barang (Rp)</p></th>
                <td>Rp.<?php echo number_format(Cart::total(), 0,',','.') ?></td>
                <input type="hidden" id="first_pay" value="<?php echo Cart::total() ?>">
            </tr>
            <tr>
                <th colspan="4"><p class="text-right mb-0">Biaya Ongkir (Rp)</p></th>
                <td>Rp.<span id="ongkir"></span></td>
            </tr>
            <tr>
                <th colspan="4"><p class="text-right mb-0">Total Pembayaran (Rp)</p></th>
                <td>Rp.<span id="total"></span></td>
            </tr>
        </tfoot>
    </table>
    
    <script>
            $(document).ready(function(){
               
                $('#cek').click(function(){

                    var checked_number = $('input:checked').attr("value");
                    var cost = parseInt($('#cost'+checked_number).attr("value"));
                    var cost1 = formatNumber(cost);
                    var first_pay = parseInt($('#first_pay').val()); 
                    var last = cost + first_pay;
                    var last1 = formatNumber(last);            

                    // console.log(formatNumber(last));
                    //console.log(new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(last));

                    $('#total').text(last1);
                    $('#ongkir').text(cost1);

                });
                
                function formatNumber(num) {
                    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                }
                

            })
        </script>

    <!--finish order-->

    <p class="py-2">
            <a href="/shoppingCart" class="btn btn-primary float-left"><i class="fa fa-arrow-left"></i> Kembali ke Keranjang Belanja</a>
            @if(count($items) > 0)
                @if( $btn == 1 )
                     <input class="btn btn-success float-right" name="submit" type="submit" value="Selesaikan Belanja">{{-- <i class="fa fa-arrow-right"></i> --}}
                @else 
                    <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#exampleModal">
                        Pilih Lokasi Pengiriman Terlebih Dahulu
                    </button>
                @endif
            @else 
                <a href="/" class="btn btn-warning float-right">Silahkan Belanja Dahulu</a>
            @endif
    </p>

</form>

    
@endsection
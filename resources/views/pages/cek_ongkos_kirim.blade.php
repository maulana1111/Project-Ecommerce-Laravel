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

        <script>
            $(document).ready(function(){

                $('#cek').click(function(){

                    var checked_number = $('input:checked').attr("value");
                    var cost = $('#cost'+checked_number).attr("value");
                    var first_pay = $('#first_pay').attr("value");

                    console.log(first_pay);

                });

            })
        </script>        

<input type="hidden" id="hidden" value="">
        
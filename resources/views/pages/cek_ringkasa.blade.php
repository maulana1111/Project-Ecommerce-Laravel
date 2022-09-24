<h4 class="bg-faded px-3 py-2 rounded">Ringkasan</h4>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Color</th>
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
                <td>Rp.<?php echo intval(0,',','.', Cart::total()) ?></td>
                <input type="hidden" id="first_pay" value="<?php echo Cart::total() ?>">
            </tr>
            <tr>
                <th colspan="4"><p class="text-right mb-0">Biaya Ongkir (Rp)</p></th>
                <td>Rp.<p id="ongkir"></p></td>
            </tr>
            <tr>
                <th colspan="4"><p class="text-right mb-0">Total Pembayaran (Rp)</p></th>
                <td>Rp.<p id="total"></p></td>
            </tr>
        </tfoot>
    </table>
    
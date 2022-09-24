
<h4 class="bg-faded px-3 py-2 rounded"><span class="text-danger">*</span>Pilih Lokasi</h4><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Pilih Lokasi Pengiriman
    </button>
    <br><br><br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih Lokasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="/checkout/cek_shipping_cost" method="post">
              {{ csrf_field() }}
              
              <div class="modal-body">
                <label>Pilih Kurir</label>
                <select name="courier" class="form-control" id="courier">
                    <option value="">-- Pilih Kurir --</option>
                    <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                    <option value="pos">POS Indonesia (POS)</option>
                    <option value="tiki">Citra Van Titipan Kilat (TIKI)</option>
                </select>

                <br>

                <label>Pilih Provinsi</label>
                <select name="destination_province" class="form-control" id="destination_province">
                    <option value="">-- Pilih Provinsi --</option>
                    @foreach ($data->rajaongkir->results as $prov)
                        <option value="{{ $prov->province_id }}">{{ $prov->province }}</option>
                    @endforeach
                </select>

                <br>

                <label>Pilih Kota</label>
                <select name="destination_city" class="form-control" id="destination_city">
                    <option value="">-- Pilih Kota --</option>
                </select>
                <br>

                <textarea name="catatan" class="form-control" placeholder="Catatan" rows="5"></textarea>
            
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>

          </form>

          <script>
              $(document).ready(function(){
      
                $('#destination_province').change(function(){
      
                  var province_id = $('#destination_province').val();
                  $.get('/checkout/get_city_by_province/'+ province_id, function(resp){
      
                    $('#destination_city').html(resp);
                    // console.log(city)
                    
                  });
      
                });
      
              })
            </script>

          </div>
        </div>
      </div>
    
    
      
@extends('layouts.adminlayout')

@section('master')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>ADD PRODUCT</h2>
        </div>
        <div class="body">
            <div class="row clearfix">
                <form action="/Admin/Product/doAdd" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="product_name" required>
                            <label class="form-label">Product Name</label>
                        </div>
                    </div>
                    <select class="form-control show-tick" name="category">
                        <option value="">-- Choose Category --</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="price" required>
                            <label class="form-label">Price</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="4" class="form-control no-resize" name="description" placeholder="Type Description..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php $i=1 ?>  @foreach ($color as $item)
                            <input type="checkbox" id="basic_checkbox_{{ $i }}" name="color[]" value="{{ $item->id }}"/>
                            <label for="basic_checkbox_{{ $i }}">{{ $item->color_name }}</label>
                            &nbsp;&nbsp;
                        <?php $i++ ?>  @endforeach 
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="weight" required>
                            <label class="form-label">Weight</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label for="">Pilih File</label>
                        <input type="file" class="form-control" name="foto" required>
                        <p style="color:red">Note: max size 2048 Kb</p>
                    </div><br>
                    <a href="/Admin/Product" class="btn btn-warning">Back Product</a>
                    <button class="btn btn-primary waves-effect" id="submit" type="submit">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
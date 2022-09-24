@extends('layouts.adminlayout')

@section('master')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>ADD COLOR</h2>
        </div>
        <div class="body">
            <form action="/Admin/Product/Color/doInsert" method="POST">
                {{ csrf_field() }}
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="color_name" required>
                        <label class="form-label">Color Name</label>
                    </div>
                </div>
                <button class="btn btn-primary waves-effect" id="submit" type="submit">ADD</button>
            </form>
        </div>
    </div>
</div>

@endsection
@extends('layouts.adminlayout')

@section('master')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>UPDATE COLOR</h2>
        </div>
        <div class="body">
            <form action="/Admin/Product/Color/doUpdate" method="POST">
                {{ csrf_field() }}
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="color_name" value="{{ $data->color_name }}" required>
                        <label class="form-label">Color Name</label>
                    </div>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <a href="/Admin/Product/Color" class="btn btn-warning">BACK COLOR</a>
                <button class="btn btn-primary waves-effect" id="submit" type="submit">UPDATE</button>
            </form>
        </div>
    </div>
</div>

@endsection
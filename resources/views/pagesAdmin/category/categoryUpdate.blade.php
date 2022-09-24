@extends('layouts.adminlayout')

@section('master')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>ADD CATEGORY</h2>
        </div>
        <div class="body">
            <form action="/Admin/Product/Category/doUpdate" method="POST">
                {{ csrf_field() }}
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="category_name" value="{{ $data->category_name }}" required>
                        <label class="form-label">Category Name</label>
                    </div>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <a href="/Admin/Product/Category" class="btn btn-warning">BACK CATEGORY</a>
                <button class="btn btn-primary waves-effect" id="submit" type="submit">ADD</button>
            </form>
        </div>
    </div>
</div>

@endsection
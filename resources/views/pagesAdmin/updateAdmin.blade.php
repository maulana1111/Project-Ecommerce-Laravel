@extends('layouts.adminlayout')

@section('master')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>UPDATE ADMIN {{ $data->name }}</h2>
        </div>
        <div class="body">
            <form action="/Admin/listAdmin/doUpdate" method="POST">
                {{ csrf_field() }}
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                        <label class="form-label">Name</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="radio" name="tingkat" value="superAdmin" id="superAdmin">
                    Super Admin
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="tingkat" value="admin" id="admin">
                    Admin
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
                        <label class="form-label">Username</label>
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" required>
                        <label class="form-label">Password</label>
                    </div>
                </div>
                
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button class="btn btn-warning waves-effect" id="submit" type="submit">UPDATE</button>
            </form>
        </div>
    </div>
</div>

@endsection
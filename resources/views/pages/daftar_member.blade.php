@extends('layouts.master')

@section('body')

<form action="/memberArea/insertMember" method="post">
    {{ csrf_field() }}

<div class="row">
    <div class="col-7">
        @if ($errors->has('member_name'))
            <label class="alert alert-warning" for="">{{ $errors->first('member_name') }}</label>
        @endif
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('member_name') }}" name="member_name" placeholder="Nama Lengkap">
        </div>
            
        @if ($errors->has('email'))
            <label class="alert alert-warning" for="">{{ $errors->first('email') }}</label>
        @endif
        <div class="form-group">
            <input type="text" class="form-control value="{{ old('email') }}"" placeholder="Email" name="email">
        </div>

        @if ($errors->has('telpon'))
            <label class="alert alert-warning" for="">{{ $errors->first('telpon') }}</label>
        @endif
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('telpon') }}" placeholder="Nomor Telepon" name="telpon">
        </div>

        @if ($errors->has('shipping_address'))
            <label class="alert alert-warning" for="">{{ $errors->first('shipping_address') }}</label>
        @endif
        <div class="form-group">
            <textarea name="shipping_address" class="form-control" placeholder="Alamat Lengkap" id="" rows="5">{{ old('shipping_address') }}</textarea>
            
        </div>

    </div>
    <div class="col-5">
        @if ($errors->has('username'))
            <label class="alert alert-warning" for="">{{ $errors->first('username') }}</label>
        @endif
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('username') }}" placeholder="Username" name="username">
        </div> 
        @if ($errors->has('password'))
            <label class="alert alert-warning" for="">{{ $errors->first('password') }}</label>
        @endif
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('password') }}" placeholder="Password" name="password">
        </div>
        @if ($errors->has('retype_password'))
            <label class="alert alert-warning" for="">{{ $errors->first('retype_password') }}</label>
        @endif
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('retype_password') }}" placeholder="Retype Password" name="retype_password">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <input type="submit" name="submit" value="Daftar" class="btn btn-primary"> &nbsp;&nbsp; <a href="#" data-toggle="modal" data-target="#loginModal">Sudah punya akun?</a> 
    </div>
</div>

</form>

@endsection
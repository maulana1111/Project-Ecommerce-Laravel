@extends('layouts.adminlayout')

@section('master')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>ADD MEMBER</h2>
        </div>
        <div class="body">
            <form action="/Admin/memberArea/insertMember" method="POST">
                {{ csrf_field() }}
                @if ($errors->has('member_name'))
                    <label class="alert alert-warning" for="">{{ $errors->first('member_name') }}</label>
                @endif
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" value="{{ old('member_name') }}" name="member_name" required>
                        <label class="form-label">Member Name</label>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <label class="alert alert-warning" for="">{{ $errors->first('email') }}</label>
                @endif
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" value="{{ old('email') }}" name="email" required>
                        <label class="form-label">Email</label>
                    </div>
                </div>
                @if ($errors->has('telpon'))
                    <label class="alert alert-warning" for="">{{ $errors->first('telpon') }}</label>
                @endif
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" value="{{ old('telpon') }}" name="telpon" required>
                        <label class="form-label">Telepon</label>
                    </div>
                </div>
                @if ($errors->has('shipping_address'))
                    <label class="alert alert-warning" for="">{{ $errors->first('shipping_address') }}</label>
                @endif
                <div class="form-group form-float">
                    <label  class="form-label">Address</label><br>
                    <textarea id="" class="form-control" name="shipping_address" placeholder="Address"> {{ old('shipping_address') }}</textarea>
                </div>
                @if ($errors->has('username'))
                    <label class="alert alert-warning" for="">{{ $errors->first('username') }}</label>
                @endif
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" value="{{ old('username') }}" name="username" required>
                        <label class="form-label">Username</label>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <label class="alert alert-warning" for="">{{ $errors->first('password') }}</label>
                @endif
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" value="{{ old('password') }}" name="password" required>
                        <label class="form-label">Password</label>
                    </div>
                </div>
                @if ($errors->has('retype_password'))
                    <label class="alert alert-warning" for="">{{ $errors->first('retype_password') }}</label>
                @endif
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" value="{{ old('retype_password') }}" name="retype_password" required>
                        <label class="form-label">Retype Password</label>
                    </div>
                </div>
                <button class="btn btn-primary waves-effect" id="submit" type="submit">ADD</button>
            </form>
        </div>
    </div>
</div>

@endsection
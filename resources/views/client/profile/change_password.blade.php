@extends('client/profile/profile_layout')

@section('profile')
<style>
    .invalid{
        color: red;
    }
</style>
<form action="{{ route('update_password')}}" id="change_password_form" method="POST">
    @csrf
    <h3 class="mb-4">Đặt Lại Mật Khẩu</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Mật Khẩu Hiện Tại</label>
                <input type="password" name="old_password" id="old_password" class="form-control" 
                placeholder="Mật khẩu cũ" required="">
                @if($errors->any('new_password'))
                <span class="text-danger"> {{$errors->first('old_password')}}</span>
                @endif                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Mật Khẩu Mới</label>
                <input type="password" name="new_password" id="new_password" class="form-control"
                placeholder="Mật khẩu mới"required="">
                @if($errors->any('new_password'))
                <span class="text-danger"> {{$errors->first('new_password')}}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nhập Lại Mật Khẩu Mới</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" 
                placeholder="Nhập lại mật khẩu mới" required="">
                @if($errors->any('confirm_password'))
                <span class="text-danger"> {{$errors->first('confirm_password')}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="padding">
        <button type="submit" class="btn btn-primary"> Đặt lại mật khẩu</button>
    </div>
</form>
@endsection
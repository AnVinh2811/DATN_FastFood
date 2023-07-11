@extends('client/profile/profile_layout')
@section('profile')
<style>
    .invalid{
        color: red;
    }
</style>
<form action="{{route('update_profile')}}" method="Post" id="change_info_form">
    @foreach($cus as $c)
    @csrf
    <h3 class="mb-4">Chi Tiết Tài Khoản</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name="name" class="form-control" value="{{$c->customer_name}}" placeholder="Họ và tên" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{$c->customer_email}}" placeholder="Email" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="phone" name="phone" class="form-control" value="{{$c->customer_phone}}" placeholder="Số điện thoại" required>
            </div>
        </div>

    </div>
    <div class="padding">
        <button type="submit" class="btn btn-primary"> Cập nhật thông tin</button>
    </div>
    @endforeach
</form>


@endsection
@extends('client/profile/profile_layout')
@section('profile')

    <form action="{{route('profile')}}" method="Post">
    @foreach($cus as $c)
        @csrf
        <h3 class="mb-4">Chi Tiết Tài Khoản</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" value="{{$c->customer_name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{$c->customer_email}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" value="{{$c->customer_phone}}">
                </div>
            </div>

        </div>
        <!-- <div class="padding">
            <button type="submit" class="btn btn-primary"> Cập nhật thông tin</button>
        </div> -->
        @endforeach
    </form>


@endsection
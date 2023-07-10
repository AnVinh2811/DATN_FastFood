@extends('client/layout_cli')
@section('content')

<style>
	@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");

	body {
		background: #f9f9f9;
		font-family: "Roboto", sans-serif;
	}

	.shadow {
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
	}

	.profile-tab-nav {
		min-width: 250px;
	}

	.tab-content {
		flex: 1;
	}

	.form-group {
		margin-bottom: 1.5rem;
	}

	.nav-pills a.nav-link {
		padding: 15px 20px;
		border-bottom: 1px solid #ddd;
		border-radius: 0;
		color: #333;
	}

	.nav-pills a.nav-link i {
		width: 20px;
	}

	.img-circle img {
		height: 120px;
		width: 120px;
		border-radius: 100%;
		border: 5px solid #fff;
	}

	.btn-primary {
		width: 100%;
		background: #F2BE22;
		border-color: #F2BE22;
		border-radius: 25px;
		box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);

	}

	.padding {
		padding-top: 5%;
	}

	.error {
		color: #D8000C;
		background-color: #FFBABA;
	}
</style>
<title>Thông tin cá nhân</title>

<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('cli_index')}}">Home</a>
					<i>|</i>
				</li>
				<li>Thông tin cá nhân</li>
			</ul>
		</div>
	</div>
</div>


<div class="contact" style="background: #F2BE22;">
	<div class="container" style="background: #F2BE22; padding-top: 100px; padding-bottom: 100px">
		<div class="bg-white shadow rounded-lg d-block d-sm-flex">
			<div class="profile-tab-nav border-right" style="border-radius: 5%;">
				@foreach($cus as $c)
				<div class="p-4">
					<div class="img-circle text-center mb-3">
						<img src="{!! asset('web/images/users.png')!!}" alt="Image" class="shadow">
					</div>
					<h4 class="text-center">{{$c->customer_name}}</h4>
				</div>
				<div class="nav flex-column nav-pills">
					<a class="nav-link {{(request()->route()->getName()=='profile'?'active':'')}}" href="{{route('profile')}}">
						<i class="fa fa-home text-center mr-1"></i>
						Chi Tiết Tài Khoản
					</a>
					<a class="nav-link {{(request()->route()->getName()=='change_password'?'active':'')}}" href="{{route('change_password')}}">
						<i class="fa fa-key text-center mr-1"></i>
						Đặt Lại Mật Khẩu
					</a>
					<a class="nav-link" href="{{url('/history')}}">
						<i class="fa fa-user text-center mr-1"></i>
						Lịch Sử Đặt hàng
					</a>
					<a class="nav-link" onclick="return confirm('Bạn có chắc là muốn đăng xuất?')" href="{{route('dangxuat_kh')}}" class="active styling-edit" ui-toggle-class="">
						<i class="fa fa-bell text-center mr-1"></i> Đăng Xuất
					</a>
				</div>
				@endforeach
			</div>
			<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

				@yield('profile')

			</div>
		</div>

	</div>
</div>

@endsection
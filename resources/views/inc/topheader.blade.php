<style>
	.dropbtn2 {
		background-color: #ffffff;
		border-radius: 5px;
		/* color: white; */
		padding: 0px 5px;
		font-size: 16px;
		border: none;
	}

	.dropdown {
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown-content a:hover {
		background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
		display: block;
	}

	.dropdown:hover .dropbtn2 {
		background-color: #c5d5c5;
	}
</style>
<div class="agile-main-top">
	<div class="container-fluid">
		<div class="row main-top-w3l py-2">

			<div class="col-lg-12 header-right mt-lg-0 mt-2">
				<!-- header lists -->
				<ul>
					<?php
					$cus_id = Session::get('customer_id');
					if (isset($cus_id)) { ?>
						<div class="dropdown">
							<button class="dropbtn2"><span class="fas fa-user"></span></button>
							<div class="dropdown-content">
								<a class="profile1" href="{{URL::to('profile')}}">Xem chi tiết tài khoản</a>
								<a style="color: black" href="{{url('/history')}}" class="text-black">@lang('lang.orderhistory')</a>
								<a style="color: black" href="{{route('dangxuat_kh')}}" class="text-black">@lang('lang.Logout') </a>

							</div>
						</div>

					<?php } else { ?>
						<div class="dropdown">
							<button class="dropbtn2"><span class="fas fa-user"></span></button>
							<div class="dropdown-content">
								<a href="#" style="color:black" data-toggle="modal" data-target="#exampleModal" class="text-black">@lang('lang.login') </a>
								<a style="color:black" href="#" data-toggle="modal" data-target="#exampleModal2" class="text-black"></i>@lang('lang.registration') </a>

							</div>
						</div>
					<?php } ?>
					@if(session()->has('thank'))
					<li class="text-center border-right text-black">
						<marquee><i style="color:black;"></i>

							<span class=marq>{{session('thank')}}</span><img src="{!! asset('web/images/icon-bieutuong_1.gif')!!}" width="41px" height="21px" alt="">

						</marquee>
					</li>
					@endif

				</ul>
				<!-- //header lists -->
			</div>
		</div>
	</div>
</div>
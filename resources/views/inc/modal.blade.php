<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		/* display: none; <- Crashes Chrome on hover */
		-webkit-appearance: none;
		margin: 0;
		/* <-- Apparently some margin are still there even though it's hidden */
	}

	input[type=number] {
		-moz-appearance: textfield;
		/* Firefox */
	}
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center">@lang('lang.login')</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('dangnhap')}}" method="post" id="login-form">
					@csrf
					<div class="form-group re">
						<label class="col-form-label">Email</label>
						<input type="Email" class="form-control" placeholder=" " name="email" required="">
					</div>
					<div class="form-group re">
						<label class="col-form-label">@lang('lang.password')</label>
						<input type="password" class="form-control" placeholder=" " name="password" required="" id="password1">
					</div>

					<div class="right-w3l">
						<input type="submit" style="background-color: firebrick" class="form-control" value="@lang('lang.login')">
					</div>
					<p class="text-center dont-do mt-3">
						<a href="#" data-toggle="modal" data-target="#exampleModal3">
							@lang('lang.ForgotPassword')</a>
					</p>


				</form>
				<p class="text-center dont-do mt-3">Bạn chưa có tài khoản?
					<a href="#" data-toggle="modal" data-target="#exampleModal2">
						@lang('lang.registration')</a> hoặc <a href="{{url('/login-google')}}">
						<img width="10%" alt="Đăng nhập bằng google" src="{{asset('/google.png')}}">
					</a>
				</p>
			</div>
		</div>
	</div>
</div>

<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">@lang('lang.registration')</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('dangky')}}" method="post" id="regis-form">
					@csrf
					<div class="form-group re">
						<label class="col-form-label">Họ và tên</label>
						<input type="text" class="form-control" placeholder=" " name="name">
					</div>
					<div class="form-group re">
						<label class="col-form-label">Số điện thoại</label>
						<input type="number" class="form-control" placeholder=" " name="sdt">
					</div>

					<div class="form-group re">
						<label class="col-form-label">Email</label>
						<input type="email" class="form-control" placeholder=" " name="email">
					</div>
					<div class="form-group re">
						<label class="col-form-label">@lang('lang.password')</label>
						<input type="password" class="form-control" placeholder=" " name="password" id="password">
					</div>
					<div class="form-group re">
						<label class="col-form-label">Nhập lại mật khẩu</label>
						<input type="password" class="form-control" placeholder=" " name="re_password">
					</div>
					<div class="right-w3l">
						<input type="submit" style="background-color: firebrick" class="form-control" value="Đăng ký">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">@lang('lang.comfirmPassword')</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('postlaymk')}}" method="post">
					@csrf
					<div class="form-group">
						<label class="col-form-label">Email</label>
						<input type="email" class="form-control" placeholder=" " name="email">
					</div>
					<div class="right-w3l">
						<input type="submit" style="background-color: firebrick" class="form-control" value="@lang('lang.Confirm')">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="infomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modali">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title product_quickview_title" id="">

					<span id="product_quickview_title"></span>

				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<style type="text/css">
					span#product_quickview_content img {
						width: 100%;
					}

					@media screen and (min-width: 768px) {
						.modal-dialog {
							width: 700px;
							/* New width for default modal */
						}

						.modal-sm {
							width: 350px;
							/* New width for small modal */
						}
					}

					@media screen and (min-width: 992px) {
						.modal-lg {
							width: 1200px;
							/* New width for large modal */
						}
					}
				</style>
				<div class="baotrum">
					<div class="taice1">

						<span id="product_quickview_image"></span>
						<span id="product_quickview_gallery"></span>

					</div>
					<form class="form3" method="POST" action="route{{'giohang'}}">
						@csrf
						<div id="product_quickview_value"></div>
						<div class=" taice">
							<h2><span id="product_quickview_title"></span></h2>
							<p><span class="nhanh">@lang('lang.cho_s'):</span></p>

							<div id="size"></div>
							<br>
							<?php /*<p class="nhanh" >@lang('lang.ProductPrice') : <span style="font-size: 20px; color: brown;font-weight: bold;" class="product_quickview_price"></span> (size: vừa)</p>*/ ?>

							<label class="nhanh">@lang('lang.Amont'):
								<input type="number" class="soluong cart_product_sl" min=1 value="1" name="soluong">

							</label>

							<!-- <div class="cart_product_sl">
								<span class="value-minus">-</span>
								<span class="soluong cart_product_sl" id="product_quickview_quantity" name="quantity">1</span>
								<span class="value-plus">+</span>
							</div>
							<input type="hidden" class="soluong" value=""> -->
							<!-- <input type="hidden" class="soluong cart_product_sl" min=1 value="1" name="soluong"> -->

							<p class="nhanh">@lang('lang.ProductDescription'):</p>
							<!--  <hr> -->
							<p><span id="product_quickview_desc"></span></p>
							<hr>
							<p><span id="product_quickview_content"></span></p>
							<input type="hidden" name="sl">

							<div style="margin-bottom: 10px" id="product_quickview_button"></div>
							<div id="beforesend_quickview"></div>
						</div>
					</form>

				</div>

			</div>
			<div class="modal-footer">
				<button style="text-transform: uppercase;" type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
				<button style="text-transform: uppercase;" type="button" class="btn btn-default redirect-cart">@lang('lang.goToCart')</button>
			</div>
		</div>
	</div>
</div>







@if (session()->has('message'))
<section class='alert alert-success' style="text-align: center;">{{session('message')}}</section>
@elseif (session()->has('error'))
<section class='alert alert-danger' style="text-align: center;">{{session('error')}}</section>
@endif
@if (count($errors)>0)
<section class='alert alert-danger' style="text-align: center;">
	@foreach ($errors->all() as $err)
	{{$err}}
	@endforeach
</section>
@endif
<script>
	const plus = document.querySelector(".value-plus"),
		minus = document.querySelector(".value-minus"),
		number = document.querySelector("#product_quickview_quantity")

	let a = 1;
	plus.addEventListener("click", () => {
		a++;
		number.innerText = a;
		console.log(a);
	})
	minus.addEventListener("click", () => {
		if (a > 1) {
			a--;
			number.innerText = a;
			console.log(a);
		}

	})
</script>
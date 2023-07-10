<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đơn hàng</title>
	<style>
		span.chao {
			text-transform: capitalize;
			font-family: system-ui;
			font-size: 16px;
			color: #7d3737;
		}

		span.ten {
			color: #001fff;
			margin-left: 19px;
			text-transform: capitalize;
			font-size: 19px;
		}

		.w-900 {
			max-width: 950px;
			margin: auto;
		}

		table,
		th,
		td {
			border: 1px solid black;
		}

		.container {
			background: url(public/photo-1541696490-8744a5dc0228.jfif) no-repeat center;
			background-size: cover;
			padding-bottom: 53px;
		}

		@font-face {
			font-family: 'thun11';
			font-style: normal;
			font-display: block;
			src: url('UTM Cooper Black.ttf');
		}

		@font-face {
			font-family: 'thun2';
			font-style: normal;
			font-display: block;
			src: url('Mulish-Black.ttf');
		}

		.w-1200 {
			max-width: 1200px;
			margin: auto;
		}

		.title {
			text-align: center;
			font-size: 30px;
			font-family: 'thun11';
			color: green;
			padding-top: 50px;
		}

		.thongbao {
			color: #cc2b2b;
			text-transform: uppercase;
			font-size: 20px;
			font-family: thun2;
		}

		.info {
			font-size: 17px;
			font-family: system-ui;
			color: #7d3737;
		}

		.ma {
			text-transform: capitalize;
			font-size: 18px;
		}

		span.ten1 {
			margin-left: 20px;
			font-family: system-ui;
			font-size: 19px;
			color: #35a000;
		}
	</style>
</head>

<body>
	<div class="container w-1200">
		<div class="title">
			<p>CỬA HÀNG THỨC ĂN NHANH VINAFOOD</p>
		</div>
		<div class="content w-900">
			<p><span class="chao">Chào bạn:</span><span class="ten">{{$shipping_array['customer_name']}}</span></p>
			<p class="thongbao">Chúng tôi đã xác nhận bạn đã đặt hàng tại cửa hàng chúng tôi gồm những thông tin sau đây: </p>
			<p class="info">THÔNG TIN ĐƠN HÀNG</p>
			<p class="ma">Mã đơn hàng:<span class="ten1">{{$code['order_code']}}</span></p>
			<p class="ma">Mã khuyến mãi áp dụng:<span class="ten1">{{$code['coupon_code']}}</span></p>
			<p class="ma">Phí giao hàng:<span class="ten1">{{number_format($shipping_array['fee_ship'],0,',','.')}}VND</span></p>
			<p class="ma">Dịch vụ:<span class="ten1">Đặt hàng trực tuyến</span></p>
			<p class="info">THÔNG TIN NGƯỜI NHẬN</p>
			<p class="ma">Email:
				@if ($shipping_array['shipping_email']=='')
				<span style="color: #7d3737;"> Không có</span>
				@else
				<span style="color: #7d3737;">{{$shipping_array['shipping_email']}}</span>
				@endif
			</p>
			<p class="ma">Họ tên người gửi:
				@if ($shipping_array['shipping_name']=='')
				<span style="color: #7d3737;"> Không có</span>
				@else
				<span style="color: #7d3737;">{{$shipping_array['shipping_name']}}</span>
				@endif
			</p>
			<p class="ma">Địa chỉ nhận hàng :
				@if ($shipping_array['shipping_address']=='')
				<span style="color: #7d3737;"> Không có</span>
				@else
				<span style="color: #7d3737;">{{$shipping_array['shipping_address']}}</span>
				@endif
			</p class="ma">
			<p class="ma">Số điện thoại:
				@if ($shipping_array['shipping_phone']=='')
				<span style="color: #7d3737;"> Không có</span>
				@else
				<span style="color: #7d3737;">{{$shipping_array['shipping_phone']}}</span>
				@endif
			</p>
			<p class="ma">Ghi chú đơn hàng:
				@if ($shipping_array['shipping_notes']=='')
				<span style="color: #7d3737;"> Không có</span>
				@else
				<span style="color: #7d3737;">{{$shipping_array['shipping_notes']}}</span>
				@endif
			</p>
			<p class="ma">Hình thức thanh toán:
				@if ($shipping_array['shipping_method']==0)
				<span style="color: #7d3737;"> Chuyển khoản ngân hàng</span>
				@else
				<span style="color: #7d3737;">Tiền mặt</span>
				@endif
			</p>
			<p style="color: #7d3737;">Nếu thông tin người nhận hàng không có chúng tôi sẽ liên hệ với người đặt hàng để trao đổi về thông tin đông hya2ng đã đặt </p>
			<h4 style="text-transform:uppercase; color:#7d3737;">Sản phẩm đã được chúng tôi xác nhận</h4>
			<table class="table table-striped">
				<thead class="dau">
					<tr>
						<th>Sản phẩm</th>
						<th>giá tiền</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					@php
					$sub_total=0;
					$total =0;
					@endphp
					@foreach ($cart_array as $key => $cart)
					@php
					$sub_total = $cart['product_qty']*$cart['product_price'];
					$total += $sub_total;
					@endphp
					<tr>
						<td>{{$cart['product_name']}}</td>
						<td>{{number_format($cart['product_price'],0,',','.')}}VND</td>
						<td>{{$cart['product_qty']}}</td>
						<td>{{number_format($sub_total,0,',','.')}}VND</td>
					</tr>

					@endforeach
					<tr>
						@if($sub > 200000)
						@php

						$shipping_array['free'] = 0;
						$total =$sub + $shipping_array['free']

						@endphp

						@else
						@php
						$total =$sub + $shipping_array['free'];
						@endphp
						@endif
						<td colspan="4" align="rigth">Tổng thanh toán: {{number_format($total,0,',','.')}}VND</td>
					</tr>
				</tbody>
			</table>
		</div>
		<p class="ma w-900" style="color:#7d3737;">Xem lịch sử đơn hàng tại đây: <a target="_blank" href="{{url('/history')}}">Lịch sữ đơn hàng của bạn</a></p>
		<p class="ma w-900" style="color:#7d3737;">Mọi chi tiết xin liên hệ website tại: <a target="_blank" href="{{url('/cli/index')}}">shop</a>, hoặc liên hệ qua hotline:19005689, Xin cảm ơn quý khác đã đặt hàng tại shop chúng tôi.</p>
	</div>
	</div>

</body>

</html>
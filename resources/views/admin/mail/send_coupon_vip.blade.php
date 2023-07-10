<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body {
		font-family: Arial;
	}

	.coupon {
		border: 5px dotted #bbb;
		width: 80%;
		border-radius: 15px;
		margin: 0 auto;
		max-width: 600px;
	}

	.container {
		padding: 2px 16px;
		background-color: #f1f1f1;
	}

	.promo {
		background: #ccc;
		padding: 3px;
	}

	.expire {
		color: red;
	}
	p.code {
    text-align: center;
    font-size: 20px;
	}
	p.expire {
    text-align: center;
	}
	h2.note {
    text-align: center;
    font-size: large;
    text-decoration: underline;
	}
</style>
</head>
<body>

	<div class="coupon">

		<div class="container">
			<h3 style="text-align: center;">Mã khuyến mãi từ <a target="_blank" href="http://127.0.0.1:8000/cli/index">VinaFood</a>
			</h3>
		</div>
		<div class="container" style="background-color:white">
            
			<h2 class="note"><b><i>
				@if ($coupon['coupon_condition']==1)
					Giảm {{$coupon['coupon_number']}}%
				@else
				    Giảm {{number_format($coupon['coupon_number'],0,',','.')}} VNĐ
				@endif
			    cho tổng đơn hàng đặt mua</i></b></h2> 
		</div>
		<div class="container">
			<p class="code">Sử dụng Code: <span class="promo">{{$coupon['coupon_code']}}</span>. Chỉ có {{$coupon['coupon_time']}} mã giảm giá, còn chần chờ gì mà không nhanh tay đặt món để sử dụng mã.</p>
			<p class="expire">Ngày bắt đầu : {{$coupon['start_day']}}  <br> Ngày hết hạn code: {{$coupon['end_day']}}</p>
		</div>

	</div>

</body>
</html> 

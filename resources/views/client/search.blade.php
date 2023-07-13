@extends('client/layout_cli')
@section('content')
<title>Kết quả tìm kiếm</title>
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			@lang('lang.search')</h3>
		<?php $message = Session::get('message');
		if (isset($message)) { ?>
			<div class="alert alert-primary" role="alert">
				Kết quả tìm kiếm: <?php echo $dem; ?> sản phẩm
			</div>
		<?php } ?>
		<!-- //tittle heading -->
		<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3">

			<div class="row">

				@foreach($search as $s)
				<div class="col-md-4 product-men mt-5" id="home">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item text-center">

							<a href="{{route('cli_detail',$s->product_id)}}">
								<div class="scale-img">
									<img class="pro_img4" src="{!!asset('images/'.$s->product_image)!!}" alt="">
							</a>
						</div>

					</div>
					<div class="item-info-product text-center border-top mt-4">
						<h4 class="pt-1">
							<a href="{{route('cli_detail',$s->product_id)}}">{{$s->product_name}}</a>
						</h4>
						<div class="info-product-price my-2">
							<span class="item_price">{{number_format($s->product_price,0,'.','.')}} VNĐ</span>
						</div>
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form>
								@csrf
								<fieldset>
									<input type="button" data-toggle="modal" data-target="#xemnhanh" style="background: tomato" value="@lang('lang.quickview')" class="btn btn-default xemnhanh" data-id_soluong="{{$s->soluong}}" data-id_product="{{$s->product_id}}">
								</fieldset>
						</div>

					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- //fourth section -->
</div>





@stop
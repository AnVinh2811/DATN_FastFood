@extends('client/layout_cli')
@section('content')
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
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<div class="row">
							@foreach($search as $s)
							<div class="col-md-4 product-men">
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
										<a href="single.html">{{$s->product_name}}</a>
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
		</div>

		<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">

			<div class="side-bar p-sm-4 p-3">
				<div class="sapxep">

				</div>
				<div class="search-hotel border-bottom py-2">



				</div>

				<div class="left-side border-bottom py-2">
					<h3 class="agileits-sear-head mb-3">@lang('lang.ProductType')</h3>
					<ul>
						@foreach($cate as $c)
						<li class="li">
							<a href="{{route('list_pro',$c->category_id)}}"><span class="span">{{$c->category_name}}</span></a>
						</li>
						@endforeach

					</ul>
				</div>

				<div class="f-grid py-2">
					<h3 class="agileits-sear-head mb-3">@lang('lang.SelleingProduct')</h3>
					<div class="box-scroll">
						<div class="scroll">
							<div class="row">
								@foreach($bestsell as $b)
								<div class="col-lg-3 col-sm-2 col-3 left-mar">
									<a href="{{route('cli_detail',$b->product_id)}}">
										<img src="{!! asset('images/'.$b->product_image)!!}" alt="" class="img-fluid">
									</a>
								</div>
								<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
									<a href="{{route('cli_detail',$b->product_id)}}">{{$b->product_name}}</a>
									<a href="{{route('cli_detail',$b->product_id)}}" class="price-mar mt-2">{{number_format($b->product_price)}} VNĐ</a>
								</div>
								@endforeach
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- //best seller -->
		</div>
		<!-- //product right -->
	</div>
</div>
</div>
</div>




@stop
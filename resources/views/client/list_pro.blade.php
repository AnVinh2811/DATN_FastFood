@extends('client/layout_cli')
@section('content')
<style>
	@import url(https://fonts.googleapis.com/css?family=Raleway:400,500);

	.snip1143 {
		font-family: 'Raleway', Arial, sans-serif;
		text-align: center;
		text-transform: uppercase;
		font-weight: 500;
	}

	.snip1143 * {
		box-sizing: border-box;
		-webkit-transition: all 0.35s ease;
		transition: all 0.35s ease;
	}

	.snip1143 li {
		display: inline-block;
		list-style: outside none none;
		margin: 0 1.5em;
		overflow: hidden;
	}

	.snip1143 a {
		padding: 0.3em 0;
		color: black;
		position: relative;
		display: inline-block;
		letter-spacing: 1px;
		margin: 0;
		text-decoration: none;
	}

	.snip1143 a:before,
	.snip1143 a:after {
		position: absolute;
		-webkit-transition: all 0.35s ease;
		transition: all 0.35s ease;
	}

	.snip1143 a:before {
		top: 100%;
		display: block;
		height: 3px;
		width: 100%;
		content: "";
		background-color: #c0392b;
	}

	.snip1143 a:after {
		padding: 0.3em 0;
		position: absolute;
		top: 100%;
		left: 0;
		content: attr(data-hover);
		color: #F24C3D;
		white-space: nowrap;
	}

	.snip1143 li:hover a,
	.snip1143 .current a {
		transform: translateY(-100%);
	}
</style>
<title>{{$meta_title}}</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short" style="color: #fff;">
				<li>
					<a href="{{route('cli_index')}}">Home</a>
					<i>|</i>
				</li>
				<li>{{$meta_title}}</li>
			</ul>
		</div>
	</div>
</div>
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<ul class="snip1143" style="padding: 2%; font-weight: bolder; font-size: 15px;">
			@foreach($cate as $c)
			<!-- <li class="current"> -->
			<li>
				<a href="{{route('list_pro',$c->category_id)}}" data-hover="{{$c->category_name}}">{{$c->category_name}}</a>
			</li>
			@endforeach

		</ul>
		<div class="row canh">
			<!-- product left -->
			<!-- <div class="agileinfo-ads-display col-lg-9"> -->
			<div class="wrapper">
				<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
					{{$meta_title}}
				</h3>
				<!-- first section -->
				@if (session()->has('thongbao'))
				<section class='alert alert-success' style="text-align: center;">{{session('thongbao')}}</section>

				@endif
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3">

					<div class="row">

						@foreach($product_list as $s1)
						<div class="col-md-4 product-men mt-5" id="home">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">

									<a href="{{route('cli_detail',$s1->product_id)}}">
										<div class="scale-img">
											<?php
											$gia = ($s1->gia_km * 100) / $s1->product_price;
											?>
											@if($s1->gia_km < $s1->product_price && $s1->gia_km >0)
												<span class="badge badge-pill badge-danger ban">-{{ROUND($gia,1)}}%</span>
												@endif
												<img class="pro_img" src="{!! asset('images/'.$s1->product_image)!!}" alt="">
										</div>
									</a>

									<?php
									$tong = 0;
									if ($s1->pro_rating) {
										$tong = round(($s1->pro_rating_number) / ($s1->pro_rating));
									}

									?>
									<ul class="marg">
										<li>

											@for($i=1;$i<6;$i++) @if($i<=$tong && $tong>0)
												<i class="fas fa-star actise"></i>
												@else
												<i class="fas fa-star"></i>
												@endif

												@endfor
										</li>
									</ul>

								</div>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="{{route('cli_detail',$s1->product_id)}}">{{$s1->product_name}}</a>
									</h4>
									<br>
									<?php
									$giatien = $s1->product_price - $s1->gia_km
									?>
									<div class="info-product-price my-2">
										<span class="item_price">{{number_format($giatien,0,'.','.')}} VNĐ</span>
										@if($s1->gia_km < $s1->product_price && $s1->gia_km > 0)
											<del>{{number_format($s1->product_price,0,'.','.')}} VNĐ</del>
											@endif
									</div>
									<br>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form>
											@csrf
											<fieldset>
												<input type="button" data-toggle="modal" data-target="#xemnhanh" style="background: tomato" value="@lang('lang.quickview')" class="btn btn-default xemnhanh" data-id_product="{{$s1->product_id}}" name="add-to-cart">
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>



						@endforeach
					</div>
					<!-- {{$product_list->appends($_GET)->links()}} -->
					<div class="phantrang">
						{!! $product_list->links('pagination::bootstrap-4') !!}
					</div>

				</div>
			</div>
			<!-- </div> -->
			<!-- <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0 side">

				
				<div class="containe">
					<div class="dropdown" style="padding-bottom: 7px;">
						<button class="dropbtn">Sắp xếp</button>
						<div class="dropdown-content">
							<a href="{{request()->fullUrlWithQuery(['orderby' => 'desc'])}}">Sản phẩm mới nhất</a>
							<a href="{{request()->fullUrlWithQuery(['orderby' => 'asc'])}}">Sản phẩm cũ nhất</a>
							<a href="{{request()->fullUrlWithQuery(['orderby' => 'primax'])}}">Giá giảm dần</a>
							<a href="{{request()->fullUrlWithQuery(['orderby' => 'primin'])}}">Giá tăng dần</a>
						</div>
					</div>
					<div class="search-hotel border-bottom py-2">
						<form method="get" action="{{Request::fullUrl()}}" id="fo">
							<input type="search" placeholder="Món ăn bạn muốn tìm ?" name="keyword" required="">
							<input type="submit" value=" ">
						</form>
					</div>

					<div class="range border-bottom py-2">
						<h3 class="agileits-sear-head mb-3" style="text-align: center;">@lang('lang.ProductPrice')</h3>
						<div class="w3l-range join" style="text-align: center;">
							<ul>
								<li>
									<a class="giatri" href="{{request()->fullUrlWithQuery(['price' => 1])}}">Dưới 10.000 VNĐ</a>
								</li>
								<li class="my-1">
									<a class="giatri" href="{{request()->fullUrlWithQuery(['price' => 2])}}">10.000 VNĐ - 15.000 VNĐ</a>
								</li>
								<li>
									<a class="giatri" href="{{request()->fullUrlWithQuery(['price' => 3])}}">15.000 VNĐ - 20.000 VNĐ</a>
								</li>
								<li class="my-1">
									<a class="giatri" href="{{request()->fullUrlWithQuery(['price' => 4])}}">20.000 VNĐ - 30.000 VNĐ</a>
								</li>
								<li class="my-1">
									<a href="{{request()->fullUrlWithQuery(['price' => 5])}}">30.000 VNĐ - 40.000 VNĐ</a>
								</li>
								<li class="my-1">
									<a class="giatri" href="{{request()->fullUrlWithQuery(['price' => 6])}}">40.000 VNĐ - 50.000 VNĐ</a>
								</li>
								<li class="my-1">
									<a class="giatri" href="{{request()->fullUrlWithQuery(['price' => 7])}}">Trên 50.000 VNĐ</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="customer-rev border-bottom left-side py-2">
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3" style="text-align: center;">@lang('lang.SelleingProduct')</h3>
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
				</div>
			</div> -->

		</div>
	</div>
</div>






@stop
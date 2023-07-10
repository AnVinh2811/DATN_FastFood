@extends('client/layout_cli')
@section('content')
@include('client.pop_up')
	<title>VinaFood</title>
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			@lang('lang.ourProduct')</h3>
		<div id="cart"></div>


		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-12">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">

						<div class="row" id="list-index">

							@foreach($product as $p)



							<div class="col-md-4 product-men mt-5">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item text-center">
										<a id="wishlist_producturl{{$p->product_id}}" href="{{route('cli_detail',$p->product_id)}}">
											<div class="scale-img">
												<?php
												$gia = ($p->gia_km * 100) / $p->product_price;
												?>
												@if($p->gia_km < $p->product_price && $p->gia_km >0)
													<span class="badge badge-pill badge-danger ban">-{{ROUND($gia,1)}}%</span>
													@endif
													<img id="wishlist_productimage{{$p->product_id}}" class="pro_img" src="{!! asset('images/'.$p->product_image)!!}" alt="">

											</div>
										</a>

										<?php

										$tong = 0;
										if ($p->pro_rating) {
											$tong = round(($p->pro_rating_number) / ($p->pro_rating));
										}

										?>
										<ul class="marg">
											<li>

												@for($i=1;$i<6;$i++) @if($i <=$tong && $tong>0)
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
											<a href="{{route('cli_detail',$p->product_id)}}">{{$p->product_name}}</a>
										</h4>
										<?php
										$giatien = $p->product_price - $p->gia_km
										?>
										<div class="info-product-price my-2">
											<span class="item_price">{{number_format($giatien,0,'.','.')}} VNĐ</span>
											@if($p->gia_km < $p->product_price && $p->gia_km > 0)
												<del>{{number_format($p->product_price,0,'.','.')}} VNĐ</del>
												@endif
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form>
												@csrf
												<fieldset>

													<input type="button" data-toggle="modal" data-target="#xemnhanh" value="@lang('lang.quickview')" style="background: tomato" class="btn btn-default xemnhanh" data-id_soluong="{{$p->soluong}}" data-id_product="{{$p->product_id}}">

												</fieldset>
											</form>

										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="phantrang">
							{!! $product->links('pagination::bootstrap-4') !!}
						</div>
					</div>
					<div class="quangcao">

						<div class="row">
							<div class="rundt wrap_1200">
								@foreach($quangcao as $quang)
								<a href="{{$quang->link}}"><img class="hinh" height="200px" src="{!! asset('uploads/quangcao/'.$quang->hinh_quangcao)!!}" alt=""></a>
								@endforeach
							</div>
						</div>

					</div>

					<!-- <div class="run1 cach">

						@foreach($toping as $t)
						<?php

						$gia = ($t->gia_km * 100) / $t->product_price;
						$tong = 0;
						if ($t->pro_rating) {
							$tong = round(($t->pro_rating_number) / ($t->pro_rating));
						}
						$giatien = $t->product_price - $t->gia_km;

						?>
						@if($t->gia_km < $t->product_price && $t->gia_km >0)
							<span class="badge badge-pill badge-danger ban">-{{ROUND($gia,1)}}%</span>
							@endif
							<a href="{{route('cli_detail',$t->product_id)}}">
								<div class="baoca">
									<div class="scale-img">
										<img class="hi" src="{!! asset('images/'.$t->product_image)!!}" alt="">
									</div>
									<h4 class="text-center">
										<a style="color:black; text-transform: uppercase; font-size:15px" href="{{route('cli_detail',$t->product_id)}}">{{$t->product_name}}</a>
									</h4>
									<p class="p-tien"><span class="item_price">{{number_format($giatien,0,'.','.')}} VNĐ</span>
										@if($t->gia_km < $t->product_price && $t->gia_km > 0)
											<del>{{$t->product_price}} VNĐ</del>
											@endif</p>
									<form>
										@csrf
										<fieldset>

											<input type="button" data-toggle="modal" data-target="#xemnhanh" value="@lang('lang.quickview')" class="btn btn-default panhanh xemnhanh" data-id_soluong="{{$t->soluong}}" data-id_product="{{$t->product_id}}">

										</fieldset>
									</form>
								</div>
							</a>
							@endforeach

					</div> -->



					<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 sellchay1">@lang('lang.SelleingProduct')</h3>

					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">

						<div class="row">
							@foreach($sp as $b)
							<div class="col-md-4 product-men mt-5 wid">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item text-center">

										<a href="{{route('cli_detail',$b->product_id)}}">
											<div class="scale-img">
												<?php
												$gia = ($b->gia_km * 100) / $b->product_price;
												?>
												@if($b->gia_km < $b->product_price && $b->gia_km >0)
													<span class="badge badge-pill badge-danger ban">-{{ROUND($gia,1)}}%</span>
													@endif
													<img class="pro_img" src="{!! asset('images/'.$b->product_image)!!}" alt="">

													<!--  -->

											</div>
										</a>

										<?php

										$tong = 0;
										if ($b->pro_rating) {
											$tong = round(($b->pro_rating_number) / ($b->pro_rating));
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
											<a href="{{route('cli_detail',$b->product_id)}}">{{$b->product_name}}</a>
										</h4>
										<?php
										$giatien = $b->product_price - $b->gia_km
										?>
										<div class="info-product-price my-2">
											<span class="item_price">{{number_format($giatien,0,'.','.')}} VNĐ</span>
											@if($b->gia_km < $b->product_price && $b->gia_km > 0)
												<del>
												{{number_format($b->product_price,0,'.','.')}} VNĐ
												</del>
												@endif
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form>
												@csrf
												<fieldset>

													<input type="button" data-toggle="modal" data-target="#xemnhanh" style="background: tomato" value="@lang('lang.quickview')" class="btn btn-default xemnhanh" data-id_soluong="{{$b->soluong}}" data-id_product="{{$b->product_id}}">

												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
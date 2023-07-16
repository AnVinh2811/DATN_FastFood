@extends('client/layout_cli')
@section('content')
<title>{{$meta_title}} | {{$product_cate}}</title>
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('cli_index')}}">Home</a>
					<i>|</i>
				</li>
				<li><a href="{{url('/list-pro/'.$cate_id)}}">{{$product_cate}}</a><i>|</i></li>
				<li class="breadcrumb-item active" aria-current="page">{{$meta_title}}</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
@foreach($detail as $key => $value)
<div class="bao_detail">
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2 det">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				@lang('lang.ProductDetail')</h3>

			<!-- //tittle heading -->
			<div class="bao_card">
				<div class="row ">
					<div class="col-lg-5 col-md-8 single-right-left ">
						<div class="grid images_3_of_2">
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="{{asset('images/'.$value->product_image)}}">
										<div class="thumb-image">
											<img src="{{asset('images/'.$value->product_image)}}" data-imagezoom="true" class="img-fluid" alt="">
										</div>
									</li>
									<!-- @foreach($img_detail as $d)
									<li data-thumb="{{asset('upload_img/'.$d->images)}}">
										<div class="thumb-image">
											<img src="{{asset('upload_img/'.$d->images)}}" data-imagezoom="true" class="img-fluid" alt="">
										</div>
									</li>
									@endforeach -->
								</ul>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-7 single-right-left simpleCart_shelfItem">
						<div class="baoten">
							<h3 class="mb-3">{{$value->product_name}}</h3>
						</div>
						<?php
						$gia = ($value->gia_km * 100) / $value->product_price;
						?>
						@if($value->gia_km < $value->product_price && $value->gia_km >0)

							<span class="badge badge-pill badge-danger ban1">giảm {{ROUND($gia,1)}}%</span>
							@endif
							<p class="mb-3">
							<div class="bo">
								<span class="item_price"><span style="font-weight: bolder;" class="pri">Giá: </span>{{number_format($value->product_price,0,'.','.')}} VNĐ</span>
							</div>
							<span class="loai" style="font-family:unset;font-weight: 700;">Loại Sản phẩm: </span><span>{{$value->category_name}}</span><br><br>
							<!-- <span class="loai" style="font-family:unset;font-weight: 700;">Tồn Kho: </span><span>{{$value->soluong}} sản phẩm</span> -->
							<span class="loai" style="font-family:unset;font-weight: 700;">Đã bán: </span><span>{{$value->product_sold}}</span>
							<div class="single-infoagile duoi">
								<ul>
									<li class="mb-3">
										<p class="mota" style="font-size: 18px;font-family:unset;font-weight: 600;">Mô tả:</p>
										<p class="baomota"><?= htmlspecialchars_decode($value->product_desc) ?></p>
									</li>
								</ul>
							</div>

							<div id="fb-root">

							</div>
							<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="RZrvc0c5">
							</script>

							<div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="small">
								<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}" class="fb-xfbml-parse-ignore">Chia sẻ</a>
							</div>

							<br>
							<br>

							<div class="occasion-cart">
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form>
										@csrf
										<fieldset class="chon">
											<ul>
												<li class="mb-3">
													<p><span style="font-family:unset;font-weight: 700;">Chọn Size</span></p>
													<div class="bao2">
														@foreach($size as $id=>$data)
														<div class="bao3">
															<input type="radio" class="cart_product_size" name="size" value="{{$data->attribute->value}}">{{$data->attribute->value}}<br>
															<?php
															$tien = $value->product_price - $value->gia_km;
															$n = $tien - (($tien * 20) / 100);
															$l = $tien + (($tien * 20) / 100);
															if ($data->attribute->value == "Nhỏ") { ?>

																(<span style="color:red;font-size:13px;font-weight: bold;">{{number_format($n,0,'.','.')}} <span style="font-size:9px"></span></span>)
															<?php } elseif ($data->attribute->value == "Lớn") { ?>
																(<span style="color:red;font-size:13px;font-weight: bold;">{{number_format($l,0,'.','.')}} <span style="font-size:9px;"></span> </span>)

															<?php } else { ?>
																(<span style="color:red;font-size:13px;font-weight: bold;">{{number_format($tien,0,'.','.')}} <span style="font-size:9px;"></span></span>)
															<?php } ?>

														</div>
														@endforeach
													</div>
												</li>

												<li>
													<p><span>@lang('lang.soluong')</span></p>
													<div class="sl">
														<input type="number" class="soluong cart_product_sl" min="1" value="1" name="soluong">
													</div>
												</li>

												<li>
													<input type="button" value="@lang('lang.addToCard')" class="btn btn-nut add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
													<span id="beforesend_quickview"></span>
												</li>

												<li>
													<div id="product_quickview_button"></div>
												</li>
											</ul>
											<input type="hidden" value="{{$value->soluong}}" class="cart_soluong">
										</fieldset>
									</form>
								</div>
							</div>

							<p style="font-size: 20px;color:#000000">@lang('lang.danggia_sao')</p>
							<ul class="list-inline rating" title="Average Rating">
								@for($count=1; $count<=5; $count++) @php if($count<=$rating){ $color='color:#ffcc00;' ; } else { $color='color:#ccc;' ; } @endphp <li title="star_rating" id="{{$value->product_id}}-{{$count}}" data-index="{{$count}}" data-product_id="{{$value->product_id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
									@endfor
							</ul>
					</div>
				</div>
			</div>

			<!-- <div class="post-comments">
				<ul class="media-list comments-list m-bot-50 clearlist">
					
					<form method="POST" id="commentForm">
						@csrf
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control name" placeholder="Tên" required />
						</div>
						<div class="form-group">
							<textarea name="comment" id="comment" class="form-control comment" placeholder="Nội dung" rows="5" required></textarea>
						</div>
						<span id="message"></span>
						<br>
						<div class="form-group">
							<input type="hidden" name="commentId" class="commentId" id="commentId" value="0" />
							<input type="hidden" name="pro_id" id="pro_id" class="pro_id" value="{{$value->product_id}}">
							<input type="submit" name="submit" id="submit" class="btn btn-color" value="Gửi bình luận" />
						</div>
					</form>
					<li id="binhluan">

					</li>
				</ul>
			</div> -->
		</div>
	</div>

	<div class="relate wrap-1200">
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 patop">
			@lang('lang.sp_lienquan')</h3>
		<div class="run2 cach">
			@foreach($related_product as $t)
			<?php

			$gia = ($t->gia_km * 100) / $t->product_price;
			$tong = 0;
			if ($t->pro_rating) {
				$tong = round(($t->pro_rating_number) / ($t->pro_rating));
			}
			$giatien = $t->product_price - $t->gia_km;

			?>
			@if($t->gia_km < $t->product_price && $t->gia_km >0)
				<!-- <span class="badge badge-pill badge-danger ban">-{{ROUND($gia,1)}}%</span> -->
				@endif
				<a href="{{route('cli_detail',$t->product_id)}}">
					<div class="baoca1">
						<div class="scale-img">
							<img class="hi2" src="{!! asset('images/'.$t->product_image)!!}" alt="">
						</div>
						<h4 class="text-center">
							<a class="chude" style="color:black;text-transform: uppercase;" href="{{route('cli_detail',$t->product_id)}}">{{$t->product_name}}</a>
						</h4>
						<p class="p-tien"><span class="item_price">{{number_format($giatien,0,'.','.')}} VNĐ</span>
							@if($t->gia_km < $t->product_price && $t->gia_km > 0)
								<del>{{$t->product_price}} VNĐ</del>
								@endif</p>
					</div>
				</a>
				@endforeach
		</div>
	</div>
</div>
@endforeach
@endsection
@section('script')
<script>
	const size = document.querySelectorAll('.cart_product_size');
	size[1].setAttribute('checked', true);
</script>
@endsection
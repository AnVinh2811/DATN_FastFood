<style>
	.gmail {
		margin: 40px auto;
		background: #E41F1A;
		width: 300px;
		height: 200px;
		border-radius: 40px;
		position: relative;
		box-shadow: 0 0 10px 3px black;
	}

	.gmail:after {
		content: '';
		position: absolute;
		left: 40px;
		top: 55px;
		border-bottom: 85px solid #E8E6D6;
		border-left: 110px solid #E8E6D6;
		border-right: 110px solid #9B9C91;
		border-top: 60px solid transparent;
		width: 0;
	}

	.gmail:before {
		content: '';
		position: absolute;
		left: 35px;
		top: 0px;
		border-top: 65px solid #E8E6D6;
		border-left: 115px solid transparent;
		border-right: 115px solid transparent;
		width: 0;
	}
</style>
 
<footer>
	<div class="footer-top-first" style="background: #F29727;">
		<div class="container py-md-5 py-sm-4 py-3">
			<!-- footer first section -->
			<h2 class="footer-top-head-w3l font-weight-bold mb-2">VinaFood</h2>

			<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
				<div class="col-md-4 offer-footer my-md-0 my-4">
					<div class="row">
						<div class="col-4 icon-fot">
						<i class="fas fa-thumbs-up"></i>
						</div>
						<div class="col-8 text-form-footer">
							<a href="http://127.0.0.1:8000/cli_poli/5">
								<h3>Phí ship rẻ</h3>
							</a>
							<p></p>
							<p>Miễn phí ship cho đơn hàng từ 200.000 VNĐ trở lên</p>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 offer-footer my-md-0 my-4">
					<div class="row">
						<div class="col-4 icon-fot">
							<i class="fas fa-shipping-fast"></i>
						
						</div>
						<div class="col-8 text-form-footer">
							<a href="http://127.0.0.1:8000/cli_poli/4">
								<h3>Giao hàng nhanh chóng</h3>
							</a>
							<p></p>
							<p>Trên địa bàn TP.Hồ Chí Minh</p>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 offer-footer my-md-0 my-4">
					<div class="row">
						<div class="col-4 icon-fot">
						<i class="fas fa-barcode"></i>	
							
						</div>
						<div class="col-8 text-form-footer">
							<a href="http://127.0.0.1:8000/cli_poli/3">
								<h3>Nhiều lựa chọn</h3>
							</a>
							<p></p>
							<p>Kích thước, Giá cả</p>
							<p></p>
						</div>
					</div>
				</div>

			</div>
			<!-- //footer second section -->
		</div>
	</div>
	<!-- footer third section -->
	<div class="w3l-middlefooter-sec" style="background: #22A699;">
		<div class="container py-md-5 py-sm-4 py-3">
			<div class="row footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-md-3 col-sm-6 footer-grids">
					<h3 class=" font-weight-bold mb-3" style="color:black;font-weight:bold">@lang('lang.ProductType')</h3>
					<ul>
						@foreach($category as $ca)
						<li class="mb-3">
							<a href="{{URL::to('list-pro/'.$ca->category_id)}}">{{$ca->category_name}} </a>
						</li>
						@endforeach
					</ul>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
					<h3 class="font-weight-bold mb-3" style="color:black;font-weight:bold">@lang('lang.Quicklink')</h3>
					<ul>
						<li class="mb-3">
							<a href="{{URL::to('cli/gioithieu')}}">@lang('lang.introduce')</a>
						</li>
						<li class="mb-3">
							<a href="{{URL::to('lien-he')}}">@lang('lang.contact')</a>
						</li>
						<li class="mb-3">
							<a href="help.html">@lang('lang.Menu')</a>
						</li>
						<li class="mb-3">
							<a href="{{URL::to('danh-muc-bai-viet/'.$cate_post1[0]->cate_post_slug)}}">@lang('lang.post')</a>
						</li>
						<li class="mb-3">
							<a href="{{route('cli_index')}}">@lang('lang.home')</a>
						</li>

					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
					<h3 class=" font-weight-bold mb-3" style="color:black;font-weight:bold">@lang('lang.contact')</h3>
					<ul>
						<li class="mb-3">
							<a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5178266801163!2d106.69877667469706!3d10.771594989376862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1688992436459!5m2!1svi!2s">
								<i class="fas fa-map-marker"></i>65 Huỳnh Thúc Kháng, Bến Nghé, quận 1, Thành phố Hồ Chí Minh</a>
						</li>
						<li class="mb-3">
							<i class="fas fa-mobile"></i> +84 817500095
						</li>
						<li class="mb-3">
							<i class="fas fa-envelope-open"></i>
							<a href="mailto:example@mail.com">0306201354@caothang.edu.vn</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
					<div class="footer-grids  w3l-socialmk mt-3">
					<div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5178266801163!2d106.69877667469706!3d10.771594989376862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1688992436459!5m2!1svi!2s" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
					</div>
					<!-- //social icons -->
				</div>
			</div>
			<!-- //quick links -->
		</div>
	</div>

</footer>
<!-- //footer -->
<!-- copyright -->
<div class="copy-right py-3">
	<div class="container">
		<p class="text-center text-white">Copyright © 2023 VinaFood </p>
	</div>
</div>
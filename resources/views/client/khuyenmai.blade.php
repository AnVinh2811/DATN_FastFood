@extends('client/layout_cli')
@section('content')
<title>Khuyến Mãi</title>
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
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('cli_index')}}">Home</a>
					<i>|</i>
				</li>
				<li>Khuyến Mãi</li>
			</ul>
		</div>
	</div>
</div>
<div class="contact" style="background:#F2BE22; padding-bottom: 150px;">
	<br><!--<br>
    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        @lang('lang.intro')</h3> -->
	<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
		Mã Khuyến Mãi
	</h3>
	<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3">

		<div class="row">
			<div class="col-md-6 product-men mt-5" id="home">
				<div class="men-thumb-item text-center">
					<div>
						<a href="{{route('list_pro',['id'=>$cate->first()])}}"><img class="pro_img3" src="{{asset('web/images/giam40k.jpg')}}" alt="" width=""></a>
					</div>
				</div>
			</div>
			
			<div class="col-md-6 product-men mt-5" id="home">
				<div class="men-thumb-item text-center">
					<div>
						<a href="{{route('list_pro',['id'=>$cate->first()])}}"><img class="pro_img3" src="{{asset('web/images/giam100k.jpg')}}" alt="" width=""></a>
					</div>
				</div>
			</div>

			<div class="col-md-6 product-men mt-5" id="home">
				<div class="men-thumb-item text-center">
					<div>
						<a href="{{route('list_pro',['id'=>$cate->first()])}}"><img class="pro_img3" src="{{asset('web/images/flashsale77.jpg')}}" alt="" width=""></a>
					</div>
				</div>
			</div>

			<div class="col-md-6 product-men mt-5" id="home">
				<div class="men-thumb-item text-center">
					<div>
						<a href="{{route('list_pro',['id'=>$cate->first()])}}"><img class="pro_img3" src="{{asset('web/images/cntnt7.jpg')}}" alt="" width=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
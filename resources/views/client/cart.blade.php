@extends('Client.layout_cli')
@section('content')
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{route('cli_index')}}">Home</a>
						<i>|</i>
					</li>
					<li>@lang('lang.cart')</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="baocart2">
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				@lang('lang.cart')
			</h3>
			<div class="checkout-right">
				<?php
				if ((session('cart'))) { ?>
					<h4 class="mb-sm-4 mb-3">@lang('lang.your_cart'):
						<span>{{count(session('cart'))}} @lang('lang.product')</span>
					</h4>
				<?php } else { ?>
					<h4 class="mb-sm-4 mb-3">@lang('lang.your_cart'):
						<span>0 @lang('lang.product')</span>
					</h4>

				<?php } ?>
				<?php
				$message = Session::get('message1');
				if (isset($message)) {
					echo $message;
				}
				?>
				<div class="table-responsive shopping" id="review">
				</div>
			</div>
		</div>
		@stop
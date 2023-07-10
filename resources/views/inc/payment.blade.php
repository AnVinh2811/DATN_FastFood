<script src="{!! asset('web/js/jquery-2.2.3.min.js')!!}"></script>
<!-- //jquery -->

<!-- nav smooth scroll -->
<script type="text/javascript">
	$(".remove-from-cart").click(function(e) {
		e.preventDefault();

		var ele = $(this);

		if (confirm("bạn có chắc muốn xóa không")) {
			$.ajax({
				url: '{{ url('
				remove - from - cart ') }}',
				method: "DELETE",
				data: {
					_token: '{{ csrf_token() }}',
					id: ele.attr("data-id")
				},
				success: function(response) {
					window.location.reload();

					// alert('đã xóa sản phẩm ra khỏi giỏ hàng');
				}
			});
		}
	});
</script>
<script>
	$(document).ready(function() {
		$(".dropdown").hover(
			function() {
				$('.dropdown-menu', this).stop(true, true).slideDown("fast");
				$(this).toggleClass('open');
			},
			function() {
				$('.dropdown-menu', this).stop(true, true).slideUp("fast");
				$(this).toggleClass('open');
			}
		);
	});
</script>
<!-- //nav smooth scroll -->

<!-- popup modal (for location)-->
<script src="{!! asset('web/js/jquery.magnific-popup.js')!!}"></script>
<script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

	});
</script>
<!-- //popup modal (for location)-->

<!-- cart-js -->
<script src="{!! asset('web/js/minicart.js')!!}"></script>
<script>
	paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

	paypals.minicarts.cart.on('checkout', function(evt) {
		var items = this.items(),
			len = items.length,
			total = 0,
			i;

		// Count the number of each item in the cart
		for (i = 0; i < len; i++) {
			total += items[i].get('quantity');
		}

		if (total < 3) {
			alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
			evt.preventDefault();
		}
	});
</script>
<!-- //cart-js -->

<!-- password-script -->
<script>
	window.onload = function() {
		document.getElementById("password1").onchange = validatePassword;
		document.getElementById("password2").onchange = validatePassword;
	}

	function validatePassword() {
		var pass2 = document.getElementById("password2").value;
		var pass1 = document.getElementById("password1").value;
		if (pass1 != pass2)
			document.getElementById("password2").setCustomValidity("Passwords Don't Match");
		else
			document.getElementById("password2").setCustomValidity('');
		//empty string means no validation error
	}
</script>
<!-- //password-script -->

<!-- easy-responsive-tabs -->
<link rel="stylesheet" type="text/css" href="{!! asset('web/css/easy-responsive-tabs.css')!!} " />
<script src="{!! asset('web/js/easyResponsiveTabs.js"></script>

<script>
	$(document).ready(function() {
		//Horizontal Tab
		$('#parentHorizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion
			width: 'auto', //auto or any width like 600px
			fit: true, // 100% fit in a container
			tabidentify: 'hor_1', // The tab groups identifier
			activate: function(event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#nested-tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
		});
	});
</script>
<script src="{!! asset('web/js/sweetalert.min.js')!!}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.send_order').click(function() {
			swal({
					title: "Xác nhận đơn hàng",
					text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Cảm ơn, Mua hàng",

					cancelButtonText: "Đóng,chưa mua",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm) {
					if (isConfirm) {
						var shipping_email = $('.shipping_email').val();
						var shipping_name = $('.shipping_name').val();
						var shipping_address = $('.shipping_address').val();
						var shipping_phone = $('.shipping_phone').val();
						var shipping_notes = $('.shipping_notes').val();
						var shipping_method = $('.payment_select').val();
						var order_fee = $('.order_fee').val();
						var order_coupon = $('.order_coupon').val();
						var _token = $('input[name="_token"]').val();

						$.ajax({
							url: '{{url(' / confirm - order ')}}',
							method: 'POST',
							data: {
								shipping_email: shipping_email,
								shipping_name: shipping_name,
								shipping_address: shipping_address,
								shipping_phone: shipping_phone,
								shipping_notes: shipping_notes,
								_token: _token,
								order_fee: order_fee,
								order_coupon: order_coupon,
								shipping_method: shipping_method,
								payment_select: payment_select
							},
							success: function() {
								// swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");

							}
						});

						window.setTimeout(function() {
							location.reload();
						}, 3000);

					} else {
						swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

					}

				});


		});
	});
</script>
<!-- //easy-responsive-tabs -->

<!-- credit-card -->
<script src="{!! asset('web/js/creditly.js')!!}"></script>
<link rel="stylesheet" href="{!! asset('web/css/creditly.css')!!}" type="text/css" media="all" />
<script>
	$(function() {
		var creditly = Creditly.initialize(
			'.creditly-wrapper .expiration-month-and-year',
			'.creditly-wrapper .credit-card-number',
			'.creditly-wrapper .security-code',
			'.creditly-wrapper .card-type');


		$(".creditly-card-form .submit").click(function(e) {
			e.preventDefault();
			var output = creditly.validate();
			if (output) {
				// Your validated credit card output
				console.log(output);
			}
		});
	});
</script>

<!-- creditly2 (for paypal) -->
<script src="{!! asset('web/js/creditly2.js')!!}"></script>
<script>
	$(function() {
		var creditly = Creditly2.initialize(
			'.creditly-wrapper .expiration-month-and-year-2',
			'.creditly-wrapper .credit-card-number-2',
			'.creditly-wrapper .security-code-2',
			'.creditly-wrapper .card-type');

		$(".creditly-card-form-2 .submit").click(function(e) {
			e.preventDefault();
			var output = creditly.validate();
			if (output) {
				// Your validated credit card output
				console.log(output);
			}
		});
	});
</script>

<!-- //credit-card -->


<!-- smoothscroll -->
<script src="{!! asset('web/js/SmoothScroll.min.js')!!}"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="{!! asset('web/js/move-top.js')!!}"></script>
<script src="{!! asset('web/js/easing.js')!!}"></script>
<script>
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();

			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
	$(document).ready(function() {
		/*
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		*/
		$().UItoTop({
			easingType: 'easeOutQuart'
		});

	});
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="{!! asset('web/js/bootstrap.js')!!}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.choose').on('change', function() {
			var action = $(this).attr('id');
			var ma_id = $(this).val();
			var _token = $('input[name="_token"]').val();
			var result = '';

			if (action == 'city') {
				result = 'province';
			} else {
				result = 'wards';
			}
			$.ajax({
				url: '{{url(' / select - delivery - home ')}}',
				method: 'POST',
				data: {
					action: action,
					ma_id: ma_id,
					_token: _token
				},
				success: function(data) {
					$('#' + result).html(data);
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.calculate_delivery').click(function() {
			var matp = $('.city').val();
			var maqh = $('.province').val();
			var xaid = $('.wards').val();
			var _token = $('input[name="_token"]').val();
			if (matp == '' && maqh == '' && xaid == '') {
				alert('Làm ơn chọn để tính phí vận chuyển');
			} else {
				$.ajax({
					url: '{{url(' / calculate - fee ')}}',
					method: 'POST',
					data: {
						matp: matp,
						maqh: maqh,
						xaid: xaid,
						_token: _token
					},
					success: function() {
						location.reload();
					}
				});
			}
		});
	});
</script>
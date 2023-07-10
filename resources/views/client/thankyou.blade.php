<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="{!! asset('web/css/style.css')!!}" rel="stylesheet" type="text/css" media="all" />
	<meta http-equiv="refresh" content="5;url=cli/index" />
	@include('inc.bootstrap_cli')
</head>
<body id="margin0">
	<div class="loader">
		<img src="{!! asset('web/imager_10270.jpg')!!}" alt="noimg">
	</div>
	@include('inc.search_form')
	@include('inc.menu')
	<div class="background"><span class="thank"></span>
		<img src="../../logo1.png" alt="">
	</div>
	<script>
		var string = "Cảm ơn bạn đã mua sản phẩm của cửa hàng chúng tôi";
		const char = document.querySelector('.thank');
		var index = 0;

		function move() {
			if (index <= string.length - 1) {
				index++;
				var newstring = string.slice(0, index);
				char.innerHTML = newstring;
			} else {
				index = 0;

			}

		}
		setInterval(move, 80);
	</script>
	<script>
		window.addEventListener('load', function() {
			const load = document.querySelector('.loader');
			load.className += " hidden";
		})
	</script>
</body>

</html>
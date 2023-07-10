
<!DOCTYPE html>
<html lang="zxx">

<head>
@include('inc.plush')

</head>

<body>
	<!-- top-header -->
@include('inc.topheader')

	
@include('inc.modal')
	@include('inc.search_form')
	@include('inc.menu')
	<?php 
	if($com=='index'){?>
		@include('inc.slide')
	<?php } ?>
	@yield('content')
	@include('inc.footer')
	@include('inc.boot2_detail')
	<!-- <div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.074425170947!2d106.69275991474917!3d10.80561179230171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528c6b3087445%3A0x9f9e59544876ddf!2zMzU2LCA3IE7GoSBUcmFuZyBMb25nLCBwaMaw4budbmcgNywgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1621256673555!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div> -->
</body>
</html>
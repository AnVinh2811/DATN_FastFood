<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					
<?php $total = 0 ?>
@foreach((array) session('cart') as $id => $details)
    <?php
    $si=$details['size'];
    $km=$details['price']-$details['price_pro'];
    if($si=="Lớn")
    {
    	$sub=($km+(($km*20)/100))*$details['quantity'];
    }elseif($si=="Nhỏ"){
    	 $sub=($km-(($km*20)/100))*$details['quantity'];
    }else{
    	$sub=$km*$details['quantity'];
    }
          $total += $sub; 
    ?>
@endforeach
<di	v id="wrapper">
  <div class="cart-tab visible">  
     <div id="visible">
     </div>    
      
    </a>
    <div id="show"></div><!-- @end .cart -->
  </div><!-- @end .cart-tab -->
					</div>
				</div>
			</div>
		</div>
	</div>







  

<div class="header-bot">
  <div class="container">
    <div class="row header-bot_inner_wthreeinfo_header_mid">
      <!-- logo -->

      <!-- //logo -->
      <!-- header-bot -->
      <div class="col-md-9 header mt-4 mb-md-0 mb-4">
        <!-- search -->
        <div class="row">
          <div class="col-9 agileits_search">
            <form class="form-inline" action="{{route('cli_search')}}" autocomplete="off" method="post">
              {{csrf_field()}}
              <input class="form-control mr-sm-2" type="search" placeholder="Hôm nay bạn ăn gì..." aria-label="Search" name="keyword" id="keywords" required>
              <div id="search_ajax"></div>
              <button class="btn my-2 my-sm-0" type="submit" style="background: #F2BE22;">@lang('lang.seach')
              </button>
            </form>
          </div>
        </div>

        <?php $total = 0 ?>
        @foreach((array) session('cart') as $id => $details)
        <?php
        $si = $details['size'];
        $km = $details['price'] - $details['price_pro'];
        if ($si == "Lớn") {
          $sub = ($km + (($km * 20) / 100)) * $details['quantity'];
        } elseif ($si == "Nhỏ") {
          $sub = ($km - (($km * 20) / 100)) * $details['quantity'];
        } else {
          $sub = $km * $details['quantity'];
        }
        $total += $sub;
        ?>
        @endforeach
        <div id="wrapper">
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
@extends('client/layout_cli')
@section('content')
<title>Lịch sử đặt hàng</title>
<div class="bao-all  ">
  <div class="baobang">
    <div class="table-agile-info left-table">

      <div class="panel panel-default wrap-1200">

        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 margi">
          @lang('lang.order_de')</h3>
        <div class="panel-heading liet">
          Thông tin khách hàng
        </div>
        <div class="table-responsive">
          <?php
          $message = Session::get('message');
          if ($message) {
            echo '<span class="text-alert">' . $message . '</span>';
            Session::put('message', null);
          }
          ?>
          <table class="table table-striped b-t b-light">
            <thead class="dau">
              <tr>

                <th>Tên đăng nhập</th>
                <th>@lang('lang.num')</th>
                <th>Email</th>


              </tr>
            </thead>
            <tbody>

              <tr>
                <td>{{$customer->customer_name}}</td>
                <td>{{$customer->customer_phone}}</td>
                <td>{{$customer->customer_email}}</td>
              </tr>

            </tbody>
          </table>

        </div>

      </div>
    </div>








    <div class="table-agile-info right-table wrap-1200">

      <div class="panel panel-default ">
        <div class="panel-heading liet">
          Thông tin vận chuyển hàng
        </div>


        <div class="table-responsive">
          <?php
          $message = Session::get('message');
          if ($message) {
            echo '<span class="text-alert">' . $message . '</span>';
            Session::put('message', null);
          }
          ?>
          <table class="table table-striped b-t b-light">
            <thead class="dau">
              <tr>

                <th>Tên khách hàng</th>
                <th>Địa chỉ giao hàng</th>
                <th>@lang('lang.sdt')</th>
                <th>@lang('lang.note')</th>
                <th>@lang('lang.pay_me')</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$shipping->shipping_name}}</td>
                <td>{{$shipping->shipping_address}}</td>
                <td>{{$shipping->shipping_phone}}</td>
                <td>{{$shipping->shipping_notes}}</td>
                <td>@if($shipping->shipping_method==0)<span class="online">Chuyển khoản</span> @else <span class="offline">Tiền mặt</span> @endif</td>


              </tr>

            </tbody>
          </table>

        </div>

      </div>
    </div>


  </div>





  <div class="table-agile-info">

    <div class="panel panel-default wrap-1200">
      <div class="panel-heading liet">
        Chi tiết đơn hàng
      </div>
      <div class="baochitiet">
        <div class="table-responsive chitietdh">
          <?php
          $message = Session::get('message');
          if ($message) {
            echo '<span class="text-alert">' . $message . '</span>';
            Session::put('message', null);
          }
          ?>
          <table class="table table-striped ">
            <thead class="dau">
              <tr>
                <th style="width:20px;">
                  STT
                </th>
                <th>@lang('lang.product_name')</th>
                <th>@lang('lang.gia')</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>@lang('lang.price')</th>
                <th>@lang('lang.total')</th>

                <!-- <th style="width:30px;"></th> -->
              </tr>
            </thead>
            <tbody>
              @php
              $i = 0;
              $total = 0;
              @endphp
              @foreach($order_details as $key => $details)

              <?php
              $i++;
              $km = $details->product_price * $details->product_sales_quantity;
              if ($details->product_size == "Lớn") {
                $subtotal = ($km + (($km * 20) / 100));
              } elseif ($details->product_size == "Nhỏ") {
                $subtotal = ($km) - ($km * 20) / 100;
              } else {
                $subtotal = ($km);
              }

              $total += $subtotal;
              ?>
              <tr>

                <td><i>{{$i}}</i></td>
                <td>{{$details->product_name}}</td>
                <td>@if($details->product_coupon!='no')
                  {{$details->product_coupon}}
                  @else
                  Không mã
                  @endif
                </td>
                <td>{{$details->product_size}}</td>


                <td><input type="text" disabled="true" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}} order_qty_cr" value="{{$details->product_sales_quantity}}" name="product_sales_quantity" style="width: 61px">

                  <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->product_quantity}}">

                  <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">

                  <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">

                </td>
                <td>{{number_format($details->product_price ,0,',','.')}} VNĐ</td>
                <td>{{number_format($subtotal ,0,',','.')}} VNĐ</td>
              </tr>
              @endforeach
              <br>
              <tr style="text-align: right;">
                <td colspan="7">

                  @php
                  $total_coupon = 0;
                  @endphp

                  @if($coupon_condition==1)

                  @php

                  $total_after_coupon = ($total*$coupon_number)/100;
                  echo 'Tổng Voucher giảm giá: '.number_format($total_after_coupon,0,',','.').' VNĐ'.'</br>';

                  if($total > 200000){

                  $total_coupon = $total - $total_after_coupon;

                  }else{

                  $total_coupon = $total - $total_after_coupon + $details->product_feeship;

                  }

                  @endphp

                  @else

                  @php

                  echo 'Tổng Voucher giảm giá: '.number_format($coupon_number,0,',','.').' VNĐ'.'</br>';

                  if($total > 200000){

                  $total_coupon = $total - $coupon_number ;

                  }else{

                  $total_coupon=$total - $coupon_number + $details->product_feeship;

                  }

                  @endphp

                  @endif

                  @if($total_coupon > 200000)
                 
                  Phí ship :  0 VNĐ (Đơn hàng trên 200.000 VNĐ)

                  @else

                  Phí ship : {{number_format($details->product_feeship,0,',','.')}} VNĐ

                  @endif</br>

                  @lang('lang.t'): {{number_format($total_coupon,0,',','.')}} VNĐ
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@stop
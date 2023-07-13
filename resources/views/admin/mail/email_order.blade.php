<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="background: #222; border-radius: 12px; padding :15px;">
        <div class="col-md-12">
            <p style="text-align:center; color:#FFF">Đây là email tự động khách hàng không trả lời email này.</p>
            <div class="row" style="background: #F29727; padding: 15px;">

                <div class="col-md-6" style="text-align: center; color:#FFF; font-weight: bold; font-size: 30px;">
                    <h4 style="margin :0;">CỬA HÀNG THỨC ĂN NHANH VINAFOOD</h4>
                </div>

                <div class="col-md-6 logo" style="color:#FFF;">
                    <p>Chào bạn: <strong style="color:#000; text-decoration: underline;">{{$shipping_array['customer_name']}}</strong></p>
                </div>

                <div class="col-md-12">
                    <h4 style="color:#000; text-transform: uppercase;">Thông tin đơn hàng</h4>
                    <p>Mã đơn hàng: <strong style="text-transform:uppercase; color:#FFF">{{$code['order_code']}}</strong></p>
                    <p>Mã khuyến mãi: <strong style="text-transform:uppercase; color:#fff">{{$code['coupon_code']}}</strong></p>

                    <p>Dịch vụ: <strong style="text-transform:uppercase; color:#fff">Đặt hàng trực tuyến</strong></p>


                    <h4 style="color:#000; text-transform: uppercase;">Thông tin người nhận</h4>
                    <p>Email:
                        @if ($shipping_array['shipping_email']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_email']}}</span>
                        @endif
                    </p>
                    <p>Họ tên người gửi:
                        @if ($shipping_array['shipping_name']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_name']}}</span>
                        @endif
                    </p>
                    <p>Địa chỉ nhận hàng :
                        @if ($shipping_array['shipping_address']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_address']}}</span>
                        @endif
                    </p>
                    <p>Số điện thoại:
                        @if ($shipping_array['shipping_phone']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_phone']}}</span>
                        @endif
                    </p>
                    <p>Ghi chú đơn hàng:
                        @if ($shipping_array['shipping_notes']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_notes']}}</span>
                        @endif
                    </p>
                    <p>Hình thức thanh toán:
                        @if ($shipping_array['shipping_method']==0)
                        <span style="color:#fff"> Chuyển khoản ATM</span>
                        @else
                        <span style="color:#fff">Tiền mặt</span>
                        @endif
                    </p>
                    <p style="color: #FFF;">Nếu thông tin người nhận hàng không có chúng tôi sẽ liên hệ với người đặt hàng để trao đổi về thông tin đơn hàng đã đặt </p>
                    <h4 style="text-transform:uppercase; color:#000">Sản phẩm đã đặt</h4>
                    <table class="table table-striped">
                        <thead class="dau">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Size</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total =0;
                            @endphp
                            @foreach ($cart_array as $key => $cart)
                            @php
                            $size=$cart['product_size'];
                            $km=$cart['product_price']-$cart['product_km'];

                            if($size=="Lớn")
                            {
                            $sub=($km+(($km*20)/100))*$cart['product_qty'];
                            }
                            elseif($size=="Nhỏ"){
                            $sub=($km-(($km*20)/100))*$cart['product_qty'];
                            }
                            else{
                            $sub=$km*$cart['product_qty'];
                            }

                            $total += $sub;
                            @endphp
                            <tr>
                                <td>{{$cart['product_name']}}</td>
                                <td>{{$cart['product_size']}}</td>
                                <td>{{number_format($sub,0,',','.')}} VNĐ</td>
                                <td style="text-align: center;">{{$cart['product_qty']}}</td>
                                <td>{{number_format($sub,0,',','.')}} VNĐ</td>
                            </tr>

                            @endforeach
                            <tr>
                                <td colspan="4" align="rigth">
                                    @if($sub > 200000)

                                    Phí ship: 0đ ( Đơn hàng trên 200.000 VND )
                                    @php
                                    $shipping_array['free'] = 0
                                    @endphp

                                    @else

                                    Phí ship: {{number_format($shipping_array['free'],0,',','.')}} VNĐ

                                    @endif
                                </td>
                            </tr>
                           
                            <tr>

                                @if($code['order_code'] = 0)
                                @php

                                $shipping_array['free'] = 0;
                                $total_after_ship =$total + $shipping_array['free']
                                @endphp

                                @else
                                @php
                                $total_after_ship = $total + $shipping_array['free']
                                @endphp
                                @endif
                                <td colspan="4" align="rigth">Tổng thanh toán: {{number_format($total_after_ship,0,',','.')}} VNĐ

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p style="color:#FFF">Mọi chi tiết xin liên hệ qua <a target="_blank" href="http://127.0.0.1:8000/cli/index">Website</a>, hoặc liên hệ qua hotline:19005689, Xin cảm ơn quý khác đã đặt hàng tại shop chúng tôi.</p>
            </div>
        </div>
    </div>
</body>

</html>
<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\custommer;
use App\Models\category;
use App\Models\coupon;
use App\Models\CatePost;
use App\Models\chinhsach;
use App\Models\shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\App;
use Laravel\Socialite\Facades\Socialite;; //sử dụng Socialite
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Login;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Social; //sử dụng model Social

class  CheckoutController extends Controller
{
    public function print_order($checkout_code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {
        $order_details = OrderDetail::where('order_code', $checkout_code)->get();
        $order = Order::where('order_code', $checkout_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = custommer::where('customer_id', $customer_id)->first();
        $shipping = shipping::where('shipping_id', $shipping_id)->first();

        $order_details_product = OrderDetail::with('product')->where('order_code', $checkout_code)->get();

        foreach ($order_details_product as $key => $order_d) {

            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = coupon::where('coupon_code', $product_coupon)->first();

            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;

            if ($coupon_condition == 1) {
                $coupon_echo = $coupon_number . '%';
            } elseif ($coupon_condition == 2) {
                $coupon_echo = number_format($coupon_number, 0, ',', '.') . 'đ';
            }
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;

            $coupon_echo = '0';
        }

        $output = '';

        $output .= '<style>body{
            font-family: DejaVu Sans;
        }
        .tieu{
            font-size: 15px;
            font-weight: bold;
        }
        .table-bordered{
            border:0.5px solid #000;
            width:100%;
            margin-top:30px;
        }
        .table-bordered tbody tr td{
            border:0.5px solid #000;
        }
        .table-bordered th{
            background:grey;
            color:white;
        }
        .bold{
            font-weight:bold;
            width:50px;
        }
        .mart{
            margin-top:20px;
        }
        .day{
            text-align:right;
            margin-top:20px;
        }
        .center{
            text-align:center;
        }
        </style>
        <h4><center style="font-size:18px">HÓA ĐƠN</center></h4>
        <div class="khah">
          <div class="heade">
            <span class="panel-heading1">THÔNG TIN KHÁCH HÀNG</span>
          </div>
          <ul style="list-style-type: none; ">
            <li><span class="tieu">Tên khách hàng:</span> ' . $shipping->shipping_name . '</li>
            <li><span class="tieu">Địa chỉ:</span> ' . $shipping->shipping_address . '</li>
            <li><span class="tieu">Số điện thoại:</span>' . $shipping->shipping_phone . '</li>
            <li><span class="tieu">Quận: </span>' . $shipping->shipping_address2 . '</li>
            <li><span class="tieu">Email: </span>' . $shipping->shipping_email . '</li>
            <li><span class="tieu">Ghi chú: </span>' . $shipping->shipping_notes . '</li>
            <li><span class="tieu">Hình thức thanh toán: </span>';
        if ($shipping->shipping_method == 0) {

            $output .= '<span class="online">Chuyển khoản</span>';
        } else
            $output .= '<span class="offline">Tiền mặt</span></li>';
        $output .= '</ul>
        </div>
        <table class="table table-bordered">
        <thead>
        <tr>
        <th>Tên</th>
        <th>Size</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Tổng tiền</th>
        </tr>
        </thead>
        <tbody>';

        $total = 0;

        foreach ($order_details_product as $key => $product) {

            $subtotal = $product->product_price * $product->product_sales_quantity;
            $total += $subtotal;

            if ($product->product_coupon != 'no') {
                $product_coupon = $product->product_coupon;
            } else {
                $product_coupon = 'không mã';
            }

            $output .= '      
            <tr>
            <td class="center">' . $product->product_name . '</td>
            <td class="center">' . $product->product_size . '</td>
            <td class="center">' . $product->product_sales_quantity . '</td>
            <td class="center">' . number_format($product->product_price, 0, ',', '.') . 'đ' . '</td>
            <td class="center">' . number_format($subtotal, 0, ',', '.') . 'đ' . '</td>

            </tr>';
        }
        $output .= '              
        </tbody>

        </table>';

        if ($coupon_condition == 1) {
            $total_after_coupon = ($total * $coupon_number) / 100;
            $total_coupon = $total - $total_after_coupon;
        } else {
            $total_coupon = $total - $coupon_number;
        }

        $output .= '
        <div class="phiship">

        <p><span class="bold">Tổng giảm</span>:<span class="sp"> ' . $coupon_echo . '</span></p>
        <p><span class="bold">Phí ship</span>:<span class="sp"> ' . number_format($product->product_feeship, 0, ',', '.') . 'đ' . '</span></p>
        <p><span class="bold">Thanh toán</span> :<span class="sp"> ' . number_format($total_coupon + $product->product_feeship, 0, ',', '.') . 'đ' . '</span></p>
        </div>';

        $output .= '<div class="day">TP.HCM, ngày ' . Carbon::now()->day . ', tháng ' . Carbon::now()->month . ', năm ' . Carbon::now()->year . '</div>';
        $output .= '
        
        <table class="mart">
        <thead>
        <tr>
        <th width="200px">Người lập phiếu</th>
        <th width="800px">Người nhận</th>

        </tr>
        </thead>
        <tbody>';

        $output .= '              
        </tbody>

        </table>

        ';


        return $output;
    }
    public function confirm_order1(Request $request)
    {
        $url_canonical = $request->url();
        $cate = category::all();
        $com = '';
        $data = $request->all();
        if ($data['order_coupon'] != 'no') {
            $coupon = coupon::where('coupon_code', $data['order_coupon'])->first();
            $coupon->coupon_used = $coupon->coupon_used . ',' . Session::get('customer_id');
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon_email = $coupon->coupon_code;
            $coupon->save();
        } else {
            $coupon_email = "Không có sử dụng";
        }
        
        $invoices = Order::with('OrderDetail')->get();
       
        foreach ($invoices as $invoice) {
            $totalAmount = 0;
          
            foreach ($invoice->OrderDetail as $detail) {
                $totalAmount += $detail->product_sales_quantity * $detail->product_price;
                
                if ($detail->product_size == "Lớn") {
                    $subtotal = ($totalAmount + (($totalAmount * 20) / 100));
                } elseif ($detail->product_size == "Nhỏ") {
                    $subtotal = ($totalAmount) - ($totalAmount * 20) / 100;
                } else {
                    $subtotal = ($totalAmount);
                }
                
            }
            //dd($orderCost);
            // lưu tổng tiền vào cột "total_amount" trong bảng invoices
            $invoice->total_mount = $subtotal;
            $invoice->save();
        }
        //vận chuyển
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_address2 = $data['shipping_address1'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['payment_select'];
        $shipping->save();


        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);


        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->order_date = $order_date;
        $order->created_at = $today;
        $order->total_mount = $subtotal;
        $order->save();
        $order_id = $order->order_id;


        //send email comfirm
        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_details = new OrderDetail();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['pro_id'];
                $order_details->product_name = $cart['name'];
                if ($cart['price_pro'] != "") {
                    $order_details->product_price = $cart['price'] - $cart['price_pro'];
                } else {
                    $order_details->product_price = $cart['price'];
                }
                $order_details->product_sales_quantity = $cart['quantity'];
                $order_details->product_size = $cart['size'];
                $order_details->product_coupon =  $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->order_id = $order_id;
                $order_details->save();
            }
        }
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_email = "Đơn hàng xác nhận ngày" . ' ' . $now;
        $cus =  custommer::find(Session::get('customer_id'));
        $data['email'][] = $cus->customer_email;

        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart_email) {
                $cart_array[] = array(
                    'product_km' => $cart_email['price_pro'],
                    'product_size' => $cart_email['size'],
                    'product_name' => $cart_email['name'],
                    'product_price' => $cart_email['price'],
                    'product_qty' => $cart_email['quantity'],
                );
            }
        }
        //Lấy  shipping
        $shipping_array = array(
            'customer_name' => $cus->customer_name,
            'shipping_name' => $data['shipping_name'],
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_address' => $data['shipping_address'],
            'shipping_notes' => $data['shipping_notes'],
            'shipping_method' => $data['payment_select'],
            'free' => $data['order_fee']
        );
        //dd($shipping_array);
        //Lấy mã giảm giá
        $ordercode_mail = array(
            'coupon_code' => $coupon_email,
            'order_code' => $checkout_code
        );
        Mail::send(
            'admin.mail.email_order',
            ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'code' => $ordercode_mail],
            function ($message) use ($title_email, $data) {
                $message->to($data['email'])->subject($title_email);
                $message->from($data['email'], $title_email);
            }
        );

        Session::forget('coupon');
        Session::forget('cart');
        Session::flash('thank');
        return redirect()->route('thank');
    }
    public function confirm_order(Request $request)
    {
        $url_canonical = $request->url();
        $cate = category::all();
        $com = '';
        $data = $request->all();
        if ($data['order_coupon'] != 'no') {
            $coupon = coupon::where('coupon_code', $data['order_coupon'])->first();
            $coupon->coupon_used = $coupon->coupon_used . ',' . Session::get('customer_id');
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon_email = $coupon->coupon_code;

            $coupon->save();
        } else {
            $coupon_email = "Không có sử dụng";
        }

        if ($data['order_coupon'] != 'no') {
            $coupon = coupon::where('coupon_number', $data['order_coupon'])->first();
            $coupon->coupon_used = $coupon->coupon_used . ',' . Session::get('customer_id');
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon_number = $coupon->coupon_number;

            $coupon->save();
        } else {
            $coupon_number = 0;
        }

        //vận chuyển
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_address2 = $data['shipping_address1'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);


        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->order_date = $order_date;
        $order->created_at = $today;
        $order->save();
        $order_id = $order->order_id;


        //send email comfirm

        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_details = new OrderDetail();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['pro_id'];
                $order_details->product_name = $cart['name'];
                if ($cart['price_pro'] != "") {
                    $order_details->product_price = $cart['price'] - $cart['price_pro'];
                } else {
                    $order_details->product_price = $cart['price'];
                }
                $order_details->product_sales_quantity = $cart['quantity'];
                $order_details->product_size = $cart['size'];
                $order_details->product_coupon =  $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->order_id = $order_id;
                $order_details->save();
            }
        }
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_email = "Đơn hàng xác nhận ngày" . ' ' . $now;
        $cus =  custommer::find(Session::get('customer_id'));
        $data['email'][] = $cus->customer_email;

        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart_email) {
                $cart_array[] = array(
                    'product_name' => $cart_email['name'],
                    'product_price' => $cart_email['price'],
                    'product_qty' => $cart_email['quantity'],
                );
            }
        }
        //Lấy  shipping
        $shipping_array = array(
            'customer_name' => $cus->customer_name,
            'shipping_name' => $data['shipping_name'],
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_address' => $data['shipping_address'],
            'shipping_notes' => $data['shipping_notes'],
            'shipping_method' => $data['shipping_method'],
            'free' => $data['order_fee']
        );
        //Lấy mã giảm giá
        $ordercode_mail = array(
            'coupon_code' => $coupon_email,
            'coupon_number' => $coupon_number,
            'order_code' => $checkout_code
        );
        Mail::send('admin.mail.email_order', ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'code' => $ordercode_mail], function ($message) use ($title_email, $data) {
            $message->to($data['email'])->subject($title_email);
            $message->from($data['email'], $title_email);
        });

        Session::forget('coupon');
        // Session::forget('fee');
        Session::forget('cart');
    }

    //Đăng ký
    public function dangky(Request $req)
    {
        //dd($req);
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email|unique:tbl_customers,customer_email',
            'sdt' => 'required|regex:/(0)[0-9]{9}/|unique:tbl_customers,customer_phone',
            'password' => 'required|min:8|max:32',
            're_password' => 'required|same:password'
        ], [
            'name.required' => 'Ban chưa nhập tên',
            'email.required' => 'Ban chưa nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập password',
            'phone.required' => 'Bạn chưa nhập số điện thoạt',
            'phone.regex' => 'Số Điện thoại chưa đúng định dạng',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            're_password.required' => 'Bạn phải nhập lại mật khẩu',
            'password.min' => 'Mật khẩu phải ít nhất 8 ký tự',
            'password.max' => 'Mật khẩu không vượt quá 32 ký tự',
            're_password.same' => 'Mật khẩu không trùng khớp'
        ]);

        $cus = array();
        $cus['customer_name'] = $req->name;
        $cus['customer_email'] = $req->email;
        $cus['customer_password'] = md5($req->password);
        $cus['customer_phone'] = $req->sdt;
        $cus_id = DB::table('tbl_customers')->insertGetId($cus);
        // Session::put('customer_id',$cus_id);
        // Session::put('customer_name',$req->customer_name);
        // return redirect()->route('cli_index');

        $email = $req->email;
        $code = bcrypt(md5(time() . $email));
        $url = route('xacnhanTK', ['name' => $req->name, 'email' => $req->email, 'phone' => $req->sdt, 'password' => md5($req->password), 'code_active' => $code]);
        $data = [
            'route' => $url
        ];
        Mail::to($email)->send(new TestMail());
        return redirect()->route('cli_index')->with('message', 'HÃY CHECK MAIL ĐỂ NHẬN ƯU ĐÃI TỪ CỬA HÀNG');
    }

    public function xacnhanTK(Request $req)
    {
        // dd($req->name);
        //dd($req->all());
        $email = $req->email;
        $name = $req->name;
        $phone = $req->phone;
        $password = $req->password;
        $code_active = $req->code_active;
        //$time_active = $req->time_active;
        //dd($email);

        $cus = array();
        $cus['customer_name'] = $name;
        $cus['customer_email'] = $email;
        $cus['customer_password'] = $password;
        $cus['customer_phone'] = $phone;
        $cus['code_active'] = $code_active;
        $cus_id = DB::table('tbl_customers')->insertGetId($cus);
        Session::put('customer_id', $cus_id);
        Session::put('customer_name', $name);
        return redirect()->route('cli_index')->with('message', 'XÁC NHẬN TÀI KHOẢN THÀNH CÔNG!!');
    }

    //Đăng nhập
    public function dangnhap(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required|min:8|max:32',
        ], [
            'email.required' => '+Ban chưa nhập email',
            'email.email' => '+Email chưa đúng định dạng',
            'password.required' => '+Bạn chưa nhập password',
            'password.min' => 'password phải ít nhất 8 ký tự',
        ]);
        $email = $req->email;
        $password =  md5($req->password);
        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();
        //$re = custommer::where('customer_email',$email)->where('customer_password',$password)->first();
        //dd($result, $password);


        if ($result) {
            Session::put('fee', 15000);
            Session::save();
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            Session::flash('message', 'ĐĂNG NHẬP THÀNH CÔNG');
            return redirect()->route('cli_index');
        } else {
            return redirect()->route('cli_index')->with('error', 'EMAIL HOẶC MẬT KHẨU KHÔNG ĐÚNG, ĐĂNG NHẬP THẤT BẠI');
        }
    }
    //lấy lại mật khẩu
    public function postSendcoderesetpassowrd(Request $req)
    {
        $email = $req->email;
        $checkUser = DB::table('tbl_customers')->Where('customer_email', $email)->first();

        if (!$checkUser) {
            return redirect()->back()->with('message', 'Không có email này');
            //return dd("không tồn tại");
        }
        $code = bcrypt(md5(time() . $email));
        $checkUser->code = $code;
        $checkUser->code_time = Carbon::now();
        DB::table('tbl_customers')->where('customer_email', $email)->update(['code' => $code]);
        //$checkUser->save();

        $url = route('getdoimk', ['code' => $checkUser->code, 'email' => $email]);

        $data = [
            'route' => $url
        ];
        //dd($data);
        Mail::send('email.reset_password', $data, function ($message) use ($email) {
            $message->to($email, 'Reset password')->subject('Lấy lại mật khẩu!!');
            $message->from($email);
        });

        return redirect()->route('cli_index')->with('message', 'VUI LÒNG CHECK MAIL ĐỂ LẤY LẠI MẬT KHẨU');
    }

    public function getdoimk(Request $req)
    {
        $code = $req->code;
        $email = $req->email;
        $checkUser = DB::table('tbl_customers')->where([
            'code' => $code,
            'customer_email' => $email
        ])->first();
        //dd($checkUser);
        if (!$checkUser) {
            return redirect('cli_index')->with('danger', 'Xin lổi, đường dẫn không đúng, bạn vui lòng thử lại sau');
        }
        return view("email.layout_doimk");
    }

    public function postdoimk(Request $req)
    {
        $this->validate($req, [
            'password' => 'required|min:8|max:32',
            're_password' => 'required|same:password'
        ], [
            'password.required' => '+Bạn chưa nhập mật khẩu',
            're_password.required' => '+Bạn chưa nhập lại mật khẩu',
            'password.min' => '+Mật khẩu phải lớn hơn 8',
            'password.max' => '+Mật khẩu phải nhỏ hơn 32',
            're_password.same' => '+Mật khẩu không trùng khớp'
        ]);
        $data = $req->all();
        $code = $req->code;
        $email = $req->email;
        //dd($data);
        $checkUser = DB::table('tbl_customers')->where([
            'code' => $code,
            'customer_email' => $email
        ])->first();

        if (!$checkUser) {
            return redirect('cli_index')->with('error', 'Xin lỗi, đường dẫn không đúng, xin vui lòng thử lại');
        } else {
            DB::table('tbl_customers')->where('customer_email', $email)->update(['customer_password' => md5($req->password)]);
            return redirect()->route('cli_index')->with('message', 'ĐỔI MẬT KHẨU THÀNH CÔNG, MỜI BẠN ĐĂNG NHẬP');
        }
        dd($checkUser);
    }

    //end doi may khau



    //----------------------------------------------//
    public function del_fee()
    {
        Session::forget('fee');
        return redirect()->back();
    }
    public function payment(Request $request)
    {
        $cus_id = Session::get('customer_id');
        $cus = custommer::where('customer_id', $cus_id)->get();
        $url_canonical = $request->url();
        $meta_desc = "Thanh toán";
        // $meta_keywords = $value->product_slug;
        $cate_post1 = CatePost::orderBy('cate_post_id', 'DESC')->get();
        $meta_title = "Thanh toán";
        $chinh = chinhsach::limit(3)->get();
        $share_images = url('images/' . $request->product_image);
        $cate = category::all();
        $com = '';
        return view('client.payment', compact('cate', 'com', 'url_canonical', 'meta_title', 'meta_desc', 'share_images', 'cate_post1', 'chinh', 'cus'));
    }


    public function checkout(Request $request)
    {

        $url_canonical = $request->url();
        $meta_desc = "Giỏ hàng";
        $cate_post1 = CatePost::orderBy('cate_post_id', 'DESC')->get();
        // $meta_keywords = $value->product_slug;
        $chinh = chinhsach::limit(3)->get();
        $meta_title = "Giỏ hàng";
        $share_images = url('images/' . $request->product_image);
        $cate = category::all();
        $com = '';
        return view('client/cart', compact('meta_desc', 'meta_title', 'cate', 'com', 'url_canonical', 'share_images', 'cate_post1', 'chinh'));
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }


    //Thanh toán bằng VNPAY
    public function online_checkout(Request $request)
    {

        if (isset($_POST['payment_select'])) {
            $data = $request->all();



            
            $checkout_code = substr(md5(microtime()), rand(0, 26), 5);

            $order = new Order();
            $order_id = $order->order_id;
            if (session::get('cart')) {
                $total = 0;
                foreach (session::get('cart') as $id => $details) {
                    $si = $details['size'];
                    $km = $details['price'] - $details['price_pro'];
                    if ($si == "Lớn") {
                        $sub1 = ($km + ($km * 20) / 100);
                        $sub = ($km + (($km * 20) / 100)) * $details['quantity'];
                    } elseif ($si == "Nhỏ") {
                        $sub1 = ($km - ($km * 20) / 100);
                        $sub = ($km - (($km * 20) / 100)) * $details['quantity'];
                    } else {
                        $sub1 = $km;
                        $sub = $km * $details['quantity'];
                    }
                    $tien = $sub;
                    $totalitem = $tien;
                    $total += $totalitem;
                }
            }

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/thankyou";
            $vnp_TmnCode = "ILBGPSFG"; //Mã website tại VNPAY 
            $vnp_HashSecret = "PSCWGBREUIWXCBOKRSJCHPQSLJHSGITJ"; //Chuỗi bí mật

            $vnp_TxnRef = $checkout_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Nội Dung Thanh Toán';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount =  $total * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );


            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            // dd($inputData);
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['payment_select'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
    }
}

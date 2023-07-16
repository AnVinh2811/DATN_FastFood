<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\custommer;
use App\Models\Coupon;
use App\Models\product;
use App\Models\quanly;
use Carbon\Carbon;
use App\Models\CatePost;
use App\Models\chinhsach;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\category;

class OrderController extends Controller
{
	public function move($code)
	{
		$order = Order::where('order_code', $code)->update(['order_status' => 4]);
		return redirect()->back()->with('message', 'Đơn hàng đang được vận chuyển');
	}

	public function success($code)
	{
		$order = Order::where('order_code', $code)->update(['order_status' => 5]);
		return redirect()->back()->with('message', 'Đơn hàng đã giao');
	}

	public function done($code)
	{
		$order = Order::where('order_code', $code)->update(['order_status' => 2]);
		return redirect()->back()->with('message', 'Đơn hàng đã được xử lý');
	}

	public function huy_don_hang(Request $req)
	{
		$data = $req->all();
		$order = Order::where('order_code', $data['id'])->update(['order_status' => 3]);
	}
	public function order_code(Request $request, $order_code)
	{
		$order = Order::where('order_code', $order_code)->first();
		$order->delete();
		Session::flash('message', 'Xóa đơn hàng thành công');
		return redirect()->back();
	}
	public function view_order($order_code, Request $request)
	{
		$id = $request->id;
		$order_details = OrderDetail::with('product')->where('order_code', $id)->get();
		$getorder = Order::where('order_code', $order_code)->get();
		foreach ($getorder as $key => $ord) {
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$customer = custommer::where('customer_id', $customer_id)->first();
		$shipping = shipping::where('shipping_id', $shipping_id)->first();

		$order_details_product = OrderDetail::with('product')->where('order_code', $order_code)->get();

		foreach ($order_details_product as $key => $order_d) {

			$product_coupon = $order_d->product_coupon;
		}
		if ($product_coupon != 'no') {
			$coupon = Coupon::where('coupon_code', $product_coupon)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		} else {
			$coupon_condition = 2;
			$coupon_number = 0;
		}




		$i = 0;
		$total = 0;
		$output['kh'] = '';
		$output['ship'] = '';
		$output['detail'] = '';
		$output['kh'] .= '<div class="khah">
				  <div class="heade">
				    <span class="panel-heading1">Thông tin khách hàng</span>
				  </div>
				  <ul style="list-style-type: none; line-height: 30px ;">
				    <li><span class="tieu">Họ và tên:</span> ' . $customer->customer_name . '</li>
				    <li><span class="tieu">Số điện thoại:</span> ' . $customer->customer_phone . '</li>
				    <li><span class="tieu">Email: </span>' . $customer->customer_email . '</li>
				  </ul>
				</div>';


		$output['ship'] .= '
		<div class="vc">
		  <div class="heade">
		     <span class="panel-heading1">Thông tin vận chuyển</span>
		  </div>
		  <ul style="list-style-type: none; ">
		    <li><span class="tieu">Tên khách hàng:</span> ' . $shipping->shipping_name . '</li>
		    <li><span class="tieu">Địa chỉ:</span> ' . $shipping->shipping_address . '</li>
		    <li><span class="tieu">Số điện thoại:</span> ' . $shipping->shipping_phone . '</li>
		    <li><span class="tieu">Quận: </span> ' . $shipping->shipping_address2 . '</li>
		    <li><span class="tieu">Email: </span> ' . $shipping->shipping_email . '</li>
		    <li><span class="tieu">Ghi chú: </span> ' . $shipping->shipping_notes . '</li>
		    <li><span class="tieu">Hình thức thanh toán: </span>';
		if ($shipping->shipping_method == 0) {
			$output['ship'] .= '<span class="online">Chuyển khoản</span>';
		} else {
			$output['ship'] .= '<span class="offline">Tiền mặt</span></li>';
		}
		$output['ship'] .=
			'</ul>
		  
		</div>';
		$output['detail'] .= '
		<table class="table table-striped ">
        <thead style="background: #f5f5f5;">
          <tr>
            <th style="width:20px;">
              STT
            </th>
            <th>Tên sản phẩm</th>
            <th>Số lượng sp trong kho</th>
            <th>Mã giảm giá</th>
            <th>Size</th>
            <th>Phí ship hàng</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Tổng tiền</th>
            
            
          </tr>
        </thead>
        <tbody>';

		foreach ($order_details as $key => $details) {
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

			$output['detail'] .= '<tr>
           
            <td><i>' . $i . '</i></td>
            <td>' . $details->product_name . '</td>
            <td>' . $details->product->soluong . '</td>';
			if ($details->product_coupon != 'no') {
				$output['detail'] .= '<td>' . $details->product_coupon . '</td>';
			} else {
				$output['detail'] .= '<td> Không mã</td>';
			}
			$output['detail'] .= '<td>' . $details->product_size . '</td>
           
            <td>' . number_format($details->product_feeship, 0, ',', '.') . 'đ</td>
          
            <td><input type="number" style="width:45px" min="1" disabled class=" sol order_qty_' . $details->product_id . '" value="' . $details->product_sales_quantity . '" name="product_sales_quantity">

              <input type="hidden"  name="order_qty_storage" class="order_qty_storage_' . $details->product_id . '" value="' . $details->product->product_quantity . '">

              <input type="hidden" name="order_code" class="order_code" value="' . $details->order_code . '">

              <input type="hidden" name="order_product_id" class="order_product_id" value="' . $details->product_id . '"></td>
            <td>' . $details->product_price . '</td>
            <td>' . number_format($subtotal, 0, ',', '.') . 'đ</td>
          </tr>';
		}
		$output['detail'] .= '<tr">
            <td colspan="8" class="no">';

		$total_coupon = 0;

		if ($coupon_condition == 1) {

			$total_after_coupon = ($total * $coupon_number) / 100;
			$output['detail'] .= 'Tổng giảm :' . number_format($total_after_coupon, 0, ',', '.') . '</br>';
			if ($total > 200000) {
				$total_coupon = $total - $total_after_coupon;
			} else {
				$total_coupon = $total - $total_after_coupon + $details->product_feeship;
			}
		} else {

			$output['detail'] .= '<span style="font-weight:bold">Tổng giảm</span> :' . number_format($coupon_number, 0, ',', '.') . ' VNĐ' . '</br>';
			if ($total > 200000) {
				$total_coupon = $total - $coupon_number;
			} else {
				$total_coupon = $total - $coupon_number + $details->product_feeship;
			}
		}
		if ($total_coupon > 200000) {
			$output['detail'] .= '<span style="font-weight:bold">Phí ship</span> : 0đ (đơn hàng trên 200.000 đ) <br>';
		} else {
			$output['detail'] .= '<span style="font-weight:bold">Phí ship</span> : ' . number_format($details->product_feeship, 0, ',', '.') . ' VNĐ <br>';
		}

		$output['detail'] .= '<span style="font-weight:bold">Thanh toán</span>: ' . number_format($total_coupon, 0, ',', '.') . ' VNĐ ';
		$output['detail'] .= '</td>
          </tr>
        </tbody>
        </table>';



		$output['in'] = '';
		foreach ($getorder as $key => $or) {
			if ($or->order_status == 1) {
				$output['in'] .= '<option id="' . $or->order_id . '" selected value="2">Chưa xử lý</option>';
			} elseif ($or->order_status == 2) {
				$output['in'] .= '<option id="' . $or->order_id . '" selected value="2">Đơn hàng đã xử lý</option>';
			} elseif ($or->order_status == 4) {
				$output['in'] .= '<option id="' . $or->order_id . '" selected value="2">Đang vận chuyển</option>';
			} elseif ($or->order_status == 3) {
				$output['in'] .= '<option id="' . $or->order_id . '" selected value="2">Đơn hàng đã bị hủy</option>';
			} elseif ($or->order_status == 5) {
				$output['in'] .= '<option id="' . $or->order_id . '" selected value="2">Đơn hàng đã giao</option>';
			}
		}
		$output['print'] = '';
		$output['print'] .= '<a href="print-order/' . $details->order_code . '" type="button" class="btn btn-danger">In đơn hàng</a>';
		return json_encode($output);

		// return view('admin.Order.view_order')->with(compact('order_details','customer','shipping','coupon_condition','coupon_number','getorder','order_status'));

	}

	public function history(Request $request)
	{
		$meta_desc = "Lịch sử mua hàng";
		// $meta_keywords = $value->product_slug;
		$meta_title = "Lịch sử mua hàng";
		$cate_post1 = CatePost::orderBy('cate_post_id', 'DESC')->get();
		$url_canonical = $request->url();
		$share_images = url('images/' . $request->product_image);
		$cate = category::all();
		$chinh = chinhsach::limit(3)->get();
		$com = '';
		// $meta_title="giới thiệu";
		// $meta_desc="trang chủ";
		// $com='';
		// $url_canonical = $request->url();
		if (!Session::get('customer_id')) {
			return redirect()->Route('cli_index')->with('error', 'Vui lòng đăng nhập để xem lịch sử mua hàng!');
		} else {
			// $order = Order::where('customer_id',Session::get('customer_id'))->orderby('created_at','DESC')->get();
			$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
			$sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
			$order = Order::where('customer_id', Session::get('customer_id'))->whereBetween('order_date', [$sub7days, $now])->orderby('created_at', 'DESC')->get();
			return view('Client.history')->with(compact('order', 'cate', 'com', 'url_canonical', 'meta_desc', 'meta_title', 'share_images', 'cate_post1', 'chinh'));
		}
	}

	public function view_history_order(Request $request, $order_code)
	{
		$meta_desc = "Lịch sử mua hàng";
		// $meta_keywords = $value->product_slug;
		$meta_title = "Chi tiết đơn hàng";
		$cate_post1 = CatePost::orderBy('cate_post_id', 'DESC')->get();
		$url_canonical = $request->url();
		$share_images = url('images/' . $request->product_image);
		$cate = category::all();
		$chinh = chinhsach::limit(3)->get();
		$com = '';
		
		// $meta_title="giới thiệu";
		// $meta_desc="trang chủ";
		// $com='';
		// $url_canonical = $request->url();

		$order_details = OrderDetail::with('product')->where('order_code', $order_code)->get();
		$getorder = Order::where('order_code', $order_code)->get();
		foreach ($getorder as $key => $ord) {
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$customer = custommer::where('customer_id', $customer_id)->first();
		$shipping = shipping::where('shipping_id', $shipping_id)->first();

		$order_details_product = OrderDetail::with('product')->where('order_code', $order_code)->get();

		foreach ($order_details_product as $key => $order_d) {

			$product_coupon = $order_d->product_coupon;
		}
		if ($product_coupon != 'no') {
			$coupon = Coupon::where('coupon_code', $product_coupon)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		} else {
			$coupon_condition = 2;
			$coupon_number = 0;
		}

		if (!Session::get('customer_id')) {
			return redirect()->Route('cli_index')->with('error', 'Vui lòng đăng nhập để xem lịch sử mua hàng!');
		} else {
			$order = Order::where('customer_id', Session::get('customer_id'))->orderby('created_at', 'DESC')->get();
			return view('Client.view_history_order')->with(compact('order', 'cate', 'com', 'url_canonical', 'meta_desc', 'meta_title', 'share_images', 'cate_post1', 'order_details', 'customer', 'shipping', 'coupon_condition', 'coupon_number', 'getorder', 'order_status', 'chinh'));
		}
	}


	public function manage_order(Request $req)
	{
		// $data=$req->order;
		$data = $req->order;
		if ($data == "") {
			$order = Order::orderby('created_at', 'DESC')->paginate(10);
		}
		if ($data == "all") {
			$order = Order::orderby('created_at', 'DESC')->paginate(10);
		}
		if ($data == "cancel") {
			$order = Order::where('order_status', 3)->orderby('created_at', 'DESC')->paginate(10);
		}
		if ($data == "new") {
			$order = Order::where('order_status', 1)->orderby('created_at', 'DESC')->paginate(10);
		}
		if ($data == "done") {
			$order = Order::where('order_status', 2)->orderby('created_at', 'DESC')->paginate(10);
		}
		if ($data == "move") {
			$order = Order::where('order_status', 4)->orderby('created_at', 'DESC')->paginate(10);
		}
		if ($data == "success") {
			$order = Order::where('order_status', 5)->orderby('created_at', 'DESC')->paginate(10);
		}


		return view('manager.Order.index')->with(compact('order'));
	}
	public function update_qty(Request $request)
	{
		$data = $request->all();
		$order_details = OrderDetail::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();
		$order_details->product_sales_quantity = $data['order_qty'];
		$order_details->save();
	}
	public function update_order_qty(Request $request)
	{
		//update order
		$data = $request->all();
		$order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();
		//send mail confirm
		$now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
		$title_mail = "Đơn hàng đã đặt được xác nhận" . ' ' . $now;
		$customer = Custommer::where('customer_id', $order->customer_id)->first();
		$data['email'][] = $customer->customer_email;
		$order_count = Order::where('order_status', 1)->get();
		$count = count($order_count);
		Session::put('or-nu', $count);



		//lay san pham

		foreach ($data['order_product_id'] as $key => $product) {
			$product_mail = Product::find($product);
			foreach ($data['quantity'] as $key2 => $qty) {

				if ($key == $key2) {

					$cart_array[] = array(
						'product_name' => $product_mail['product_name'],
						'product_price' => $product_mail['product_price'],
						'product_qty' => $qty
					);
				}
			}
		}


		//lay shipping
		$details = OrderDetail::where('order_code', $order->order_code)->first();

		$fee_ship = $details->product_feeship;
		$coupon_mail = $details->product_coupon;

		$shipping = Shipping::where('shipping_id', $order->shipping_id)->first();

		$shipping_array = array(
			'fee_ship' =>  $fee_ship,
			'customer_name' => $customer->customer_name,
			'shipping_name' => $shipping->shipping_name,
			'shipping_email' => $shipping->shipping_email,
			'shipping_phone' => $shipping->shipping_phone,
			'shipping_address' => $shipping->shipping_address,
			'shipping_notes' => $shipping->shipping_notes,
			'shipping_method' => $shipping->shipping_method

		);
		//lay ma giam gia, lay coupon code
		$ordercode_mail = array(
			'coupon_code' => $coupon_mail,
			'order_code' => $details->order_code
		);
		Mail::send('admin.mail.xacnhan_order', ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'code' => $ordercode_mail], function ($message) use ($title_mail, $data) {
			$message->to($data['email'])->subject($title_mail);
			$message->from($data['email'], $title_mail);
		});



		//order date
		$order_date = $order->order_date;
		$statistic = quanly::where('order_date', $order_date)->get();
		if ($statistic) {
			$statistic_count = $statistic->count();
		} else {
			$statistic_count = 0;
		}

		if ($order->order_status == 2) {
			//them
			$total_order = 0;
			$sales = 0;
			$profit = 0;
			$quantity = 0;

			foreach ($data['order_product_id'] as $key => $product_id) {

				$product = Product::find($product_id);
				$product_quantity = $product->soluong;
				$product_sold = $product->product_sold;
				//them
				$product_price = $product->product_price;
				$product_cost = $product->price_cost;
				$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

				foreach ($data['quantity'] as $key2 => $qty) {

					if ($key == $key2) {
						$pro_remain = $product_quantity - $qty;
						$product->soluong = $pro_remain;
						$product->product_sold = $product_sold + $qty;
						$product->save();
						//update doanh thu
						$quantity += $qty;
						$total_order += 1;
						$sales += $product_price * $qty;
						$profit = $sales - ($product_cost * $qty);
					}
				}
			}
			//update doanh so db
			if ($statistic_count > 0) {
				$statistic_update = quanly::where('order_date', $order_date)->first();
				$statistic_update->sales = $statistic_update->sales + $sales;
				$statistic_update->profit =  $statistic_update->profit + $profit;
				$statistic_update->quantity =  $statistic_update->quantity + $quantity;
				$statistic_update->total_order = $statistic_update->total_order + $total_order;
				$statistic_update->save();
			} else {

				$statistic_new = new quanly();
				$statistic_new->order_date = $order_date;
				$statistic_new->sales = $sales;
				$statistic_new->profit =  $profit;
				$statistic_new->quantity =  $quantity;
				$statistic_new->total_order = $total_order;
				$statistic_new->save();
			}
		}
	}
}

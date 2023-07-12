<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Session;
use App\Models\category;
use App\Models\pro_img;
use App\Models\rating;
use App\Models\attribute;
use App\Models\product_attr;
use App\Models\slider;
use App\Models\CatePost;
use App\Models\binhluan;
use App\Models\Post;
use App\Models\quangcao;
use App\Models\intro;
use App\Models\thuoctinh;
use App\Models\custommer;
use App\Models\chinhsach;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function error_page()
    {
        return view('errors.404');
    }
    public function fetch_data(Request $req)
    {
        $product = product::whereNotIn('category_id', [10])->where('product_status', 1)->orderBy('product_id', 'desc')->paginate(6);
        return view('client.paginate_index', compact('product'))->render();
    }
    public function giohang()
    {
        $output = '';
        $total = 0;
        if (count((array)session::get('cart')) == 0) {
            $output .= '<a href="#" title="View your shopping cart" class="cart-link">
        <span class="amount"> 0 VNĐ</span>
        <span class="contents"><span class="badge badge-pill badge-danger">0</span><span class="lai">Sản phẩm</span></span>';
        } else {
            foreach (session::get('cart') as $id => $details) {
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
            }
            $output .= '<a href="#" title="View your shopping cart" class="cart-link">
    <span class="amount">' . number_format($total, 0, ',', '.') . ' VNĐ</span>
    <span class="contents"><span class="badge badge-pill badge-danger">' . count((array)session::get('cart')) . '</span><span class="lai">Sản phẩm</span></span>';
        }
        echo $output;
    }
    public function show(Request $req)
    {
        $output = '';

        $output .= '<div class="cart">
    <img class=" left1" width="70px" height="55px" src="../web/images/download.png" alt="">
    <div class="cart-items">';
        $output .= '<ul>';
        if (session::get('cart')) {
            foreach (session::get('cart') as $id => $details) {
                $si = $details['size'];
                $km = $details['price'] - $details['price_pro'];
                if ($si == "Lớn") {
                    $sub = ($km + (($km * 20) / 100)) * $details['quantity'];
                } elseif ($si == "Nhỏ") {
                    $sub = ($km - (($km * 20) / 100)) * $details['quantity'];
                } else {
                    $sub = $km * $details['quantity'];
                }
                // $gia=$details['price']-$details['price_pro'];
                $tien = $sub;


                $output .= '<li class="clearfix">
        <div class="img-con">';
                if ($details['price_pro'] != "") {
                    $output .= '<span class="badge badge-pill badge-danger ban2">-' . number_format($details['price_pro'], 0, ',', '.') . '</span>';
                }

                $output .= '<img width="70px" height="150px" class="productimg img-thumbnail" src="../images/' . $details['image'] . '" />
        <div class="bu" style="margin-left:20px">
        <button title="xóa khỏi giỏ hàng" style="font-size: 10px;" class="btn btn-danger btn remove-from-cart" data-id="' . $id . '"><i class="fas fa-trash"></i></button> 
        </div>
        </div>
        <div class="detail">
        <h5 style="text-transform: uppercase;color: steelblue;">' . $details['name'] . '</h5>
        <span class="item-price"><span class="giaca">Giá:<span style="font-size: 20px; color: brown;">' . number_format($tien, 0, ',', '.') . ' VNĐ</span><br>
        <span  class="quantity1">Số lượng: <span style="font-size: 20px; color: brown;">' . $details['quantity'] . '</span></span><br>';
                if ($details['size'] == "") {
                    $output .= '<span>Size:<span style="font-size: 20px; color: brown;">Mặc Định</span></span></span>';
                } else {
                    $output .= '<span >Size:<span style="font-size: 20px; color: brown;">' . $details['size'] . '</span></span><br><span>';
                }


                $output .= '</div>


        </li>';
            }
        }

        $output .= '</ul>
</div>
<a href="../cli/checkout" class="checkout">ĐI ĐẾN GIỎ HÀNG→</a>



</div>';
        echo $output;
    }

    public function shopping()
    {
        $output = '';
        $total = 0;
        $i = 1;

        $output .= '
   <table class="timetable_sub">
   <thead class="car">
   <tr>
   <th>STT</th>
   <th>Hình</th>
   <th>Số lượng</th>
   <th>Tên sản phẩm</th>
   <th>Giá</th>
   <th>Tổng</th>
   <th>Size</th>
   <th>Action</th>
   </tr>
   </thead><tbody>';
        if (session::get('cart')) {
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
                $output .= '                 
        <tr class="rem1">
        <td class="invert">' . $i++ . '</td>
        <td class="invert-image">
        <a href="../detail' . $details['pro_id'] . '">
        <img src="../images/' . $details['image'] . '" alt=" " class="img-responsive">
        </a>
        </td>
        <td data-th="Quantity">

        <div class="quantity-select">
        <input type="number" min="1" class="quantity" data-id="' . $id . '" value="' . $details['quantity'] . '">
        <!-- <input type="number" id="tien" value="' . $details['quantity'] . '"> -->

        </div>

        </td>

        <td class="invert" style="text-transform: uppercase">' . $details['name'] . '</td>
        <td class="invert">' . number_format($sub1, 0, ',', '.') . ' VNĐ</td>
        <td class="invert">' . number_format($totalitem, 0, ',', '.') . ' VNĐ</td>
        <td class="invert">' . $details['size'] . '</td>

        <td class="actions" data-th="">
        <button class="btn btn-primary btn update-cart" data-id="' . $id . '"><i class="fas fa-sync-alt"></i></button>

        <button class="btn btn-danger btn remove-from-cart" data-id="' . $id . '"><i class="fas fa-trash"></i></button>
        </td>
        </tr>';
            }
        }
        $output .= '</tbody></table>
</div>   
</div>
</div>
</div>

<div class="tongtien">
<p><span class="bold">Tổng tiền:</span><span class="tongt">&nbsp;' . number_format($total, 0, '.', '.') . ' VNĐ</span></p>';

        if (Session::has('customer_id') && Session('cart') != NULL) {
            $output .= '<a href="../cli/index" class="continute">Tiếp tục mua hàng</a>
    <a href="../cli_check/payment"  class="process">Tiến hành thanh toán</a>';
        } elseif (Session::has('customer_id') == NULL) {
            $output .= '<a href="../cli/index" class="continute">Tiếp tục mua hàng</a>
    <a href="../cli_check/payment" data-toggle="modal" class="process" data-target="#exampleModal">Tiến hành thanh toán</a>';
        } else {
            $output .= '<a href="../cli/index" class="continute">Tiếp tục mua hàng</a>';
        }



        $output .= '</div>';
        echo $output;
    }
    public function index(Request $request)
    {
        $cate_post1 = CatePost::all();
        $url_canonical = $request->url();
        $slide = slider::orderBy('slider_id', 'desc')->where('slider_status', 0)->get();
        $size = attribute::where('name', 'size')->get();
        $color = attribute::where('name', 'color')->get();
        $hot = attribute::where('name', 'hot')->get();
        $cate = category::all();
        $chinh = chinhsach::limit(3)->get();
        $quangcao = quangcao::orderBy('quangcao_id', 'desc')->get();
        $bestsell = product::orderBy('product_sold', 'DESC')->paginate(3);
        $sp = product::orderBy('product_sold', 'DESC')->limit(6)->get();
        $toping = product::where('category_id', 10)->where('product_status', 1)->get();
        $com = 'index';
        $product = product::whereNotIn('category_id', [10])->where('product_status', 1)->orderBy('product_id', 'desc')->paginate(6);
        //dd($cate);
        // $product=product::where([
        //     'product_status'=>1,


        // ]);
        $meta_title = "VinaFood";
        $meta_desc = "VinaFood";
        // foreach($product as $p){
        //     $pro_id=$p->product_id;

        // }
        // $product_id = $request->product_id;
        $post = Post::orderBy('post_id', 'desc')->where('post_status', 0)->get();
        // $product=$product->orderBy('product_id','DESC')->paginate(6);
        return view('client/index', compact('product', 'com', 'cate', 'url_canonical', 'size', 'color', 'hot', 'slide', 'bestsell', 'meta_title', 'meta_desc', 'cate_post1', 'post', 'quangcao', 'sp', 'toping', 'chinh'));
    }
    public function profile(Request $request)
    {
        $com = '';
        $cate = category::orderby('category_id', 'desc')->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'desc')->get();
        $cus_id = Session::get('customer_id');
        $cus = custommer::where('customer_id', $cus_id)->get();
        $chinh = chinhsach::limit(3)->get();
        //seo 
        $meta_desc = "Thông tin cá nhân";
        $meta_title = "Thông tin cá nhân";
        $url_canonical = $request->url();
        return view('client.profile.info_account', compact('meta_title', 'meta_desc', 'url_canonical', 'com', 'cate', 'cate_post1', 'chinh', 'cus'));
    }

    public function update_profile(Request $request)
    {
        $this->validate($request, [
            [
                'name' => 'required|min:8|max:32',
                'email' => 'required|min:8|max:32',
                'phone' => 'required|same:new_password',
            ],
            [
                'name.required' => '+Bạn chưa nhập họ và tên',
                'email.required' => '+Bạn chưa nhập email',
                'phone.required' => '+Bạn chưa nhập số diện thoại',
                'phone.min' => '+Mật khẩu phải lớn hơn 8',
                'phone.max' => '+Mật khẩu phải nhỏ hơn 11',
            ]
        ]);
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $cus_id = Session::get('customer_id');
        $checkUser = DB::table('tbl_customers')
            ->where([
                'customer_id' => $cus_id,
            ])->value('customer_name', 'customer_phone', 'customer_email');
        //dd($checkUser==$password);
        if ($email == $checkUser || $name == $checkUser || $phone == $checkUser) {
            custommer::find($cus_id)->update([
                'customer_name' => $name,
                'customer_phone' => $phone,
                'customer_email' => $email

            ]);
            Session::flash('message', 'Thay đổi thông tin thành công');
            return back();
        } else {
            return back()->with('error', 'Thay đổi thông tin thất bại');
        }
    }

    public function change_password(Request $request)
    {
        $com = '';
        $cate = category::orderby('category_id', 'desc')->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'desc')->get();
        $cus_id = Session::get('customer_id');
        $cus = custommer::where('customer_id', $cus_id)->get();
        $chinh = chinhsach::limit(3)->get();
        //seo 
        $meta_desc = "Đặt lại mật khẩu";
        $meta_title = "Đặt lại mật khẩu";
        $url_canonical = $request->url();
        return view('client.profile.change_password', compact('meta_title', 'meta_desc', 'url_canonical', 'com', 'cate', 'cate_post1', 'chinh', 'cus'));
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            [
                'old_password' => 'required|min:8|max:32',
                'new_password' => 'required|min:8|max:32',
                'confirm_password' => 'required|same:new_password',
            ],
            [
                'old_password.required' => '+Bạn chưa nhập mật khẩu cũ',
                'new_password.required' => '+Bạn chưa nhập mật khẩu mới',
                'confirm_password.required' => '+Bạn chưa nhập lại mật khẩu',
                'new_password.min' => '+Mật khẩu phải lớn hơn 8',
                'new_password.max' => '+Mật khẩu phải nhỏ hơn 32',
                'confirm_password.same' => '+Mật khẩu không trùng khớp',
            ]
        ]);
        $op = md5($request->old_password);
        $np = $request->new_password;
        $cp = $request->confirm_password;
        $cus_id = Session::get('customer_id');
        $checkUser = DB::table('tbl_customers')
            ->where([
                'customer_id' => $cus_id,
            ])->value('customer_password');
        //dd($checkUser==$password);
        if ($np == $cp && $op == $checkUser) {
            custommer::find($cus_id)->update([
                'customer_password' => md5($np)
            ]);
            Session::flash('message', 'Thay đổi mật khẩu thành công');
            return back();
        } else {
            return back()->with('error', 'Mật khẩu cũ hoặc mật khẩu mới không trùng khớp, thay đổi mật khẩu thất bại');
        }
    }

    public function chinhsach(Request $request, $id)
    {
        $com = '';
        $chinh1 = chinhsach::FindOrFail($id);
        $cate = category::orderby('category_id', 'desc')->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'desc')->get();
        $chinh = chinhsach::limit(3)->get();
        //seo 
        $meta_desc = "";
        $meta_title = $chinh1->title;
        $url_canonical = $request->url();
        $share_image = url('public/uploads/chinhsach/' . $chinh1->image);
        //--seo

        return view('client.chinhsach', compact('meta_title', 'meta_desc', 'url_canonical', 'com', 'cate', 'cate_post1', 'chinh1', 'chinh'));
    }

    public function gioithieu(Request $request)
    {
        $com = '';
        $gioithieu = intro::all();
        $cate = category::orderby('category_id', 'desc')->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'desc')->get();
        $meta_title = "Giới thiệu";
        $meta_desc = "về chúng tôi";
        $chinh = chinhsach::limit(3)->get();
        $url_canonical = $request->url();
        return view('client.gioithieu', compact('meta_title', 'meta_desc', 'url_canonical', 'com', 'cate', 'cate_post1', 'gioithieu', 'chinh'));
    }

    public function khuyenmai(Request $request)
    {
        $com = '';
        $khuyenmai = intro::all();
        $cate = category::orderby('category_id', 'desc')->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'desc')->get();
        $meta_title = "Khuyến Mãi";
        $meta_desc = "của chúng tôi";
        $chinh = chinhsach::limit(3)->get();
        $url_canonical = $request->url();
        return view('client.khuyenmai', compact('meta_title', 'meta_desc', 'url_canonical', 'com', 'cate', 'cate_post1', 'khuyenmai', 'chinh'));
    }

    public function lienhe(Request $request)
    {
        $com = '';
        $lienhe = intro::all();
        $cate = category::orderby('category_id', 'desc')->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'desc')->get();
        $meta_title = "Liên hệ";
        $meta_desc = "chúng tôi";
        $chinh = chinhsach::limit(3)->get();
        $url_canonical = $request->url();
        return view('client.lienhe', compact('meta_title', 'meta_desc', 'url_canonical', 'com', 'cate', 'cate_post1', 'lienhe', 'chinh'));
    }

    public function detail(Request $request, $id)
    {
        $size = product_attr::with('attribute')->where('product_id', $id)->get();
        $hot = attribute::where('name', 'hot')->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'DESC')->get();
        $img_detail = pro_img::where('product_id', $id)->limit(2)->get();
        $cate = category::all();
        $com = 'detail';
        $rating = rating::where('product_id', '=', $id)->avg('rating');
        $rating = round($rating);
        $chinh = chinhsach::limit(3)->get();
        $detail = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where("tbl_product.product_id", $id)->get();
        foreach ($detail as $key => $value) {
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            $product_cate = $value->category_name;
            $cate_id = $value->category_id;
            $meta_desc = $value->product_desc;
            $meta_title = $value->product_name;
            $url_canonical = $request->url();
            $share_images = url('images/' . $value->product_image);
        }
        $del = product::where("product_id", $id)->first();
        $del->product_view = $del->product_view + 1;
        $del->save();
        $related_product = Product::with('category')->where('category_id', $category_id)->whereNotIn('product_id', [$product_id])->get();
        return view('client/detail', compact(
            'detail',
            'com',
            'cate',
            'img_detail',
            'url_canonical',
            'rating',
            'size',
            'hot',
            'meta_desc',
            'meta_title',
            'url_canonical',
            'cate_post1',
            'related_product',
            'cate_id',
            'product_cate',
            'chinh',
            'share_images'
        ));
    }

    public function search(Request $request)
    {
        $meta_desc = "Kết quả tìm kiếm";
        // $meta_keywords = $value->product_slug;
        $meta_title = "Kết quả tìm kiếm";
        $size = attribute::where('name', 'size')->get();
        $hot = attribute::where('name', 'hot')->get();
        $url_canonical = $request->url();
        $cate = category::all();
        $key = $request->keyword;
        $chinh = chinhsach::limit(3)->get();
        $bestsell = product::orderBy('product_sold', 'DESC')->limit(3)->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'desc')->get();
        $com = '';
        $search = product::where('product_name', 'like', '%' . $key . '%')->get();
        // foreach ($search as $s) {
        //     $meta_desc = $s->product_desc;
        //     $meta_title = $s->product_name;
        // }
        $dem = count($search);
        if (count($search) > 0) {
            Session::flash('Message', 'Tìm thấy sản phẩm');
        } else {
            Session::flash('Error', 'Không tìm thấy sản phẩm');
            $meta_title = "Không tìm thấy sản phẩm";
            $meta_desc = "Không tìm thấy";
        }
        return view('client/search', compact('search', 'com', 'dem', 'cate', 'url_canonical', 'meta_title', 'meta_desc', 'cate_post1', 'size', 'hot', 'bestsell', 'chinh'));
    }
    public function dangxuatkh()
    {
        Session::forget('customer_id');
        return redirect()->route('cli_index');
    }

    public function thankyou(Request $request)
    {
        $meta_desc = "Cảm ơn quý khách";
        // $meta_keywords = $value->product_slug;
        $meta_title = "Cảm ơn quý khách";
        $cate_post1 = CatePost::orderBy('cate_post_id', 'DESC')->get();
        $url_canonical = $request->url();
        $share_images = url('images/' . $request->product_image);
        $chinh = chinhsach::limit(3)->get();
        $cate = category::all();
        $com = '';
        return view('Client/thankyou', compact('cate', 'com', 'url_canonical', 'meta_desc', 'meta_title', 'share_images', 'cate_post1', 'chinh'));
    }
    public function autocomplete_ajax(Request $request)
    {
        $data = $request->all();

        if ($data['query']) {

            $product = product::where('product_status', 1)->where('product_name', 'LIKE', '%' . $data['query'] . '%')->get();

            $output = '
        <ul class="dropdown-menu tai2" style="display:block;">';

            foreach ($product as $key => $val) {
                $output .= '
         <li class="li_search_ajax"><a href="#">' . $val->product_name . '</a></li>
         ';
            }

            $output .= '</ul>';
            echo $output;
        }
    }
    public function insert_rating(Request $request)
    {
        $data = $request->all();
        $rating = new rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        $product = product::find($request->product_id);
        $product->pro_rating += 1;
        $product->pro_rating_number += $data['index'];
        $product->save();
        echo 'done';
    }

    public function list_pro(Request $request, $id)
    {
        $com = '';
        $meta_desc = $request->product_desc;

        $url_canonical = $request->url();
        $share_images = url('images/' . $request->product_image);
        $slide = slider::limit(4)->get();
        $size = attribute::where('name', 'size')->get();
        $color = attribute::where('name', 'color')->get();
        $hot = attribute::where('name', 'hot')->get();
        $url_canonical = $request->url();
        $chinh = chinhsach::limit(3)->get();
        $cate = category::where('category_status', 1)->get();
        $cate_post1 = CatePost::orderBy('cate_post_id', 'DESC')->get();
        $bestsell = product::orderBy('product_sold', 'DESC')->limit(3)->get();


        $product = product::where('category_id', $id);
        //dd($product);

        if ($request->orderby) {
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'desc':
                    // $product_list=product::where('category_id',$id)->orderBy('product_id','DESC')->paginate(6)->appends(request()->query()); 
                    $product->orderby('product_id', 'DESC')->paginate(6);
                    break;
                case 'asc':
                    // $product_list=product::where('category_id',$id)->orderBy('product_id','ASC')->paginate(6)->appends(request()->query()); 
                    $product->orderby('product_id', 'ASC')->paginate(6);
                    break;
                case 'primax':
                    // $product_list=product::where('category_id',$id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query()); 
                    $product->orderby('product_price', 'DESC')->paginate(6);
                    break;
                case 'primin':
                    // $product_list=product::where('category_id',$id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query()); 
                    $product->orderby('product_price', 'ASC')->paginate(6);
                    break;
                    // $product_list=$product->where('category_id',$id)->paginate(12);

            }
        }

        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    // $product_list=product::where('product_price','<',15000)->where('category_id',$id)->paginate(6)->appends(request()->query()); 
                    $product->where('product_price', '<', 10000)->paginate(6);

                    break;
                case '2':
                    // $product_list=product::whereBetween('product_price',[10000,15000])->where('category_id',$id)->paginate(6)->appends(request()->query());
                    $product->whereBetween('product_price', [10000, 15000])->paginate(6);
                    break;
                case '3':
                    // $product_list=product::whereBetween('product_price',[15000,20000])->where('category_id',$id)->paginate(6)->appends(request()->query());
                    $product->whereBetween('product_price', [15000, 20000])->paginate(6);
                    break;
                case '4':
                    // $product_list=product::whereBetween('product_price',[20000,30000])->where('category_id',$id)->paginate(6)->appends(request()->query());
                    $product->whereBetween('product_price', [20000, 30000])->paginate(6);
                    break;
                case '5':
                    // $product_list=product::whereBetween('product_price',[30000,40000])->where('category_id',$id)->paginate(6)->appends(request()->query());
                    $product->whereBetween('product_price', [30000, 40000])->paginate(6);
                    break;
                case '6':
                    // $product_list=product::whereBetween('product_price',[40000,50000])->where('category_id',$id)->paginate(6)->appends(request()->query());
                    $product->whereBetween('product_price', [40000, 50000])->paginate(6);
                    break;
                case '7':
                    // $product_list=product::where('product_price','>',50000)->where('category_id',$id)->paginate(6)->appends(request()->query());
                    $product->where('product_price', '>', 50000)->paginate(6);
                    break;
            }
        }

        // if(!$request->price && !$request->orderby){
        //     $product->where('category_id',$id)->paginate(6);
        // }
        if ($request->keyword) {
            $key = $request->keyword;
            $product->where('product_name', 'like', '%' . $key . '%')->paginate(6);
        }

        $product_list = $product->paginate(6);
        $dem = count($product_list);
        if ($dem == 0) {
            Session::flash('thongbao', 'không có sản phẩm nào');
        }

        $cate1 = category::where('category_id', $id)->take(1)->get();
        foreach ($cate1 as $key => $cate2) {
            //seo 
            $meta_desc = $cate2->category_desc;
            // $meta_keywords = $cate2->cate_post_slug;
            $meta_title = $cate2->category_name;
            // $cate_id = $cate2->cate_post_id;
            $url_canonical = $request->url();
            // $share_image = url('public/frontend/images/share_news.png');


        }




        return view('client.list_pro', compact('product_list', 'cate', 'cate_post1', 'url_canonical', 'com', 'size', 'color', 'hot', 'slide', 'share_images', 'meta_title', 'meta_desc', 'bestsell', 'chinh'));
    }





    public function reply_comment(Request $request)
    {
        $data = $request->all();
        $comment = new binhluan();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'TeaMilkStore';
        $comment->save();
    }
    public function allow_comment(Request $request)
    {
        $data = $request->all();
        $comment = binhluan::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }



    // public function list_comment(){
    //     $comment = binhluan::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id','DESC')->get();
    //     $comment_rep = binhluan::with('product')->where('comment_parent_comment','>',0)->get();
    //     return view('admin.binhluan.list_comment')->with(compact('comment','comment_rep'));
    // }
    public function list_comment()
    {
        $comment = binhluan::with('product')->where('comment_parent_comment', '=', 0)->orderBy('comment_id', 'DESC')->paginate(10);
        $comment_rep = binhluan::with('product')->where('comment_parent_comment', '>', 0)->get();
        return view('manager.comment.index')->with(compact('comment', 'comment_rep'));
    }
    // public function send_comment(Request $request){
    //     $product_id = $request->product_id;
    //     $comment_name = $request->comment_name;
    //     $comment_content = $request->comment;
    //     $comment = new binhluan();
    //     $comment->comment = $comment_content;
    //     $comment->comment_name = $comment_name;
    //     $comment->comment_product_id = $product_id;
    //     $comment->comment_status = 1;
    //     $comment->comment_parent_comment = 0;
    //     $comment->save();
    // }
    public function send_comment(Request $request)
    {

        $com_id = $request->commentId;
        $pro_id = $request->pro_id;
        $data = new binhluan();
        $data->comment_name = $request->name;
        $data->comment_product_id = $pro_id;
        $data->comment = $request->comment;
        $data->comment_parent_comment = $request->commentId;
        $data->comment_status = 0;
        $data->save();
    }
    // public function load_comment(Request $request){
    //     $product_id = $request->product_id;
    //     $comment = binhluan::where('comment_product_id',$product_id)->where('comment_parent_comment','=',0)->where('comment_status',0)->get();
    //     $comment_rep = binhluan::with('product')->where('comment_parent_comment','>',0)->get();
    //     $output = '';
    //     foreach($comment as $key => $comm){
    //         $output.= ' 
    //         <div class="row style_comment">

    //                                     <div class="col-md-2">
    //                                         <img width="50%"style="margin-top:10px" src="'.url('web/images/avatar.png').'" class="img img-responsive img-thumbnail">
    //                                     </div>
    //                                     <div class="col-md-10 back">
    //                                         <p style="color:green;">@'.$comm->comment_name.'</p>
    //                                         <p style="color:#000;">'.$comm->comment_date.'</p>
    //                                         <p>'.$comm->comment.'</p>
    //                                     </div>
    //                                 </div><p></p>
    //                                 ';

    //                                 foreach($comment_rep as $key => $rep_comment)  {
    //                                     if($rep_comment->comment_parent_comment==$comm->comment_id)  {
    //                                  $output.= ' <div class="row style_comment" >

    //                                     <div class="col-md-2 phai">
    //                                         <img width="50%" src="'.url('web/images/76729750.jpg').'" class="img img-responsive ">
    //                                     </div>
    //                                     <div class="col-md-8 rep">
    //                                         <p style="color:blue;">@Admin</p>
    //                                         <p style="color:#000;">'.$rep_comment->comment.'</p>
    //                                         <p></p>
    //                                     </div>
    //                                 </div><p></p>';
    //                                     }
    //                                 }
    //     }
    //     echo $output;

    // }
    // public function reply($parent=0,$magrin_left=0){
    //     $html='';
    //     $com=binhluan::where('comment_parent_comment',$parent)->get();
    //     $count=count($com);
    //     if($count == 0){
    //         $margin_left=0;
    //     }
    //     else{
    //         $margin_left+=80;
    //     }
    //     if($count > 0){
    //         foreach($com as $c){
    //             $html.='<div class="media1">
    //                     <a class="pull-left mr-2" href="#!">
    //                       <img class="media-object comment-avatar" src="'.url('web/images/avatar.png').'" alt="" width="29" height="29" />
    //                     </a>
    //                     <div class="media-body" id="comment">
    //                     <div class="comment-info">
    //                         <h4 class="comment-author">
    //                            <a href="#!" style="color:black;list-style-type:none;font-size:15px;">'.$c['comment_name'].'</a>
    //                         </h4>
    //                         <time datetime="2013-04-06T13:53">'.$c['comment_date'].'</time>
    //                         <a class="comment-button reply" href="#" id="'.$c['comment_product_id'].'"><i class="tf-ion-chatbubbles"></i>Reply</a>
    //                     </div>
    //                     <p>
    //                         '.$c['comment'].'
    //                     </p>
    //                     </div></div>';
    //                     $html.=reply($c['comment_id'],$margin_left);
    //         }
    //         return $html;
    //     }

    // }
    public function load_comment(Request $req)
    {
        $id = $req->id;
        $row = binhluan::where('comment_parent_comment', 0)->where('comment_product_id', $id)->orderBy('comment_id', 'desc')->get();
        $row2 = binhluan::where('comment_parent_comment', '>', 0)->get();
        $html1 = '';
        foreach ($row as $r) {
            $html1 .= '<div class="media1">
        <a class="pull-left mr-2" href="#!">
        <img class="media-object comment-avatar" src="' . url('web/images/avatar.png') . '" alt="" width="29" height="29" />
        </a>
        <div class="media-body" id="comment">
        <div class="comment-info">
        <div class="pad">
        <h4  class="comment-author">
        <a href="#!" style="color:black;list-style-type:none;font-size:15px;">' . $r['comment_name'] . '</a>
        </h4>
        <time  datetime="2013-04-06T13:53">' . $r['comment_date'] . '</time>

        <a style="cursor:pointer;color:darkblue;font-size:13px;font-weight:bold" class="comment-button reply"  id="' . $r['comment_id'] . '"><i class="tf-ion-chatbubbles"></i>Reply</a>
        </div>
        </div>
        <p style="font-weight: bold;color: firebrick;">
        ' . $r['comment'] . '
        </p>
        </div>
        </div>';
            foreach ($row2 as $r2) {
                if ($r2->comment_parent_comment == $r->comment_id) {
                    $html1 .= '<div class="media1 marl">
                <a class="pull-left mr-2" href="#!">
                <img class="media-object comment-avatar" src="' . url('web/images/76729750.jpg') . '" alt="" width="33" height="29" />
                </a>
                <div class="media-body" id="comment">
                <div class="comment-info">
                <div class="pad">
                <h4  class="comment-author">
                <a href="#!" style="color:black;list-style-type:none;font-size:15px;">' . $r2['comment_name'] . '</a>
                </h4>
                <time  datetime="2013-04-06T13:53">' . $r2['comment_date'] . '</time>
                </div>

                </div>
                <p style="font-weight: bold;color: firebrick;">
                ' . $r2['comment'] . '
                </p>
                </div>
                </div>';
                }
            }
            // $html1.= reply($r['comment_id']);
        }
        echo $html1;
    }
}

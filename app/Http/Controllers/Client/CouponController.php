<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class CouponController extends Controller
{
    public function unset_coupon(){
		$coupon = Session::get('coupon');
        if($coupon==true){
          
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
	}
    // public function insert_coupon(){
    // 	return view('admin.magiamgia.insert_coupon');
    // }
    public function insert_coupon(){
        return view('manager.coupon.insert_coupon');
    }
    public function delete_coupon($coupon_id){
    	$coupon = coupon::find($coupon_id);
    	$coupon->delete();
    	Session::flash('message','Xóa mã giảm giá thành công');
        return redirect()->route('list_coupon');
    }
    // public function list_coupon(){
    //     $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
    //     //dd($today);
    // 	$coupon = Coupon::orderby('coupon_id','DESC')->paginate(5);
    // 	return view('admin.magiamgia.list_coupon')->with(compact('coupon','today'));
    // }

    public function list_coupon(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
        //dd($today);
        $coupon = Coupon::orderby('coupon_id','DESC')->paginate(50);
        return view('manager.coupon.index')->with(compact('coupon','today'));
    }
    public function insert_coupon_code(Request $request){
    	$data = $request->all();

        $this->validate($request, [
            'coupon_name'=>'required',
            'coupon_number'=>'required|numeric',
            'coupon_time'=>'numeric|required',
            'coupon_code'=>'required',
            'coupon_date_start'=>'date|required',
            'coupon_date_end'=>'date|required'

        ],[
            'coupon_name.required'=>'+Ban chưa nhập tên ',
            'coupon_number.required'=>'+Ban chưa nhập số tiền giảm ',
            'coupon_number.numeric'=>'+ Số tiền giảm phải là số',
            'coupon_time.numeric'=>'+ Số lượng mã giảm phải là số',
            'coupon_date_end.date'=>'+ bạn phải nhập đúng định dạng ngày',
            'coupon_date_start.date'=>'+ Bạn phải nhập đúng định dạng ngày'
            
        ]);

    	$coupon = new Coupon;

    	$coupon->coupon_name = $data['coupon_name'];
    	$coupon->coupon_number = $data['coupon_number'];
    	$coupon->coupon_code = $data['coupon_code'];
    	$coupon->coupon_time = $data['coupon_time'];
    	$coupon->coupon_condition = $data['coupon_condition'];
        $coupon->start_day = $data['coupon_date_start'];
        $coupon->end_day = $data['coupon_date_end'];
    	$coupon->save();


    	Session::flash('message','Thêm mã giảm giá thành công');
        return redirect()->route('list_coupon');


    }

    public function check_coupon(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
        $data = $request->all();
        if(Session::get('customer_id')){
             $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('end_day','>=', $today)->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
            if($coupon){
                return redirect()->back()->with('error','Mã giảm giá đã sử dụng, hoặc đã hết hạn!');
            }else{
                $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('end_day','>=', $today)->first();
                if($coupon_login){
                    $count_coupon = $coupon_login->count();
                    if($count_coupon>0){
                        $coupon_session = Session::get('coupon');
                        if($coupon_session==true){ 
                            $is_avaiable = 0;
                            if($is_avaiable==0){
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,

                                );
                                Session::put('coupon',$cou);
                            }
                        }else{
                            $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,

                                );
                            Session::put('coupon',$cou);
                        }
                        Session::save();
                        //dd("ma da duoc them");
                        return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                    }

                }else{
                    return redirect()->back()->with('error','Mã giảm giá không đúng, hoặc đã hết hạn!');
                }
            }
        }else{
        $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('end_day','>=', $today)->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng, hoặc đã hết hạn!');
        }
    }
    }   
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\custommer;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    
    public function send_mail($condition ,$number ,$code ,$time){
        $customer = Custommer::where('custommer_vip','=',NULL)->get();

        $coupon = Coupon::where('coupon_code',$code)->first();
        $start_coupon = $coupon->start_day;
        $end_coupon = $coupon->end_day;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m');

        $title_mail = "Flash Sale ".' '.$now;
        
        $data = [];
        foreach($customer as $normal){
            $data['customer_email'][] = $normal->customer_email;
        }
        $coupon = array(
            'start_day' => $start_coupon,
            'end_day' => $end_coupon,
            'coupon_time' => $time,
            'coupon_condition' => $condition,
            'coupon_number' => $number,
            'coupon_code' => $code
        );
        Mail::send('admin.mail.send_coupon_vip',['coupon' => $coupon], function($message) use ($title_mail,$data){
            $message->to($data['customer_email'])->subject($title_mail);//send this mail with subject
            $message->from($data['customer_email'],$title_mail);//send from this mail
    });
  
         return redirect()->back()->with('message','Gửi mã khuyến mãi khách hàng thành công');
    }
    
    public function send_mail_vip($condition ,$number ,$code ,$time){
        $customer = Custommer::where('custommer_vip','=',1)->get();

        $coupon = Coupon::where('coupon_code',$code)->first();
        $start_coupon = $coupon->start_day;
        $end_coupon = $coupon->end_day;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Mã khuyến mãi ngày".' '.$now;
        
        $data = [];
        foreach($customer as $normal){
            $data['customer_email'][] = $normal->customer_email;
        }
        $coupon = array(
            'start_day' => $start_coupon,
            'end_day' => $end_coupon,
            'coupon_time' => $time,
            'coupon_condition' => $condition,
            'coupon_number' => $number,
            'coupon_code' => $code
        );
        Mail::send('admin.mail.send_coupon_vip',['coupon' => $coupon], function($message) use ($title_mail,$data){
                $message->to($data['customer_email'])->subject($title_mail);//send this mail with subject
                $message->from($data['customer_email'],$title_mail);//send from this mail
        });
  
         return redirect()->back()->with('message','Gửi mã khuyến mãi khách hàng vip thành công');
    }
    public function mail_example(){
        return view('admin.mail.send_coupon_vip');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
   
    public function getdangky(){
        return view('admin.taikhoan.dangky');
    }

    public function postdangky(Request $req){
        $this->validate($req, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone' => 'required|regex:/(07)[0-9]{9}/|unique:users,phone',
            'password'=>'required|min:8|max:32',
            're_password'=>'required|same:password'
        ],[
            'name.required'=>'Ban chưa nhập tên',
            'email.required'=>'Ban chưa nhập email',
            'email.email'=>'Email chưa đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'phone.required'=>'Bạn chưa nhập số điện thoạt',
            'phone.regex'=>'Số Điện thoại chưa đúng định dạng',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            're_password.required'=>'Bạn phải nhập lại mật khẩu',
            'password.min'=>'Mật khẩu phải ít nhất 8 ký tự',
            'password.max'=>'Mật khẩu không vượt quá 32 ký tự',
            're_password.same'=>'Mật khẩu không trùng khớp'
        ]);

            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->phone = $req->phone;
            $user->password = $req->password;
            //dd($user);
            $user->save();
            return redirect()->route('login')->with('thongbao','Đăng ký tài khoản thành công!!');
    }
    public function getdangnhap(){
        return view('admin.taikhoan.dangnhap');
    }

    public function postdangnhap(Request $req){
        $email = $req->email;
        $password = $req->password;

        $result = DB::table('tbl_admin')->where('email',$email)->where('password',$password)->first();
        if($result){
            Session::put('name', $result->name);
            Session::put('admin_id', $result->admin_id);
            return redirect()->route('pro_index');
        }else{
            return redirect()->back()->with('thongbao','Đăng nhập thất bại');
        }
    }
    
    public function dangxuat(){
       
        Session::put('name', null);
        Session::put('id', null);
        return redirect()->route('login');
    }
}

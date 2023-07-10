<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;
use App\Models\Roles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // public function register_auth(){
    //     return view('admin.custommer_authen.dangky_auth');
    // }
    public function register_auth()
    {
        return view('manager.user_auth.login');
    }
    // public function login_auth(){
    //     return view('admin.custommer_authen.dangnhap_auth');
    // }
    public function login_auth()
    {
        return view('manager.user_auth.login');
    }
    public function register(Request $request)
    {
        $this->validation($request);
        $data = $request->all();
        $admin = new admin();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = md5($data['password']);
        $admin->phone = $data['phone'];
        $admin->save();
        return redirect()->route('regis')->with('message', 'đăng ký thành công');
    }
    public function validation(Request $request)
    {
        return $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/(0)[0-9]{8}/|unique:tbl_admin,phone',
            'email' => 'required|email|unique:tbl_admin,email',
            'password' => 'required|max:255|min:5|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/'
        ], [
            'name.required' => '+Ban chưa nhập tên',
            'email.required' => '+Ban chưa nhập email',
            'email.email' => '+Email chưa đúng định dạng',
            'email.unique' => '+Email đã tồn tại',
            'password.required' => '+Bạn chưa nhập password',
            'phone.required' => '+Bạn chưa nhập số điện thoạt',
            'phone.regex' => '+Số Điện thoại chưa đúng định dạng',
            'sdt.unique' => '+Số điện thoại đã tồn tại',
            'password.regex' => '+ Password phải có ít nhất 1 chữ in hoa,chữ số và và ký tự đặc biệt',
            'password.min' => '+ Password phải ít nhất 5 ký tự'
        ]);
    }

    public function login1(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            //if (Auth::attempt($login)) {
            // Session::flash('thongbao','Đăng nhập thành công');
            return redirect()->route('cli_trangchu');
        } else {
            Session::flash('thongbao', 'email hoặc mật khẩu không đúng');
            return redirect()->back();
        }
    }
    public function logout_auth(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

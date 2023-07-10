<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    // public function index()
    // {
    //     $admin = admin::with('roles')->orderBy('admin_id','DESC')->paginate(5);
    //     return view('admin.users.all_user',compact('admin'));
    // }
    public function index()
    {
        $admin = admin::with('roles')->orderBy('admin_id','DESC')->get();
        return view('manager.user.index',compact('admin'));
    }
    public function impersonate($admin_id){
        $user = Admin::where('admin_id',$admin_id)->first();
        if($user){
            session()->put('chuyen',$user->admin_id);
        }
        return redirect()->route('trangchu');
    }
    public function impersonate_destroy(){
        session()->forget('chuyen');
        return redirect()->route('user');
    }
    // public function add_users(){
    //     return view('admin.users.add_user');
    // }
    public function add_users(){
        return view('manager.user.add_user');
    }
    public function delete_user_roles($admin_id){
        if(Auth::id()==$admin_id){
            return redirect()->back()->with('message','Bạn không được quyền xóa chính mình');
        }
        $admin = Admin::find($admin_id);

        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message','Xóa user thành công');

    }
    public function assign_roles(Request $request){

        if(Auth::id()==$request->admin_id){
            return redirect()->back()->with('message','Bạn không được phân quyền chính mình');
        }

        $user = admin::where('email',$request->admin_email)->first();
        $user->roles()->detach();
        if($request->user_role){
           $user->roles()->attach(Roles::where('name','user')->first());     
        }
        if($request->admin_role){
           $user->roles()->attach(Roles::where('name','admin')->first());     
        }
        return redirect()->back()->with('message','Cấp quyền thành công');
    }

    public function store_users(Request $request){
        $this->validate($request, [
            // 'admin_name'=>'required',
            'admin_email'=>'required|email|unique:tbl_admin,email'
            // 'admin_phone' => 'required|regex:/(07)[0-9]{9}/|unique:tbl_admin,phone',
            // 'admin_password'=>'required|min:8|max:32'
            
        ],[
            // 'admin_name.required'=>'+Ban chưa nhập tên',
            // 'admin_email.required'=>'+Ban chưa nhập email',
            // 'admin_email.email'=>'+Email chưa đúng định dạng',
            'admin_email.unique'=>'+Email đã tồn tại'
            // 'admin_password.required'=>'+Bạn chưa nhập password',
            // 'admin_phone.required'=>'+Bạn chưa nhập số điện thoạt',
            // 'admin_phone.regex'=>'+Số Điện thoại chưa đúng định dạng',
            // 'admin_phone.unique'=>'+Số điện thoại đã tồn tại',
            // 'admin_password.min'=>'+password lớn hơn 8',
            // 'admin_password.max'=>'+Password lớn hơn 32'
        ]);
        $data = $request->all();
        $admin = new Admin();
        $admin->name = $data['admin_name'];
        $admin->phone = $data['admin_phone'];
        $admin->email = $data['admin_email'];
        $admin->password = md5($data['admin_password']);
         $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());
       
        Session::flash('message','Thêm users thành công');
        return redirect()->route('user');
    }
}

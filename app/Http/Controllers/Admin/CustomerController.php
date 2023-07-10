<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\custommer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function customer()
    {
        $customer = custommer::with('roles')->orderBy('customer_id','DESC')->get();
        //dd($customer);
        return view('manager.customer.index',compact('customer'));
    }

    public function delete_user_roles($customer_id){
       
        $customer = custommer::find($customer_id);

        if($customer){
            $customer->roles()->detach();
            $customer->delete();
        }
        return redirect()->back()->with('message','Xóa khách hàng thành công');

    }
}

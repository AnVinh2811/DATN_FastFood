<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\attribute;
class AttrController extends Controller
{
    // public function add_attr(){
    //     $att=attribute::all();
    // 	return view('admin.thuoctinh.add_attr',compact('att'));
    // }
     public function add_attr(){
        $att=attribute::all();
        return view('manager.thuoctinh.index',compact('att'));
    }
    public function store_attr(Request $req){
        
    	attribute::create($req->all());
        return redirect()->route('add_attr')->with('message','Đã thêm thuộc tính mới');
    }
    public function del_attr($id){
        $att=attribute::Find($id);
        $att->delete();
        return redirect()->back();
    }
}

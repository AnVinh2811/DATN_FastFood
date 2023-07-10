<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\intro;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class IntroController extends Controller
{
    public function intro_index(){
        $intro=intro::all();
        return view('manager.gioithieu.index',compact('intro'));
    }
    public function store_intro(Request $req){
        $data=new intro();
        $data->intro_title=$req->ten;
        $data->intro_desc=$req->mota;
        $data->intro_content=$req->noidung;
        $get_image=request('image');
        $path="uploads/intro";
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $data->intro_image = $new_image;
        }
        $data->save();
        Session::flash('message','Cập nhật thành công');
        return redirect()->back();
    }
    public function update_intro(Request $req,$id){
        $this->validate($req, [
            'ten'=>'required',
            'mota'=>'required',
            'noidung'=>'required',
            // 'image'=>'required',
        ],[
            'ten.required'=>'+Ban chưa nhập tên ',
            'mota.required'=>'+Ban chưa nhập mô tả ',
            'noidung.required'=>'+ Bạn chưa nhập nội dung',
            // 'image.required'=>'+ Bạn chưa chọn hình'
            
        ]);
        $data=intro::Find($id);
        $data->intro_title=$req->ten;
        $data->intro_desc=$req->mota;
        $data->intro_content=$req->noidung;
        $get_image=request('image');
        $path="uploads/intro";
        File::delete('uploads/intro/'.$data->intro_image);
        if($get_image){
            // unlink($path.$data->intro_image);
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $data->intro_image = $new_image;
        }
        $data->save();
        Session::flash('message','Cập nhật thành công');
        return redirect()->back();
    }
}

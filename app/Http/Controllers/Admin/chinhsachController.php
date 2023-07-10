<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\chinhsach;
use Illuminate\Support\Facades\Session;

class chinhsachController extends Controller
{
    public function index(){
        $chinh=chinhsach::all();
        return view('manager.chinhsach.index',compact('chinh'));
    }
    public function created(){
        return view('manager.chinhsach.insert_chinhsach');
    }
    public function create_po(Request $req){
         $this->validate($req, [
            'title'=>'required|min:5|max:255',
            'image'=>'required',
            'sumary' => 'required|min:5|max:255',
            'content'=>'required|min:10|max:255',
            
        ],[
            'title.required'=>'+Ban chưa nhập tiêu đề',
            'image.required'=>'+Ban chưa nhập ảnh',
            'sumary.required'=>'+Bạn chưa nhập tóm tắt',
            'content.required'=>'+Bạn chưa nhập nội dung',
        ]);
        $chinh=new chinhsach();
        $chinh->title=$req->title;
        $chinh->sumary=$req->sumary;
        $chinh->content=$req->content;

        $get_image=request('image');
        $path="uploads/chinhsach";
        if($get_image){
            // unlink($path.$data->intro_image);
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $chinh->image = $new_image;
        }
        Session::flash('thêm thành công');
        $chinh->save();
        return redirect()->route('chinh');
    }
    public function updated(Request $req,$id){
        $chinh=chinhsach::Find($id);
        return view('manager.chinhsach.edit_chinhsach',compact('chinh'));
    }
    public function store_po(Request $request,$id){
        $chinh=chinhsach::FindOrFail($id);
        $chinh->title=$request->title;
        $chinh->sumary=$request->sumary;
        $chinh->content=$request->content;

        $get_image = $request->file('image');
      
        if($get_image){
            //xoa anh cu
            $post_image_old = $chinh->image;
            $path ='uploads/chinhsach/'.$post_image_old;
            unlink($path);
            //cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/chinhsach',$new_image);
            $chinh->image = $new_image; 
        }
        Session::flash('message','cập nhật thành công');
        $chinh->save();
        return redirect()->route('chinh');


    }
    public function delete_po(Request $req,$id){
        $chinh=chinhsach::Find($id);
        $chinh->delete();
        Session::flash('message','xóa thành công');
        return redirect()->back();
    }
}

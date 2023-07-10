<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    // public function manage_slider(){
    //     $all_slide = slider::orderBy('slider_id','DESC')->paginate(4);
    //     return view('admin.slider.list_slider')->with(compact('all_slide'));
    // }
    public function manage_slider(){
        $all_slide = slider::orderBy('slider_id','DESC')->paginate(4);
        return view('manager.slideshow.index')->with(compact('all_slide'));
    }
    // public function add_slider(){
    //     return view('admin.slider.add_slider');
    // }
    public function add_slider(){
        return view('manager.slideshow.insert_slideshow');
    }
    public function unactive_slide($slide_id){
        // $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>0]);
        Session::flash('message','hủy kích hoạt slider thành công');
        return redirect()->route('manage_sli');

    }
    public function active_slide($slide_id){
        // $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>1]);
        Session::flash('message','Kích hoạt slider thành công');
        return redirect()->route('manage_sli');

    }

    public function insert_slider(Request $request){
        
        // $this->AuthLogin();

        $data = $request->all();
        $this->validate($request, [
            'slider_name'=>'required',
            'slider_desc'=>'required',
            'slider_image'=>'required'
        ],[
            'ten.required'=>'+Ban chưa nhập tên ',
            'slider_desc.required'=>'+Ban chưa nhập mô tả ',
            'slider_image.required'=>'+ Bạn chưa chọn hình'
            
        ]);
        $get_image = request('slider_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/slider', $new_image);

            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->save();
            Session::flash('message','Thêm slider thành công');
            return redirect()->route('manage_sli');
        }else{
            Session::flash('message','Làm ơn thêm hình ảnh');
            return redirect()->route('manage_sli');
        }
        
    }
    public function delete_slide(Request $request, $slide_id){
        $slider = Slider::find($slide_id);
        if($slider->delete()){
            File::delete('uploads/slider/'.$slider->slider_image);
        }
        Session::flash('message','Xóa slider thành công');
        return redirect()->back();

    }
}

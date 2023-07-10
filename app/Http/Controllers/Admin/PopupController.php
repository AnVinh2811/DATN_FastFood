<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function popup()
    // {
    //     $popup=popup::all();
    //     return view('admin.popup.all_popup',compact('popup'));
    // }
    public function popup()
    {
        $popup=popup::all();
        return view('manager.popup.index',compact('popup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_popup()
    {
        return view('manager.popup.add_popup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'link'=>'required|active_url',
            'hinh_popup'=>'required'
        ],[
            'link.required'=>'+Ban chưa nhập link ',
            'hinh.required'=>'+Ban chưa chọn hình ',
            'link.active_url'=>'+ đường link không phù hợp'
            
        ]);
        $data=$request->all();
        $get_image=request('hinh_popup');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/popup', $new_image);
            $popup=new popup();
            $popup->popup_name=$request->popup_name;
            $popup->link=$request->link;
            $popup->popup_status=$request->popup_status;
            $popup->hinh_popup=$new_image;
            $popup->save();
            Session::flash('message','thêm popup thành công');
            return redirect()->route('list_popup');
        }
        else{
            Session::flash('message','hãy thêm hình vào');
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function show(popup $popup)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function edit_q($id)
    {
        $popup=popup::FindOrFail($id);
        return view('manager.popup.edit_popup',compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function update_popup(Request $request,$id)
    {
        $this->validate($request, [
            'link'=>'required|active_url',
        ],[
            'link.required'=>'+Ban chưa nhập link ',
            
            'link.active_url'=>'+ đường link không phù hợp'
            
        ]);
        $data=$request->all();
        $popup=popup::Find($id);

        $popup->popup_name=$data['popup_name'];
        $popup->link=$data['link'];
        $popup->popup_status=$data['popup_status'];
        $get_image=request('hinh_popup');
        if($get_image){
            $post_image_old = $popup->hinh_popup;
            $path ='uploads/popup/'.$post_image_old;
            unlink($path);
            //cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/popup',$new_image);
            $popup->hinh_popup = $new_image; 

    }
    $popup->save();
    Session::flash('message','sửa popup thành công');
    return redirect()->route('list_popup');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function destroy(popup $popup,$id)
    {
        $popup=popup::find($id);
        if($popup->delete()){
            Session::flash('message','xóa popup thành công');
            return redirect()->route('list_popup');
        }else{
            Session::flash('message','xóa popup không thành công');
            return redirect()->back();
        }
    }
}

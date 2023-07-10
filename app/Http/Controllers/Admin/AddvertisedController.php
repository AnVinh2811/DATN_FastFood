<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\quangcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AddvertisedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function addver()
    // {
    //     $quangcao=quangcao::all();
    //     return view('admin.quangcao.all_quangcao',compact('quangcao'));
    // }
    public function addver()
    {
        $quangcao=quangcao::all();
        return view('manager.quangcao.index',compact('quangcao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_addver()
    {
        return view('manager.quangcao.add_quangcao');
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
            'hinh_quangcao'=>'required'
        ],[
            'link.required'=>'+Ban chưa nhập link ',
            'hinh.required'=>'+Ban chưa chọn hình ',
            'link.active_url'=>'+ đường link không phù hợp'
            
        ]);
        $data=$request->all();
        $get_image=request('hinh_quangcao');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/quangcao', $new_image);
            $quangcao=new quangcao();
            $quangcao->quangcao_name=$request->quangcao_name;
            $quangcao->link=$request->link;
            $quangcao->quangcao_status=$request->quangcao_status;
            $quangcao->hinh_quangcao=$new_image;
            $quangcao->save();
            Session::flash('message','thêm quảng cáo thành công');
            return redirect()->route('list_addvertised');
        }
        else{
            Session::flash('message','làm ơn thêm hình vào');
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quangcao  $quangcao
     * @return \Illuminate\Http\Response
     */
    public function show(quangcao $quangcao)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quangcao  $quangcao
     * @return \Illuminate\Http\Response
     */
    public function edit_q($id)
    {
        $quangcao=quangcao::FindOrFail($id);
        return view('manager.quangcao.edit_quangcao',compact('quangcao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quangcao  $quangcao
     * @return \Illuminate\Http\Response
     */
    public function update_addver(Request $request,$id)
    {
        $this->validate($request, [
            'link'=>'required|active_url',
        ],[
            'link.required'=>'+Ban chưa nhập link ',
            
            'link.active_url'=>'+ đường link không phù hợp'
            
        ]);
        $data=$request->all();
        $quangcao=quangcao::Find($id);

        $quangcao->quangcao_name=$data['quangcao_name'];
        $quangcao->link=$data['link'];
        $quangcao->quangcao_status=$data['quangcao_status'];
        $get_image=request('hinh_quangcao');
        if($get_image){
            $post_image_old = $quangcao->hinh_quangcao;
            $path ='uploads/quangcao/'.$post_image_old;
            unlink($path);
            //cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/quangcao',$new_image);
            $quangcao->hinh_quangcao = $new_image; 

    }
    $quangcao->save();
    Session::flash('message','sửa quảng cáo thành công');
    return redirect()->route('list_addvertised');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quangcao  $quangcao
     * @return \Illuminate\Http\Response
     */
    public function destroy(quangcao $quangcao,$id)
    {
        $quangcao=quangcao::find($id);
        if($quangcao->delete()){
            Session::flash('message','xóa quảng cáo thành công');
            return redirect()->route('list_addvertised');
        }else{
            Session::flash('message','xóa quảng cáo không thành công');
            return redirect()->back();
        }
    }
}

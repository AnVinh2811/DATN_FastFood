<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CatePost;
use DB;
use App\Models\Slider;
class CategoryPost extends Controller
{
   

    // public function add_category_post(){
    //     // $this->AuthLogin();
    //     return view('admin.category_post.add_category');
    // }
    public function add_category_post(){
        // $this->AuthLogin();
        return view('manager.category_post.insert_cate_post');
    }
    public function save_category_post(Request $request){
        $this->validate($request, [
            'cate_post_name'=>'required',
            'cate_post_slug'=>'required',
            'cate_post_desc'=>'required',

        ],[
            'cate_post_desc.required'=>'+Ban chưa mô tả ',
            
        ]);
        // $this->AuthLogin();
        $data = $request->all();
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::flash('message','Thêm danh mục bài viết thành công');
        return redirect()->route('all_cate_post');
    }
    
    // public function all_category_post(){
       

    //     $category_post = CatePost::orderBy('cate_post_id','DESC')->paginate(5);

    //     return view('admin.category_post.list_category')->with(compact('category_post'));


    // }
    public function all_category_post(){
       

        $category_post = CatePost::orderBy('cate_post_id','DESC')->paginate(5);

        return view('manager.category_post.index')->with(compact('category_post'));


    }
  
    // public function edit_category_post($category_post_id){
        

    //     $category_post = CatePost::find($category_post_id);

    //     return view('admin.category_post.edit_category')->with(compact('category_post'));
    // }
    public function edit_category_post($category_post_id){
        

        $category_post = CatePost::find($category_post_id);

        return view('manager.category_post.edit_cate_post')->with(compact('category_post'));
    }
    public function update_category_post(Request $request, $cate_id){
        $this->validate($request, [
            'cate_post_name'=>'required',
            'cate_post_slug'=>'required',
            'cate_post_desc'=>'required',

        ],[
            'cate_post_desc.required'=>'+Ban chưa mô tả ',
            
        ]);
        $data = $request->all();
        $category_post = CatePost::find($cate_id);
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::flash('message','Cập nhật danh mục bài viết thành công');
        return redirect('/all-category-post');
    }
    public function delete_category_post($cate_id){
        $category_post = CatePost::find($cate_id);
        $category_post->delete();
        Session::flash('message','Xóa danh mục bài viết thành công');
        return redirect()->back();

    }
}

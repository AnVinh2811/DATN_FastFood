<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatePost;
use App\Models\Post;
use App\Models\Slider;
use App\Models\category;
use App\Models\chinhsach;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    
    //
    // public function add_post(){
    //     // $this->AuthLogin();
    //     $cate_post = CatePost::orderBy('cate_post_id','DESC')->get(); 
       
    //     return view('admin.post.add_post')->with(compact('cate_post'));
        

    // }
    public function add_post(){
        // $this->AuthLogin();
        $cate_post = CatePost::orderBy('cate_post_id','DESC')->get(); 
       
        return view('manager.post.insert_post')->with(compact('cate_post'));
        

    }
    public function save_post(Request $request){
        $this->validate($request, [
            'post_title'=>'required',
            'post_slug'=>'required',
            'post_desc'=>'required',
            'post_content'=>'required',
            'post_meta_keywords'=>'required',
            'post_meta_desc'=>'required',
            'post_image'=>'required'
        ],[
            'ten.required'=>'+Ban chưa nhập tên ',
            'post_desc.required'=>'+Ban chưa nhập mô tả ',
            'post_content.required'=>'+ Bạn chưa nhập nội dung',
            'post_meta_keywords.required'=>'+ Bạn chưa nhập keyword',
            'post_meta_desc.required'=>'+ Bạn chưa nhập meta_desc',
            'post_image.required'=>'+ Bạn chưa chọn hình'
            
        ]);
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->cate_post_id = $data['cate_post_id'];
        $post->post_status = $data['post_status'];

        $get_image = $request->file('post_image');
       
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('uploads/post',$new_image);

            $post->post_image = $new_image;

            $post->save();
            Session::flash('message','Thêm bài viết thành công');
            return redirect()->route('all_post');
        }else{
            Session::flash('message','Hãy thêm hình ảnh');
            return redirect()->back();
        }

       
    }
    // public function all_post(){
    //     // $this->AuthLogin();
        
    //     // $all_post = Post::with('cate_post')->orderBy('cate_post_id')->get();
    //     $all_post=DB::table('tbl_post')->join('tbl_category_post','tbl_category_post.cate_post_id','=','tbl_post.cate_post_id')->get();
    //     return view('admin.post.list_post')->with(compact('all_post',$all_post));

    // }

    public function all_post(){
        // $all_post=DB::table('tbl_post')->join('tbl_category_post','tbl_category_post.cate_post_id','=','tbl_post.cate_post_id')->paginate(10);
        $all_post=Post::with('cate_post')->Paginate(10);
        return view('manager.post.index')->with('all_post',$all_post);

    }
    public function delete_post($post_id){
        // $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;

        if($post_image){
            $path ='uploads/post/'.$post_image;
            unlink($path);
        }
        $post->delete();
        
       
        Session::flash('message','Xóa bài viết thành công');
        return redirect()->back();
    }
    
    // public function edit_post($post_id){
    //     $cate_post = CatePost::orderBy('cate_post_id')->get();
    //     $post = Post::find($post_id);
    //     return view('admin.post.edit_post')->with(compact('post','cate_post'));
    // }
    public function edit_post($post_id){
        $cate_post = CatePost::orderBy('cate_post_id')->get();
        $post = Post::find($post_id);
        return view('manager.post.edit_post')->with(compact('post','cate_post'));
    }
    public function update_post(Request $request,$post_id){
        $this->validate($request, [
            'post_title'=>'required',
            'post_slug'=>'required',
            'post_desc'=>'required',
            'post_content'=>'required',
            'post_meta_keywords'=>'required',
            'post_meta_desc'=>'required',
            // 'post_image'=>'required'
        ],[
            'ten.required'=>'+Ban chưa nhập tên ',
            'post_desc.required'=>'+Ban chưa nhập mô tả ',
            'post_content.required'=>'+ Bạn chưa nhập nội dung',
            'post_meta_keywords.required'=>'+ Bạn chưa nhập keyword',
            'post_meta_desc.required'=>'+ Bạn chưa nhập meta_desc',
            // 'post_image.required'=>'+ Bạn chưa chọn hình'
            
        ]);
        $data = $request->all();
        $post = Post::find($post_id);

        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->cate_post_id = $data['cate_post_id'];
        $post->post_status = $data['post_status'];

        $get_image = $request->file('post_image');
      
        if($get_image){
            //xoa anh cu
            $post_image_old = $post->post_image;
            $path ='uploads/post/'.$post_image_old;
            unlink($path);
            //cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/post',$new_image);
            $post->post_image = $new_image; 
        }

        $post->save();
        Session::flash('message','Cập nhật bài viết thành công');
        return redirect()->route('all_post');
    }
    public function danh_muc_bai_viet(Request $request,$id){
        //category post
        $cate=category::all();
        $com='';
        $cate_post1=CatePost::orderBy('cate_post_id','DESC')->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $chinh=chinhsach::limit(3)->get();
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $catepost = CatePost::where('cate_post_slug',$id)->take(1)->get();

            foreach($catepost as $key => $cate2){
            //seo 
            $meta_desc = $cate2->cate_post_desc; 
            $meta_keywords = $cate2->cate_post_slug;
            $meta_title = $cate2->cate_post_name;
            $cate_id = $cate2->cate_post_id;
            $post_name=$cate2->cate_post_name;
            $url_canonical = $request->url();
            $share_image = url('public/frontend/images/share_news.png');
            //--seo
        }
      
        
        $post_cate = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(5);
       
        return view('client.danhmucbaiviet',compact('meta_desc','meta_keywords','meta_title','url_canonical','slider','post_cate','category_post','share_image','com','cate','cate_post1','chinh','cate_id','post_name'));
    }
    // public function page_baiviet(Request $req){
    //     $url_canonical = $request->url();
    //     $meta_desc = $p->post_meta_desc; 
    //     $meta_keywords = $p->post_meta_keywords;
    //     $meta_title = $p->post_title;
    //     return view('client.danhmucbaiviet');
    // }
    public function bai_viet(Request $request,$post_slug){

        //category post
        $com='';
        $cate_post = CatePost::orderBy('cate_post_id','DESC')->get();
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $chinh=chinhsach::limit(3)->get();

        $cate =category::orderBy('category_id','DESC')->get(); 
        // $post_by_id = Post::with('cate_post')->where('post_status',0)->where('post_slug',$post_slug)->get();
        $post_by_id=DB::table('tbl_post')->join('tbl_category_post','tbl_post.cate_post_id','=','tbl_category_post.cate_post_id')->where('post_slug',$post_slug)->where('post_status',0)->get();
        foreach($post_by_id as $key => $p){
            //seo 
            $meta_desc = $p->post_meta_desc; 
            $meta_keywords = $p->post_meta_keywords;
            $meta_title = $p->post_title;
            $cate_id = $p->cate_post_id;
            $slug=$p->cate_post_slug;
            $url_canonical = $request->url();
            $cate_post_id = $p->cate_post_id;
            $name=$p->post_title;
            $post_id = $p->post_id;
            $cate_post=$p->cate_post_name;
            $share_image = url('public/uploads/post/'.$p->post_image);
            //--seo
        }
        //update views 
        $post = Post::where('post_slug',$post_slug)->first();
        $post->post_views = $post->post_views + 1;
        $post->save();
        
        //related post
        // $rl=Post::with('cate_post')->where('cate_post_id',$cate_post_id)->where('post_slug',$post_slug)->where('post_status',0)->get();
       
        // dd($rl);
        $related = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();
       
        return view('client.baiviet',compact('cate','meta_desc','meta_keywords','meta_title','url_canonical','slider','com','chinh','cate_id','name','post_by_id','related','cate_post','cate_post_id','slug'));
    }
}

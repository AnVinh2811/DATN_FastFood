<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatePost;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\slider;
use App\Models\contact;
use App\Models\chinhsach;

class ContactController extends Controller
{
    public function lien_he(Request $request){
          //category post
        $cate_post1 = CatePost::orderBy('cate_post_id','DESC')->get();
        $com='';
        $cate=category::orderby('category_id','desc')->get();
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo 
        $chinh=chinhsach::limit(3)->get();
        $meta_desc = "Liên hệ"; 
        $meta_keywords = "Liên hệ";
        $meta_title = "Liên hệ chúng tôi";
        $url_canonical = $request->url();
        //--seo
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 

        $contact = Contact::where('info_id',1)->get();

        return view('client.contact')->with('category',$cate_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('cate_post1',$cate_post1)->with('contact',$contact)->with('com',$com)->with('cate',$cate)->with('chinh',$chinh);

    }
    // public function information(){
    //     $contact = contact::where('info_id',1)->get();

    //     return view('admin.infomation.add_infomation',compact('contact'));
    // }
    public function information(){
        $contact = contact::where('info_id',1)->get();

        return view('manager.info.index',compact('contact'));
    }
    public function update_info(Request $request,$info_id){
        $this->validate($request, [
            'info_contact'=>'required',
            'info_map'=>'required',
            'info_fanpage'=>'required',
            
        ],[
            'info_contact.required'=>'+Ban chưa nhập thông tin liên hệ ',
            'info_map.required'=>'+Ban chưa chọn bản đồ ',
            'info_fanpage.required'=>'+ Bạn chưa chọn fanpage',
            
            
        ]);
        $data = $request->all();
        $contact = contact::find($info_id);
        $contact->info_contact = $data['info_contact']; 
        $contact->info_map = $data['info_map'];
        $contact->info_fanpage = $data['info_fanpage']; 
        $get_image = $request->file('info_image');
        $path = 'uploads/contact/';
        if($get_image){
            unlink($path.$contact->info_logo);
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
        }

        $contact->save();
        return redirect()->back()->with('message','Cập nhật thông tin website thành công');
    }
    public function save_info(Request $request){
        $data = $request->all();
        $contact = new Contact();
        $contact->info_contact = $data['info_contact']; 
        $contact->info_map = $data['info_map'];
        $contact->info_fanpage = $data['info_fanpage']; 
        $get_image = $request->file('info_image');
        $path = 'uploads/contact/';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
        }

        $contact->save();
        return redirect()->back()->with('message','Cập nhật thông tin website thành công');

    }
}

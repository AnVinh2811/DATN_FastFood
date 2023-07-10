<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Imports\Imports;
use App\Exports\Export;
use App\Models\product;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    public function trangchu(){
        return view("admin.trangchu");
    }
	
    // public function index(){
		
    // 	$cate=category::all();
    // 	return view('admin/loaisp/index',compact('cate'));
    // }
    public function index(){
        
        $cate=category::paginate(10);
        return view('manager/cate_product/index',compact('cate'));
    }
    // public function addcate(){
		
    // 	return view('admin/loaisp/add_category');
    // }
     public function addcate(){
        
        return view('manager/cate_product/add_category');
    }
    public function themcat(Request $req){
        $this->validate($req, [
            'ten'=>'required',
            'mota'=>'required',
        ],[
            'ten.required'=>'+Ban chưa nhập tên ',
            'mota.required'=>'+Ban chưa nhập mô tả ',
            
        ]);
    	$cate=new category();
    	$cate->category_name=$req->ten;
    	$cate->category_desc=$req->mota;
    	$cate->category_status=$req->status;
    	if($cate->save()){
    		Session::flash('message','thêm loại sản phẩm thành công');
    	}else{
    		Session::flash('message','thêm loại sản phẩm thất bại');
    	}
    	return redirect()->route('cate_index');
    }
    // public function edit($id){
		
    // 	$cate_edit=category::FindOrFail($id);
    // 	return view('admin/loaisp/category_edit',compact('cate_edit'));
    // }
    public function edit($id){
        
        $cate_edit=category::FindOrFail($id);
        return view('manager/cate_product/edit_category',compact('cate_edit'));
    }
    public function update(Request $req,$id){
    	$cat=category::FindOrFail($id);
    	$cat['category_name']=$req->ten;
    	$cat['category_desc']=$req->mota;
    	$cat['category_status']=$req->status;
    	if($cat->save()){
    		Session::flash("message","cập nhật loại sản phẩm thành công");
    	}else{
    		Session::flash("message","cập nhật loại sản phẩm thất bại");
    	}
    	return redirect()->route('cate_index');
    }
    public function delete($id){
    	$cate=category::FindOrFail($id);
    	if($cate->delete()){
    		Session::flash("message","Xóa loại sản phẩm thành công");
    	}
    	else{
    		Session::flash("message","Xóa loại sản phẩm thất bại");
    	}
    	return redirect()->route('cate_index');
    }

    public function export_csv(){
    return Excel::download(new Export , 'category.xlsx');
    }
    public function import_csv() 
    {
        Excel::import(new Imports,request()->file('file')); 
        return back();
    }
    
}




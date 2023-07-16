<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Session;
use App\Models\category;
use App\Models\pro_img;
use App\Models\product_attr;
use App\Models\attribute;
use App\Models\OrderDetail;
use App\Exports\Export_product;
use App\Imports\Import_product;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $pro = Product::with('category')->orderby('product_id', 'DESC')->Paginate(15);
        return view('manager.product.index', compact('pro'));
    }

    public function fetch_data(Request $req)
    {
        $pro = Product::with('category')->orderby('product_id', 'DESC')->Paginate(15);
        return view('manager.product.paginate_data', compact('pro'))->render();
    }
    public function imageUpload(Request $request)
    {
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $request->validate([
                    'hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . $request->hinh->extension();
                $request->hinh->move(public_path('images'), $imageName);
                return $imageName;
            }
        }
        return "";
    }


    public function addpro()
    {

        $cate = category::all();
        $attr1 = attribute::where('name', 'size')->get();
        return view('manager/product/add_product', compact('cate', 'attr1'));
    }
    public function themsp(Request $req)
    {
        $this->validate($req, [
            'ten' => 'required',
            'mota' => 'required',
            'gia' => 'required|numeric|min:4',
            'gia_goc' => 'required|numeric|min:4',
            'gia_km' => 'required|numeric',
            'hinh' => 'required',
        ], [
            'ten.required' => '+Ban chưa nhập tên ',
            'mota.required' => '+Ban chưa nhập mô tả ',
            'gia.required' => '+bạn chưa nhập giá ',
            'gia.numeric' => '+giá phải là số ',
            'gia.min' => '+giá tiền phải ít nhất 4 ký tự ',
            'gia_km.required' => '+Bạn chưa nhập giá khuyến mãi ',
            'hinh.required' => '+Bạn chưa nhập hình ',
            'gia_goc.required' => '+chưa nhập giá gốc ',
            'gia_goc.numeric' => '+Giá gốc phải là số ',
            'gia_km.required' => '+chưa nhập giá khuyến mãi ',
            'gia_km.numeric' => '+giá khuyến mãi phải là số ',

        ]);
        $product_price = filter_var($req->gia, FILTER_SANITIZE_NUMBER_INT);
        $price_cost = filter_var($req->gia_goc, FILTER_SANITIZE_NUMBER_INT);
        $km = filter_var($req->gia_km, FILTER_SANITIZE_NUMBER_INT);
        $product = new Product();
        $product->product_name = $req->ten;
        $product->category_id = $req->loai;
        $product->product_desc = $req->mota;
        $product->product_price = $product_price;
        $product->price_cost = $price_cost;
        $product->gia_km = $km;
        $product->product_status = $req->status;
        $product->soluong = $req->soluong;
        $product->product_image = $this->imageUpload($req);
        if ($product->save()) {
            Session::flash('message', 'Thêm sản phẩm thành công');
        } else {
            Session::flash('message', 'Thêm sản phẩm thất bại');
        }

        return redirect()->route('pro_index');
        foreach($req->attr_id as $value){
            product_attr::create([
                'product_id'=>$product->product_id,
                'attr_id'=>$value
            ]);
        }
        // return redirect()->route('pro_index');
    }
    // public function edit($id){
    //     $cate=category::all();
    //     $pro_edit=product::Find($id);

    //     return view('admin/product/product_edit',compact('pro_edit','cate'));
    // }
    public function edit($id)
    {
        $cate = category::all();
        $pro_edit = product::Find($id);
        return view('manager/product/edit_product', compact('pro_edit', 'cate'));
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'ten' => 'required',
            'mota' => 'required',
            'gia' => 'required|numeric|min:4',
            'gia_goc' => 'required|numeric|min:4',
            'gia_km' => 'required|numeric',
            'soluong' => 'required|numeric',
            // 'hinh'=>'required',
        ], [
            'ten.required' => '+Ban chưa nhập tên ',
            'mota.required' => '+Ban chưa nhập mô tả ',
            'gia.required' => '+bạn chưa nhập giá ',
            'gia.numeric' => '+giá phải là số ',
            'gia.min' => '+giá tiền phải ít nhất 4 ký tự ',
            'gia_km.required' => '+Bạn chưa nhập giá khuyến mãi ',
            'soluong.required' => '+Bạn chưa nhập số lượng ',
            'soluong.numeric' => '+Số lượng phải là số ',
            // 'hinh.required'=>'+Bạn chưa nhập hình ',
            'gia_goc.required' => '+chưa nhập giá gốc ',
            'gia_goc.numeric' => '+Giá gốc phải là số ',
            'gia_km.required' => '+chưa nhập giá khuyến mãi ',
            'gia_km.numeric' => '+giá khuyến mãi phải là số ',

        ]);
        $product_price = filter_var($req->gia, FILTER_SANITIZE_NUMBER_INT);
        $price_cost = filter_var($req->gia_goc, FILTER_SANITIZE_NUMBER_INT);
        $km = filter_var($req->gia_km, FILTER_SANITIZE_NUMBER_INT);
        $pro = product::FindOrFail($id);
        $pro['product_name'] = $req->ten;
        $pro['category_id'] = $req->loai;
        $pro['product_desc'] = $req->mota;
        $pro['product_price'] = $product_price;
        $pro['price_cost'] = $price_cost;
        $pro['gia_km'] = $km;
        $pro['product_status'] = $req->status;
        $pro['soluong'] = $req->soluong;
        // $pro['product_image']=$this->imageUpload($req);
        $get_image = $req->file('hinh');
        if ($get_image) {
            //xoa anh cu
            // $post_image_old = $pro->product_image;
            // $path ='images/'.$post_image_old;
            // unlink($path);
            // dd($post_image_old);
            //cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('images', $new_image);
            $pro->product_image = $new_image;
        }
        if ($pro->save()) {
            Session::flash("message", "cập nhật sản phẩm thành công");
        } else {
            Session::flash("message", "cập nhật sản phẩm thất bại");
        }


        return redirect()->route('pro_index');
    }
    public function delete($id)
    {
        $pro = product::FindOrFail($id);
        if ($pro->delete()) {
            File::delete('images/' . $pro->product_image);
            Session::flash("message", "Xóa sản phẩm thành công");
        } else {
            Session::flash("message", "Xóa sản phẩm thất bại");
        }
        return redirect()->route('pro_index');
    }
    public function kichhoat($id)
    {
        $p = product::where('product_id', $id)->update(['product_status' => 1]);
        return redirect()->route('pro_index');
    }
    public function huykichhoat($id)
    {
        $p = product::where('product_id', $id)->update(['product_status' => 0]);
        return redirect()->route('pro_index');
    }
    // public function add_img(Request $req,$id){
    //     $img=pro_img::where('product_id',$id)->get();
    //     $product_detail=product::Find($id);
    //     return view('admin.product.add_img',compact('product_detail','img'));
    // }

    public function add_img(Request $req, $id)
    {
        $img = pro_img::where('product_id', $id)->get();
        $product_detail = product::Find($id);
        return view('manager.product.add_img', compact('product_detail', 'img'));
    }
    public function add_img1(Request $req, $id)
    {
        $product_detail = product::Find($id);
        $data = $req->all();
        if ($req->hasfile('image')) {
            $files = $req->file('image');
            foreach ($files as $file) {
                $image = new pro_img;
                $extension = $file->getClientOriginalExtension();
                $filename = rand(111, 9999) . '.' . $extension;
                $image_path = 'upload_img/' . $filename;
                Image::make($file)->save($image_path);
                $image->images = $filename;
                $image->product_id = $data['product_id'];
                $image->save();
            }
        }

        return redirect()->route('add_img', $id)->with('message', 'thêm hình ảnh thành công');
    }
    public function del_img(Request $req, $id)
    {
        $gallary = pro_img::Find($id);
        $hinh = $gallary->images;
        if ($hinh) {
            $path = 'upload_img/' . $hinh;
            unlink($path);
        }
        if ($gallary->delete()) {
            return redirect()->back()->with('message', 'xóa thành công');
        } else {
            return redirect()->route('add_img')->with('message', 'xóa không thành công');
        }
    }

    public function quickview(Request $request)
    {

        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $size=DB::table('attribute')->join('product_attribute','attribute.attr_id','=','product_attribute.attr_id')->where('product_id',$product_id)->get();
        $size = product_attr::with('attribute')->where('product_id', $product_id)->get();
        $tien = $product->product_price;
        $km = $tien - $product->gia_km;
        $nho = number_format(($km - (($km * 20) / 100)), 0, '.', '.') . ' ' . 'VNĐ';
        $lon = number_format(($km + (($km * 20) / 100)), 0, '.', '.') . ' ' . 'VNĐ';
        $vua = number_format($km, 0, '.', '.') . ' ' . 'VNĐ';
        $com = '';
        $galary = pro_img::where('product_id', $product_id)->get();
        foreach ($size as $s) {
            $output['product_size'] = '<span class="ab">GIÁ:</span><div class="bao2">';
            foreach ($size as $id => $data) {
                $output['product_size'] .= '
                                <div class="bao3">
                    <input type="radio" class="cart_product_size" name="size" value="' . $data->attribute->value . '">' . $data->attribute->value . '';
                if ($data->attribute->value == "Nhỏ") {
                    $output['product_size'] .= '<br><span style="color: brown;" class="product_nho">' . $nho . '</span>';
                } elseif ($data->attribute->value == "Lớn") {
                    $output['product_size'] .= '<br><span style="color: brown;" class="product_lon">' . $lon . '</span>';
                } else {
                    $output['product_size'] .= '<br><span  style="color: brown;" class="product_vua">' . $vua . '</span>';
                }
                $output['product_size'] .= '</div>';
            }
            $output['product_size'] .= '</div>';
        }
        $output['product_nho'] = $nho;
        $output['product_lon'] = $lon;
        $output['product_vua'] = $vua;
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_price'] = number_format($km, 0, ',', '.') . 'VNĐ';
        $output['product_image'] = '<p><img width="100%"  src="../images/' . $product->product_image . '"></p>';
        $output['product_soluong'] = $product->soluong;
        $output['product_button'] = '<input type="button" value="THÊM VÀO GIỎ HÀNG" class="btn btn-primary btn-sm add-to-cart-quickview" id="buy_quickview" data-id_product="' . $product->product_id . '"  name="add-to-cart">';
        echo json_encode($output);
    }
    public function export_csv()
    {
        return Excel::download(new Export_product, 'product.xlsx');
    }
    public function import_csv()
    {
        Excel::import(new Import_product, request()->file('file'));
        return back();
    }
    public function tim(Request $req)
    {
        if ($req->ajax()) {
            $output = '';
            $product = DB::table('tbl_product')->where('product_name', 'LIKE', '%' . $req->search . '%')->get();
            if ($product) {
                $i = 1;
                foreach ($product as $pro) {
                    $output .= '<tr>
                    <td>' . $i++ . '</td>
                    <td>' . $pro->product_name . '</td>
                    <td>' . $pro->category_id . '</td>
                    <td>' . $pro->product_desc . '</td>
                    <td>' . $pro->product_price . '</td>
                    <td>' . $pro->price_cost . '</td>
                    <td>' . $pro->gia_km . '</td>
                    <td><img width="100%" src="../images/' . $pro->product_image . '" alt=""></td>
                    <td>' . $pro->product_status . '</td>
                    <td>' . $pro->soluong . '</td>
                    <td class="text">
                      <a class="cach" href="add_images/' . $pro->product_id . '" title="thêm ảnh"><i class="glyphicon glyphicon-folder-open lo"></i>
                        </a>
                        <a class="cach" href="edit_pro/' . $pro->product_id . '" title="sửa sản phẩm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16" style="color:blue">
                          <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                          <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                        </a>

                        <a class="cach" href="delete/' . $pro->product_id . '" title="xóa sản phẩm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="color:red" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                       </a>
                      
                      </td>
                    <tr>';
                }
            }
            return Response($output);
        }
    }

    public function xoanhieu(Request $req)
    {
        $a = $req->value;
        $b = preg_split("/[,]/", $a);
        $gallery = DB::table('tbl_product')->join('product_images', 'tbl_product.product_id', '=', 'product_images.product_id')->whereIn('tbl_product.product_id', $b)->get();

        foreach ($gallery as $ga) {

            File::delete('upload_img/' . $ga->images);
            File::delete('images/' . $ga->product_image);
        }
        $gallery = Product::destroy($b);
    }
    public function search(Request $req)
    {

        // $product=DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('product_name','LIKE','%'.$req->search.'%')->get();
        $product = Product::with('category')->where('product_name', 'LIKE', '%' . $req->search . '%')->get();
        $html = '';
        if ($product) {
            $i = 0;
            foreach ($product as $pro) {
                $i++;
                $html .= '<tr>
            <td class="text-center"><input type="checkbox" value="' . $pro->product_id . '" class="check"></td>
            <td>' . $i . '</td>
            <td>' . $pro->product_name . '</td>
            <td><img src="../images/' . $pro->product_image . '" alt="" width="100px" height="100px" ></td>
            <td>' . $pro->category->category_name . '</td>
            <td>' . $pro->product_price . '</td>
            <td>' . $pro->gia_km . '</td>
            <td>' . $pro->soluong . '</td>
            <td>';
                if ($pro->product_status == 1) {
                    $html .= '<a href="huykichhoat' . $pro->product_id . '" title="Hiển thị"><i class="glyphicon glyphicon-eye-open success"></i></a>';
                } elseif ($pro->product_status == 0) {
                    $html .= '<a href="kichhoat' . $pro->product_id . '" title="ẩn"><i class="glyphicon glyphicon-eye-close"></i></a>';
                }


                $html .= '</td>
            <td>
                <a href="../product/add_images/' . $pro->product_id . '" title="thêm thư viện"><i class="glyphicon glyphicon-th"></i></a>
                <a href="../product/edit_pro/' . $pro->product_id . '" title="sữa sản phẩm"><i class="glyphicon glyphicon-pencil"></i></a>
                <a  href="../product/delete/' . $pro->product_id . '" title="xóa sản phẩm"><i class="glyphicon glyphicon-trash"></i></a></td>
         </tr>';
            }
        }
        echo $html;
    }
}

@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý thư viện ảnh</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên sản phẩm</th>
                          <th>Giá</th>
                          <th>Hình ảnh</th>
                          <th>Thêm ảnh</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>{{$product_detail->product_id}}</td>
                          <td>{{$product_detail->product_name}}</td>
                          <td>{{$product_detail->product_price}}</td>
                          <td><img src="{!! asset('images/'.$product_detail->product_image)!!}" alt="" width="100px" height="100px" ></td>
                          <td>
                          		<form action="{{route('add_img1',$product_detail->product_id)}}" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="product_id" value="{{$product_detail->product_id}}">
                              {{csrf_field()}}
                              <!-- <input class="nutanh" type="file" required="required" name="image[]" multiple> -->
                              <span class="btn btn-default btn-file">
                              chọn hình <input type="file" name="image[]" required="required" multiple>
                              </span>
                              <input class="subanh" type="submit" value="thêm ảnh">
                            </form>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>



              <table class="table table-striped">
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <td class="taiche">
                      @foreach($img as $i)
                      <div class="baoimg">
                        <span class="pos"><a href="{{route('del_img',$i->image_id)}}"><i  class="glyphicon glyphicon-remove icon1"></i></a></span><img class="pro_img" src="{!! asset('upload_img/'.$i->images)!!}" alt="" width="120px" height="120px"> 
                      </div>
                      @endforeach
                    </td>
                  </tr>
                </tbody>
              </table>
          </div>
      </div>
  </div>
  @endsection
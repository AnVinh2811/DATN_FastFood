@extends('manager.template.admin_layout')
@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>phục hồi sản phẩm</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>

              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="button d-flex justify-content-between">

            <div class="csv d-flex justify-content-center align-items-center">
            </div>




          </div>
          <!--  <div class="search text-right p-2">
                        <input type="search" placeholder="search" class="search" id="search">
                  </div> -->

          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive" id="list-product">
                            <table class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                        <th class="text-center"></th>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Hình ảnh</th>
                        <th>Loại sản phẩm</th>
                        <th>Giá</th>
                        <th>Giá khuyển mãi</th>

                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>


                      <tbody id="list" >
                        <?php $i=0; ?>
                      @foreach($pro as $key => $p)
                      <?php $i++ ?>
                      <tr>
                        <td class="text-center"><input type="checkbox" value="{{$p->product_id}}" class="check"></td>
                        <td>{{$i}}</td>
                        <td>{{$p->product_name}}</td>
                          <td><img src="{!! asset('images/'.$p->product_image)!!}" alt="" width="100px" height="100px" ></td>
                        <td>{{$p->category->category_name}}</td>
                        <td>{{$p->product_price}}</td>
                        <td>{{$p->gia_km}}</td>

                        <td>
                          @if($p->product_status==1)
                          <a href="{{route('huykichhoat',$p->product_id)}}" title="Hiển thị"><!-- <i class="glyphicon glyphicon-eye-open success"></i> -->hiển thị</a>

                          @elseif($p->product_status==0)
                          <a href="{{route('kichhoat',$p->product_id)}}" title="ẩn"><!-- <i class="glyphicon glyphicon-eye-close"></i> -->ẩn</a>

                          @endif
                        </td>
                        <td><a href="{{route('pro_recovers',$p->product_id)}}" title="thêm thư viện"><i class="glyphicon glyphicon-refresh"></i></a></td>



                      </tr>
                      @endforeach
                    </tbody>

                  </table>
                  {!! $pro->links('pagination::bootstrap-4') !!}


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
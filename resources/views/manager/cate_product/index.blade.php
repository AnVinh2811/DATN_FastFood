@extends('manager.template.admin_layout')
@section('content')

<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý sản phẩm</h2>
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
                  <div class="button">
                  	<a href="{{route('cate_add')}}" class="btn-color" type="button" >Thêm loại sản phẩm</a>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên Loại</th>
                          <th>Mô tả</th>
                          <th>Trạng thái</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($cate as $key => $c)
                        <?php $i++ ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$c->category_name}}</td>
                          <td>{!! $c->category_desc !!}</td>
                          <td>{{$c->category_status}}</td>
                         
                          <td>
                          	  <a href="{{route('cat_edit',$c->category_id)}}" title="sữa sản phẩm"><i class="glyphicon glyphicon-pencil"></i></a>
                          		<a onclick="return confirm('sản phẩm thuộc danh mục này sẽ bị xóa, bạn có chắc muốn xóa không?')" href="{{route('delete_cate',$c->category_id)}}" title="xóa sản phẩm"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="Pagination d-flex justify-content-center">
                      {!! $cate->links() !!}
                    
                  </div>
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
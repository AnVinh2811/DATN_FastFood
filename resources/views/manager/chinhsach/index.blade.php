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
                  	<a href="{{URL::to('create_po')}}" class="btn-color" type="button" >Thêm chính sách</a>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                    <div class="card-box table-responsive">
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>tiêu đề</th>
                          <th>hình ảnh</th>
                          <th>tóm tắt</th>
                          <th>nội dung</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($chinh as $c)
                        <?php $i++ ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$c->title}}</td>
                          <td><img src="{{asset('uploads/chinhsach/'.$c->image)}}" width="50px"; height="50px" alt=""></td>
                          <td>{!!$c->sumary!!}</td>
                          <td class="catchuoi4">{!!$c->content!!}</td>
                         
                          <td>
                            <a class="cach" href="{{route('sua',$c->policy_id)}}" title="sửa chính sách"><i class="glyphicon glyphicon-pencil"></i></a>
                          	  
                          		<a onclick="return confirm('bạn có chắc muốn xóa không?')" href="{{route('del_po',$c->policy_id)}}" title="xóa chính sách"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="pagination">
                    
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
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
                  	<a href="{{route('add_addvertised')}}" class="btn-color" type="button" >Thêm Banner</a>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên quảng cáo</th>
                          <th>Hình quảng cáo</th>
                          <th>link quảng cáo</th>
                          <th>Tình trạng</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($quangcao as $key => $q)
                        <?php $i++ ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{ $q->quangcao_name }}</td>
                          <td><img src="uploads/quangcao/{{ $q->hinh_quangcao }}" height="120" width="300"></td>
                          <td>{{ $q->link }}</td>
                          <td><span class="text-ellipsis">
                            <?php
                             if($q->quangcao_status==0){
                              ?>
                              <a href="">Hiện</span></a>
                              <?php
                               }else{
                              ?>  
                               <a href="">Ẩn</span></a>
                              <?php
                             }
                            ?>
                          </span></td>
                          <td><a href="{{route('sua_quangcao',$q->quangcao_id)}}" class="active styling-edit" ui-toggle-class="">
                              <i class="fa fa-pencil-square-o text-success text-active"></i></a>  
                          
                           
                            <a onclick="return confirm('Bạn có chắc là muốn xóa quảng cáo này ko?')" href="{{URL::to('/delete_addver',$q->quangcao_id)}}" class="active styling-edit" ui-toggle-class="">
                              <i class="fa fa-times text-danger text"></i>
                            </a>

                          </td>
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
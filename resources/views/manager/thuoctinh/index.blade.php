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

                  <form action="{{route('store_attr')}}" method="post" enctype="multipart/form-data">
                  @csrf
                   <div class="form-group">
                  <label for="thuộc tính">Tên thuộc tính:</label><br>
                  <select name="name" id="inputName" class="form-select" aria-label="Default select example">
                  <!-- <option value="color" selected>Màu sắc</option> -->
                  <option value="size" >kích thước</option>
                  <!-- <option value="hot">Đá lạnh</option> -->
                  </select>
                  </div>

                  <!-- <div class="form-group value1">
                  <label for="">Giá trị:</label><br>
                  <input type="color" class="form-control mau" placeholder="Input Field" name="value" id="v1">
                  </div>  -->

                 <div class="form-group value2"  >
                  <label for="">Giá trị:</label><br>
                  <input type="text" class="form-control" required="required" placeholder="Input Field" name="value" id="v2">
                  </div>
                     <!--  <div class="form-group value3" style="display:none"  >
                  <label for="">Giá trị:</label><br>
                  <input type="text" class="form-control" required="required" placeholder="Input đá lạnh" name="" id="v3">
                  </div>  --> 
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên thuộc tính</th>
                          <th>giá trị</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($att as $key => $a)
                        <?php $i++ ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{ $a->name }}</td>
                          <td>{{ $a->value }}</td>
                          <td><a onclick="return confirm('Bạn có chắc là muốn xóa thuộc tính này ko?')" href="{{URL::to('/delete-attr',$a->attr_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                          </a></td>   
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
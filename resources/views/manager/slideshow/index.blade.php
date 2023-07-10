@extends('manager.template.admin_layout')
@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Quản lý slideshow</h2>
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
            <a href="{{URL::to('/add-slider')}}" class="btn-color" type="button">Thêm slideshow</a>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">


                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên slide</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>xóa</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php $i = 0; ?>
                      @foreach($all_slide as $key => $s)
                      <?php $i++ ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{ $s->slider_name }}</td>
                        <td><img src="uploads/slider/{{ $s->slider_image }}" height="120" width="300"></td>
                        <td>{!! $s->slider_desc !!}</td>
                        <td><span class="text-ellipsis">
                            <?php
                            if ($s->slider_status == 1) {
                            ?>
                              <a href="{{URL::to('/unactive-slide/'.$s->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                            <?php
                            } else {
                            ?>
                              <a href="{{URL::to('/active-slide/'.$s->slider_id)}}">
                                <span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                            <?php
                            }
                            ?>
                          </span></td>

                        <td>
                          <a onclick="return confirm('Bạn có chắc là muốn xóa slide này ko?')" href="{{URL::to('/delete-slide/'.$s->slider_id)}}" class="active styling-edit" ui-toggle-class="">
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
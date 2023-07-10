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
          <div class="dropdown">
            <button class="dropbtn1">Sắp xếp</button>
            <div class="dropdown-content">
              <a href="{{request()->fullUrlWithQuery(['order' => 'all'])}}">Tất cả đơn hàng</a>
              <a href="{{request()->fullUrlWithQuery(['order' => 'new'])}}">Đơn hàng mới</a>
              <a href="{{request()->fullUrlWithQuery(['order' => 'done'])}}">Đơn hàng đã xử lý</a>
              <a href="{{request()->fullUrlWithQuery(['order' => 'cancel'])}}">Đơn hàng đã hủy</a>
              <a href="{{request()->fullUrlWithQuery(['order' => 'move'])}}">Đơn hàng đang được vận chuyển</a>
              <a href="{{request()->fullUrlWithQuery(['order' => 'success'])}}">Đơn hàng đã được giao</a>
            </div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">


                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Thứ tự</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày tháng đặt hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php $i = 0; ?>
                      @foreach($order as $key => $d)
                      <?php $i++ ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{ $d->order_code }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td>@if($d->order_status==1)
                          <!-- <span style="color:blue">Đơn hàng mới <i class="glyphicon glyphicon-plus-sign" style="margin-left:4px"></i></span> -->
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Đơn hàng mới</div>
                          </div>
                          @elseif ($d->order_status==2)
                          <!-- <span style="color:green">Đã xử lý<i class="glyphicon glyphicon-check" style="margin-left:4px"></i></span> -->
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Đơn hàng đã xử lý</div>
                          </div>
                          @elseif($d->order_status==4)
                          <!-- <span style="color:#e6b70d;">Đơn hàng đang được vận chuyển<i class="glyphicon glyphicon-send" style="margin-left:6px"></i></span> -->
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 85%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Đơn hàng đang vận chuyển</div>
                          </div>
                          @elseif($d->order_status==5)
                          <!-- <span style="color:#e6b70d;">Đơn hàng đang được vận chuyển<i class="glyphicon glyphicon-send" style="margin-left:6px"></i></span> -->
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Đơn hàng đã giao</div>
                          </div>
                          @else
                          <!-- <span style="color:red">Đơn hàng đã hủy <i class="glyphicon glyphicon-ban-circle" style="margin-left:4px"></i></span> -->
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-danger huy" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Đơn hàng bị hủy</div>
                          </div>
                          @endif
                        </td>
                        <td>
                          <?php
                          if ($d->order_status == 1 || $d->order_status == 2 || $d->order_status == 3 || $d->order_status == 4 ||$d->order_status == 5) { ?>
                            <button type="button" data-toggle="modal" class="chitiet" data-target="#exampleModalLong" data-id="{{$d->order_code}}"><i class="fa fa-eye text-success"></i></button>
                          <?php }?>

                          <?php
                          if ($d->order_status == 4) { ?>
                            <a href="{{URL::to('/success/'.$d->order_code)}}"><i class="glyphicon glyphicon-ok"></i></a>
                          <?php } ?>

                          <?php
                          if ($d->order_status == 2) { ?>
                            <a href="{{URL::to('/move/'.$d->order_code)}}"><i class="glyphicon glyphicon-send"></i></a>
                          <?php } ?>

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  {!! $order->appends($_GET)->links('pagination::bootstrap-4')!!}



                  <!-- <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->

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


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          @csrf
          <div class="baobang">
            <div id="kh"></div>
            <div id="ship"></div>


          </div>
          <div id="detail"></div>


        </form>
        <form>
          @csrf
          <div class="form-group">
            <select name="" class="form-control order_details" id="in">
            </select>
          </div>
        </form>
        <!--  <div id="in"></div> -->
      </div>
      <div class="modal-footer">
        <div id="print">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
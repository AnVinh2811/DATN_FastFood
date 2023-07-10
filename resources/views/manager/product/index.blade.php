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

              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="button d-flex justify-content-between">
            <div class="add">
              <a href="{{route('pro_add')}}" class="btn-color" type="button">Thêm sản phẩm</a>
              <button type="button" class="nhan btn btn-danger px-5">Xóa</button>

            </div>
            <div class="csv d-flex justify-content-center align-items-center">
              <form action="{{url('/product/export-csv')}}" method="POST" class="mr-4">
                @csrf
                <input type="submit" value="Xuất file excel" name="export_csv" class="btn btn-success">
              </form>


              <form action="{{url('/product/import-csv')}}" method="POST" enctype="multipart/form-data" class="love">
                @csrf
                <!-- <input type="file" name="file" accept=".xlsx" class="should"><br> -->
                <span class="btn btn-default btn-file">
                  chọn file excel <input type="file" name="file" accept=".xlsx">
                </span>
                <input type="submit" value="Nhập file excel" name="import_csv" class="btn btn-warning ">
              </form>

            </div>




          </div>
          <div class="search text-right p-2">
            <input type="search" placeholder="search" class="search" id="search">
          </div>

          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive" id="list-product">
                  @include('manager.product.paginate_data')
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
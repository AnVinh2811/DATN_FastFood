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
                  	<a href="{{URL::to('/add-category-post')}}" class="btn-color" type="button" >Thêm danh mục bài viết</a>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên danh mục bài viết</th>
                          <th>Mô tả danh mục</th>
                          <th>Slug</th>
                          <th>Hiển thị</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($category_post as $key => $cate_post)
                        <?php $i++ ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{ $cate_post->cate_post_name }}</td>
                          <td>{{ $cate_post->cate_post_desc }}</td>
                          <td>{{ $cate_post->cate_post_slug }}</td>
                          <td>
                            @if($cate_post->cate_post_status==0)
                              Hiển thị
                            @else 
                              Ẩn
                            @endif
                          </td>           
                          <td>
                            <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}" class="active styling-edit" ui-toggle-class="">
                              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')" href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}" class="active styling-edit" ui-toggle-class="">
                              <i class="fa fa-times text-danger text"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="Pagination d-flex justify-content-center">
                    {!! $category_post->links() !!}
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
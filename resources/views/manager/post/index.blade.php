@extends('manager.template.admin_layout')
@section('content')

<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý bài viết</h2>
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
                  	<a href="{{URL::to('/add-post')}}" class="btn-color" type="button" >Thêm bài viết</a>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên bài viết</th>
                          <th>Hình ảnh</th>
                          <th>Slug</th>
                          <th>Mô tả bài viết</th>
                          <th>Từ khóa bài viết</th>
                          <th>Danh mục bài viết</th>
                          <th>Tình trạng</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($all_post as $key => $post)
                        <?php $i++ ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{ $post->post_title }}</td>
                          <td><img src="{{asset('uploads/post/'.$post->post_image)}}" height="100" width="100"></td>
                          <td>{{ $post->post_slug }}</td>
                          <td>{!! $post->post_desc !!}</td>
                          <td>{{ $post->post_meta_keywords }}</td>
                          <td>{{ $post->cate_post->cate_post_name }}</td>
                          <td>
                            @if($post->post_status==0)
                              Hiển thị
                            @else 
                              Ẩn
                            @endif
                          </td>

                          <td>
                            <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')" href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                              <i class="fa fa-times text-danger text"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="Pagination d-flex justify-content-center">
                    {!! $all_post->links() !!}
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
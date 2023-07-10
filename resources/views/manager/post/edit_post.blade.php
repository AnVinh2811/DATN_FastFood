@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Sửa bài viết</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
									@if(Session()->has('error'))
									<section class='alert alert-danger' style="text-align: center;">{{session('error')}}</section>
									@endif
									@if (count($errors)>0)
									<section class='alert alert-danger' style="text-align: center;">
									@foreach ($errors->all() as $err)
										{{$err}}
									@endforeach
									@endif
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{URL::to('/update-post/'.$post->post_id)}}" method="post" enctype='multipart/form-data'>
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên Loại <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="post_title"  class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$post->post_title}}"  name="ten" placeholder="Tên bài viết">
												
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Slug</label>
											<div class="col-md-6 col-sm-6 ">
											
												<input type="text" name="post_slug" class="form-control" value="{{$post->post_slug}}" required="required" id="convert_slug" placeholder="Slug">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tóm tắt</label>
											<div class="col-md-6 col-sm-6 ">
											
												<textarea style="resize: none" rows="8" class="form-control" name="post_desc" id="ckeditor" placeholder="Tóm tắt">{{$post->post_desc}}</textarea>
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nội dung</label>
											<div class="col-md-6 col-sm-6 ">
											
												<textarea style="resize: none" rows="8" class="form-control" name="post_content" id="ckeditor1" placeholder="Nội dung bài viết">{{$post->post_content}}</textarea>
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Meta keyword</label>
											<div class="col-md-6 col-sm-6 ">
											
												<textarea style="resize: none" rows="5" required="required" class="form-control" name="post_meta_keywords" placeholder="Mô tả danh mục">{{$post->post_meta_keywords}}</textarea>
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Meta nội dung</label>
											<div class="col-md-6 col-sm-6 ">
											
												<textarea style="resize: none" rows="5" class="form-control" name="post_meta_desc"  placeholder="Mô tả danh mục">{{$post->post_meta_desc}}</textarea>
											</div>
										</div>
										


										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Danh mục bài viết</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cate_post_id" id="" class="form-control" >
													 
											      @foreach($cate_post as $key => $cate)
		                                            <option {{$post->cate_post_id==$cate->cate_post_id ? 'selected' : ''}} value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
		                                        @endforeach

												</select>
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="post_status" id="" class="form-control" >
													@if($post->post_status==0)
			                                            <option selected value="0">Hiển thị</option>
			                                            <option value="1">Ẩn</option>
			                                        @else
			                                            <option value="0">Hiển thị</option>
			                                            <option selected value="1">Ẩn</option>
			                                        @endif

												</select>
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh</label>
											<div class="col-md-6 col-sm-6 text-center">

			                                    <span class="btn btn-default btn-file">
					                             <img src="{!!asset('uploads/post/'.$post->post_image)!!}" id="imgPre" class="img-thumbnail cover" width="300px"/> <input type="file" name="post_image" id="ful" value="{{$post->post_image}}">
					                             </span>
			                                
											</div>

										</div>

										

										


										
										<div class="ln_solid"></div>
										<div class="item form-group text-center">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<!-- <button class="btn btn-primary" type="button">Cancel</button> -->
												<!-- <button class="btn btn-primary" type="reset">Reset</button> -->
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection
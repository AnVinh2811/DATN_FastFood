@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Thêm danh mục bài viết</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{URL::to('/save-category-post')}}" method="post">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên Danh mục <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="cate_post_name" required="required" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục">
												
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">slug</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="cate_post_slug" class="form-control" id="convert_slug" placeholder="Slug">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mô tả danh mục</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="8" class="form-control" name="cate_post_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cate_post_status" id="" class="form-control" >
													 
											      <option value="0">Hiện</option>
											      <option value="1">Ẩn</option>

												</select>
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
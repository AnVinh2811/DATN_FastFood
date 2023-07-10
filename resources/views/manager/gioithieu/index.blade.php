@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Giới thiệu</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('update_intro',$intro[0]->intro_id)}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tiêu đề <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" required="required"  class="form-control" value="{{$intro[0]->intro_title}}" name="ten" >
												
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nội dung <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea type="text" class="form-control" id="ckeditor1" name="noidung"> {{$intro[0]->intro_content}}</textarea>
												
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mô tả</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea type="text" class="form-control" id="ckeditor" name="mota"> {{$intro[0]->intro_desc}}</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái</label>
											<div class="col-md-6 col-sm-6 text-center">
									
											  <span class="btn btn-default btn-file">
					                             <img src="{{URL::to('uploads/intro/'.$intro[0]->intro_image)}}" id="imgPre" class="img-thumbnail cover" width="300px"/> <input type="file" name="image" id="ful" value="{{$intro[0]->intro_image}}">
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
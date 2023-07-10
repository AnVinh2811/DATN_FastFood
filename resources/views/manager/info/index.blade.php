@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Design <small>different form elements</small></h2>
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
									@foreach($contact as $key => $cont)
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{URL::to('/update-info/'.$cont->info_id)}}" method="post"  enctype="multipart/form-data">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Thông tin liên hệ <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none"   rows="8" class="form-control" name="info_contact" id="ckeditor" >{{$cont->info_contact}}</textarea>
												
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bản đồ</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none"  rows="8" class="form-control" name="info_map">{{$cont->info_map}}</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Fanpage</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="8" class="form-control" name="info_fanpage" placeholder="Mô tả danh mục">{{$cont->info_fanpage}}</textarea>
											</div>
										</div>

										
										<!-- <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="status" id="" class="form-control" >
													 
											      <option value="1">Hiện</option>
											      <option value="0">Ẩn</option>

												</select>
											</div>
										</div> -->

										

										


										
										<div class="ln_solid"></div>
										<div class="item form-group text-center">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<!-- <button class="btn btn-primary" type="button">Cancel</button> -->
												<!-- <button class="btn btn-primary" type="reset">Reset</button> -->
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection
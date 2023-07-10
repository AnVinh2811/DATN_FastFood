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
									<form role="form"  action="{{route('themsp')}}" method="post" enctype="multipart/form-data" >
										@csrf
										<div class=" item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên sản phẩm <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" class="form-control" required="required"  name="ten" placeholder="Nhập tên sản phẩm">
												
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Loại sản phẩm <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="loai" id="" class="form-control" >
													  @foreach($cate as $c)
													  <option value="{{$c->category_id}}">{{$c->category_name}}</option>
													  @endforeach
												</select>
												
											</div>
										</div>
										<div class=" item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mô tả sản phẩm</label>
											<div class="col-md-6 col-sm-6 ">
												
												<textarea type="text" class="form-control" required="required" name="mota" id="ckeditor"  placeholder="Mô tả"></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Giá bán</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" class="form-control price_format " required="required" name="gia"  placeholder="Nhập giá">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Giá gốc <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" class="form-control price_format" name="gia_goc" required="required"  placeholder="Nhập giá">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Giá khuyển mãi <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" class="form-control price_format" name="gia_km" required="required"  placeholder="Nhập giá khuyến mãi">
											</div>
										</div>
										

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Loại sản phẩm <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="status" id="" class="form-control" >
													 
											      <option value="1">Hiện</option>
											      <option value="0">Ẩn</option>

												</select>
												
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Số lượng <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" class="form-control price_format" name="soluong" required="required"  placeholder="Nhập số lượng">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Kích thước <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												 @foreach($attr1 as $size)
												  <input type="checkbox" value="{{$size->attr_id}}" name="attr_id[]">{{$size->value}}&nbsp;&nbsp;&nbsp;&nbsp;
												  @endforeach
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 text-center">
												<!-- <input type="file" name="hinh" id="ful" name="ful" required="required" class="form-control"> -->
												<span class="btn btn-default btn-file">
					                             <img src="{!! asset('web/images/download.png')!!}" id="imgPre" class="img-thumbnail cover" width="300px"/> <input type="file" name="hinh" id="ful" required="required" >
					                             </span>
												<!-- <div class="form-group text-center">
											      <img src="{!! asset('web/images/download.png')!!}" id="imgPre" class="img-thumbnail cover" width="300px"/>
											  </div> -->
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
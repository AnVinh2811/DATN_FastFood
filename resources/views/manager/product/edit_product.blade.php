@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Sửa sản phẩm </h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('pro_update',$pro_edit->product_id)}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên sản phẩm <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" value="{{$pro_edit->product_name}}" required="required" class="form-control"  name="ten" placeholder="Nhập tên sản phẩm">
												
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Loại sản phẩm <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="loai" id="" class="form-control" >
													  @foreach($cate as $c)
												
													  @if($c->category_id==$pro_edit->category_id)
													  <option selected value="{{$c->category_id}}">{{$c->category_name}}</option>
													  @endif
													  <option value="{{$c->category_id}}">{{$c->category_name}}</option>
													  @endforeach
													 
													 
												</select>
												
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mô tả sản phẩm</label>
											<div class="col-md-6 col-sm-6 ">
												<!-- <input id="middle-name" class="form-control" type="text" name="middle-name"> -->
												<textarea type="text" class="form-control" name="mota" required="required" id="ckeditor"  placeholder="Mô tả">{{$pro_edit->product_desc}}</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Giá bán</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" class="form-control price_format " value="{{$pro_edit->product_price}}" required="required" name="gia"  placeholder="Nhập giá">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Giá gốc <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" class="form-control price_format" value="{{$pro_edit->price_cost}}" name="gia_goc" required="required"  placeholder="Nhập giá">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Giá khuyển mãi <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" class="form-control price_format" value="{{$pro_edit->gia_km}}" name="gia_km" required="required"  placeholder="Nhập giá khuyến mãi">
											</div>
										</div>
										

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Trạng thái <span class="required">*</span>
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
												<input type="text" class="form-control price_format" value="{{$pro_edit->soluong}}" name="soluong" required="required"  placeholder="Nhập số lượng">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 text-center">
												<span class="btn btn-default btn-file">
					                             <img src="{{URL::to('images/'.$pro_edit->product_image)}}" id="imgPre" class="img-thumbnail cover" width="300px"/> <input type="file" name="hinh" id="ful" value="{!!$pro_edit->product_image!!}" >
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
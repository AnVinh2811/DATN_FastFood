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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="{{URL::to('/insert-coupon-code')}}" method="post">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên mã giảm giá <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="coupon_name" class="form-control" required="required">
												
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mã</label>
											<div class="col-md-6 col-sm-6 ">
												 <input type="text" required="required" name="coupon_code" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Số lượng mã</label>
											<div class="col-md-6 col-sm-6 ">
												 <input type="number" name="coupon_time" class="form-control" id="exampleInputEmail1" >
											</div>
										</div>
									
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tính năng mã</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="coupon_condition" id="" class="form-control" >
													 
											      <option value="1">Giảm theo phần trăm</option>
											      <option value="2">Giảm theo tiền</option>

												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">nhập % hoặc số tiền</label>
											<div class="col-md-6 col-sm-6 ">
												 <input type="text"  name="coupon_number" class="form-control" required="required" >
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ngày bắt đầu</label>
											<div class="col-md-6 col-sm-6 ">
												 <input type="text" name="coupon_date_start" id="start_coupon" class="form-control" required="required">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ngày kết thúc</label>
											<div class="col-md-6 col-sm-6 ">
												 <input type="text" name="coupon_date_end" id="end_coupon" required="required" class="form-control">
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

@section('ui')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
@endsection
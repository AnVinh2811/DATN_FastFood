@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Thêm User</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								@if(Session()->has('error'))
								<section class='alert alert-danger' style="text-align: center;">{{session('error')}}</section>
								@endif
								@if (count($errors)>0)
								<section class='alert alert-danger' style="text-align: center;">
								@foreach ($errors->all() as $err)
									{{$err}}
								@endforeach
								@endif
								
								<div class="x_content">
									<br />
									<form  role="form" action="{{URL::to('store-users')}}" method="post" novalidate>
										@csrf
										<div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên User <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="admin_name" data-validate-length-range="6" required="required" data-validate-words="2" class="form-control" placeholder="Nhập tên">
												
											</div>
										</div>
										
										<div class="field item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" name="admin_email" required="required" class="form-control" class='email' id="exampleInputEmail1" placeholder="nhập email">
											</div>
										</div>
										<div class="field item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Điện thoại</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="tel" name="admin_phone" required="required" class="form-control" class='tel' data-validate-length-range="10,20" placeholder="nhập số điện thoại">
												
											</div>
										</div>

										<div class="field item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mật khẩu</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="password1" name="admin_password"  class="form-control" placeholder="nhập password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Tối đa 8 ký tự bao gồm 1 chữ Hoa và 1 chữ thường, 1 số và 1 ký tự đặc biệt" required>
												<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
												
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="field item form-group">
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
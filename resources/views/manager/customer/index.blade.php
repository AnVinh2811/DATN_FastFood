@extends('manager.template.admin_layout')
@section('content')

<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý Khách hàng</h2>
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
                  
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>

                        <tr>
                          <th>STT</th>
                          <th>Tên khách hàng</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Password</th>
                          <!-- <th>Chức năng</th> -->
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($customer as $key => $customer)
                        <?php $i++ ?>
                        <form action="{{url('/assign-roles')}}" method="POST">
                        @csrf
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{ $customer->customer_name }}</td>
                          <td>
                            {{ $customer->customer_email }} 
                            <input type="hidden" name="customer_email" value="{{ $customer->email }}">
                            <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}">
                          </td>
                          <td>{{ $customer->customer_phone }}</td>
                          <td>{{ $customer->customer_password }}</td>
                          <!-- <td>
                             <p><a style="margin:5px 0;font-size:13px" class="btn btn-sm btn-info" href="{{url('/delete-customer-roles/'.$customer->admin_id)}}" onclick="return confirm('Cbạn có chắc muốn xóa customer này không')">Xóa khách hàng</a></p>
                            
                          </td>  -->
                        </tr>
                      </form>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- <div class="pagination">
                    
                  </div> -->
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
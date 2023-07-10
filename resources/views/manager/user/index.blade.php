@extends('manager.template.admin_layout')
@section('content')

<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý User</h2>
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
                  	<a href="{{URL::to('/add-users')}}" class="btn-color" type="button" >Thêm User</a>
                  </div>
                  
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>

                        <tr>
                          <th>STT</th>
                          <th>Tên user</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Password</th>
                          <th>Admin</th>
                          <th>User</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($admin as $key => $user)
                        <?php $i++ ?>
                        <form action="{{url('/assign-roles')}}" method="POST">
                        @csrf
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{ $user->name }}</td>
                          <td>
                            {{ $user->email }} 
                            <input type="hidden" name="admin_email" value="{{ $user->email }}">
                            <input type="hidden" name="admin_id" value="{{ $user->admin_id }}">
                          </td>
                          <td>{{ $user->phone }}</td>
                          <td>{{ $user->password }}</td>
                          <td><input type="checkbox" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                          <td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
                          <td>
                             <p><input type="submit" value="Phân quyền" class="btn btn-sm btn-warning"></p>
                             <p><a style="margin:5px 0;font-size:13px" class="btn btn-sm btn-info" href="{{url('/delete-user-roles/'.$user->admin_id)}}" onclick="return confirm('Cbạn có chắc muốn xóa user này không')">Xóa user</a></p>
                             <p><a style="margin:5px 0;font-size:13px" class="btn btn-sm btn-success" href="{{url('/impersonate/'.$user->admin_id)}}">Chuyển quyền</a></p>
                            
                          </td> 
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
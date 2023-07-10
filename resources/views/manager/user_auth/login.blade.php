<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập </title>

    <!-- Bootstrap -->
    <link href="{!! asset('layout_admin/admin/vendors/bootstrap/dist/css/bootstrap.min.css')!!}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('layout_admin/admin/vendors/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{!! asset('layout_admin/admin/vendors/nprogress/nprogress.css')!!}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{!! asset('layout_admin/admin/vendors/animate.css/animate.min.css')!!}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{!! asset('layout_admin/admin/build/css/custom.min.css')!!}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @if(Session::has('thongbao'))
                  <div class="alert alert-danger">{{Session::get('thongbao')}}</div>
              @endif
            <form action="{{url('/login1')}}" method="post">
              @csrf
              <h1>Login Form</h1>
              
              <div>
                <!-- <input type="text" class="form-control" placeholder="Username" required="" /> -->
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" required="required" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div>
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" required="required" class="form-control" placeholder="Enter Your Password">
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="{{url('/register')}}" method="post" >
              @csrf
              <h1>Create Account</h1>
              @if(count($errors)>0)
                             <div class ="alert alert-danger">
                              @foreach($errors->all() as $err)

                                  <li style="list-style-type: none" class="alert alert-warning">{{$err}};</li>

                              @endforeach
                             </div>
                        @endif
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
              <div>
                <!-- <input type="text" class="form-control" placeholder="Username" required="" /> -->
                <label for="exampleInputEmail1">Name</label>
                <input  type="text"  name="name" class="form-control" required="required" placeholder="Enter Name">
              </div>
              <div>
                <label for="exampleInputEmail1">Email address</label>
                <input  type="email" name="email"  class="form-control" required="required" placeholder="Enter email">
              </div>
              <div>
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input  type="text" name="phone"  class="form-control" required="required" placeholder="Enter phone">
              </div>
              <div>
                <label for="exampleInputEmail1">Password</label>
                <input  type="password" name="password" name="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
              </div>
              
              <div>
                <button type="submit" class="btn btn-default submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

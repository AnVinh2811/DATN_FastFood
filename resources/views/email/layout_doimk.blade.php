<!DOCTYPE HTML>
<html>

<head>
   <link rel="icon" type="images/x-icon" href="http://127.0.0.1:8000/web/images/logo1.png" />
   <title>Đổi Mật Khẩu</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="{!! asset('login/sty.css')!!}">
   <script src="{!! asset('login.js1.js')!!}"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->

   <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body style="background: #F2BE22;">
   <div class="container">
      <div class="row">
         <div class="col-md-5 mx-auto">
            <div id="first">
               <div class="myform form ">
                  <div class="logo mb-3">
                     <div class="col-md-12 text-center">
                        <h1>Đổi mật khẩu</h1>
                     </div>
                  </div>
                  <?php
                  $t = Session::get('status');
                  if (isset($t)) {
                     echo $t;
                  }
                  ?>
                  @if (count($errors)>0)
                  <section class='alert alert-danger' style="text-align: center;">
                     @foreach ($errors->all() as $err)
                     {{$err}}
                     @endforeach
                  </section>

                  @endif

                  @php
                  $email = $_GET['email'];
                  $code = $_GET['code'];
                  @endphp
                  <form action="{{route('postdoimk')}}" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="email" value="{{$email}}" />
                     <input type="hidden" name="code" value="{{$code}}" />
                     <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu mới</label>
                        <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Mật khẩu mới">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Nhập lại mật khẩu mới</label>
                        <input type="password" name="re_password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Nhập lại mật khẩu mới">
                     </div>
                     <div class="col-md-12 text-center ">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Xác nhận</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</body>

</html>

<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{URL::to('/trangchu')}}" class="site_title"><i class="fa fa-cutlery"></i> <span>Quản lý</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{!! asset('layout_admin/admin/images/img.jpg')!!}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::User()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!-- <li><a href="{{URL::to('/trangchu')}}"><i class="fa fa-home"></i> Trang chủ </a>
                    
                  </li> -->
                  <li><a href="{{route('pro_index')}}"><i class="fa fa-edit"></i> Sản phẩm</a>
                    
                  </li>
                  <li><a href="{{route('cate_index')}}"><i class="fa fa-desktop"></i> Loại sản phẩm </a>
                  </li>
                  @hasrole(['admin'])
                  <li><a href="{{url('/users')}}"><i class="fa fa-table"></i> Admin</a>
                  </li>
                  @endhasrole
                  @hasrole(['admin'])
                  <li><a href="{{url('/customers')}}"><i class="fa fa-user"></i> Khách hàng</a>
                  </li>
                  @endhasrole
                  <li><a href="{{URL::to('/manage-order')}}"><i class="fa fa-bar-chart-o"></i> Đơn hàng <span class="badge badge-success">{{Session::get('or-nu')}}</span></a>
                  </li>
                  <!-- <li><a href="{{route('add_attr')}}"><i class="fa fa-clone"></i>Thuộc tính</a>
                    
                  </li> -->
                  <li><a href="{{route('list_coupon')}}"><i class="fa fa-clone"></i>Mã giảm giá</a>
                    
                  </li>
                  <li><a href="{{URL::to('/manage-slider')}}"><i class="fa fa-clone"></i>Slideshow</a>
                    
                  </li>

                  <li><a href="{{route('list_addvertised')}}"><i class="fa fa-edit"></i> Banner quảng cáo</a></li>

                  <!-- <li><a href="{{route('list_popup')}}"><i class="fa fa-edit"></i> Pop-up quảng cáo</a></li> -->

                  <!-- <li><a href="{{URL::to('/all-post')}}"><i class="fa fa-clone"></i>Bài viết</a>
                    
                  </li> -->
                  <!-- <li><a href="{{URL::to('/information')}}"><i class="fa fa-clone"></i>Thông tin website</a>
                    
                  </li> -->

                  <!-- <li><a href="{{URL::to('/all-category-post')}}"><i class="fa fa-bar-chart-o"></i> Danh mục bài viết </a>
                  </li> -->
                  
                  <li><a href=" {{URL::to('/introduce')}}"><i class="fa fa-clone"></i>Giới thiệu</a>
                    
                  </li>
                  <li><a href="{{route('chinh')}}"><i class="fa fa-clone"></i>Chính sách</a>
                    
                  </li>
                 <!--  <li><a href="{{URL::to('/comment')}}"><i class="fa fa-clone"></i>Bình luận</a>
                    
                  </li> -->
                  @chuyen
                  <li>
                      <a href="{{URL::to('impersonate-destroy')}}">Ngừng chuyển quyền<u></u></a>
                  </li>
                  @endchuyen

                   
                </ul>
              </div>
             

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
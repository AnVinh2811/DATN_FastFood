<!DOCTYPE HTML>
<html>

<head>
    <title>Trang quản lý</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('layout_admin/css/bootstrap.min.css') !!}" rel='stylesheet' type='text/css' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link href="{!! asset('layout_admin/css/style.css') !!}" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{!! asset('layout_admin/css/lines.css') !!}" rel='stylesheet' type='text/css' />
    <link href="{!! asset('layout_admin/css/font-awesome.css') !!}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="{!! asset('layout_admin/css/jquery-ui.css') !!}">
    <!-- jQuery -->
    <script src="{!! asset('layout_admin/js/jquery.min.js') !!}"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!---//webfonts--->
    <!-- Nav CSS -->
    <link href="{!! asset('layout_admin/css/custom.css') !!}" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="{!! asset('layout_admin/js/metisMenu.min.js') !!}"></script>
    <script src="{!! asset('layout_admin/js/custom.js') !!}"></script>
    <!-- Graph JavaScript -->
    <script src="{!! asset('layout_admin/js/d3.v3.js') !!}"></script>
    <script src="{!! asset('layout_admin/js/rickshaw.js') !!}"></script>
    <script src="{!! asset('layout_admin/ckeditor/ckeditor.js') !!}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{!! asset('layout_admin/js/simple.money.format.js') !!}"></script>
    <script src="{!! asset('layout_admin/js/adminjs.js') !!}"></script>

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->

        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Modern</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">

                    <ul class="dropdown-menu">
                        <li class="dropdown-menu-header">
                            <strong>Messages</strong>
                            <div class="progress thin">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="{!! asset('public/uploads/post/767297506.jpg') !!}"></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-menu-header text-center">
                            <strong>{{ Auth::User()->name }}</strong>
                        </li>


                        <li class="m_2"><a href="{{ route('logout_auth') }}"><i class="fa fa-lock"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ URL::to('/trangchu') }}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Trang
                                chủ</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/introduce') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Giới thiệu</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/information') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Liên hệ</span>
                            </a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Quản lý sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('pro_index') }}">Sản phẩm</a>
                                </li>
                                <!-- <li>
                                    <a href="{{ route('pro_add') }}">thêm sản phẩm</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>Quản lý loại sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('cate_index') }}">Loại sản phẩm</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>Quản lý bình luận<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('/comment') }}">Quản lý bình luận</a>
                                </li>

                            </ul>

                        </li>




                        <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>Slide show<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('/manage-slider') }}">liệt kê slider<u></u></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/add-slider') }}">Thêm slider<u></u></a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>Mã giảm giá<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('insert_coupon') }}">Thêm mã giảm giá<u></u></a>
                                </li>
                                <li>
                                    <a href="{{ route('list_coupon') }}">danh sách mã giảm giá<u></u></a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>Banner quảng cáo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('add_addvertised') }}">Thêm quảng cáo<u></u></a>
                                </li>
                                <li>
                                    <a href="{{ route('list_addvertised') }}">danh sách quảng cáo<u></u></a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <!-- <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>Vận chuyển<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('/delivery') }}">Quản lý vận chuyển<u></u></a>
                                </li>
                                
                               
                            </ul>
                            
                        </li> -->

                        <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>quản lý bài viết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('/add-post') }}">Thêm bài viết</a></li>
                                <li><a href="{{ URL::to('/all-post') }}">Liệt kê bài viết</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>quản lý danh mục bài viết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('/add-category-post') }}">Thêm danh mục bài viết</a></li>
                                <li><a href="{{ URL::to('/all-category-post') }}">Liệt kê danh mục bài viết</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>





                        <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>Quản lý đơn hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('/manage-order') }}">Đơn hàng<u></u></a>
                                </li>


                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="{{ route('chinh') }}"><i class="fa fa-envelope nav_icon"></i>Chính sách<span class="fa arrow"></span></a>
                        </li>


                        <li>
                            <a href="widgets.html"><i class="fa fa-flask nav_icon"></i>Quản lý thuộc tính</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('add_attr') }}">thêm thuộc tính</a>
                                </li>

                            </ul>
                        </li>
                        @hasrole(['admin'])
                        <li>
                            <a href="widgets.html"><i class="fa fa-flask nav_icon"></i>Quản lý User</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/add-users') }}">thêm User</a>
                                    <a href="{{ url('/users') }}">liệt kê User</a>
                                </li>

                            </ul>
                        </li>
                        @endhasrole

                        @chuyen
                        <li>
                            <a href="{{ URL::to('impersonate-destroy') }}">ngừng chuyển quyền<u></u></a>
                        </li>
                        @endchuyen

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="graphs">
                Xin chào Admin

            </div>
            <div class="tai22">
                <?php
                $mes = Session::get('message');
                if (isset($mes)) {
                    // echo $mes;
                    echo '<span  class="alert alert-success">' . $mes . '</span>';
                    Session::put('message', null);
                }
                ?>
            </div>
            @yield('content')
        </div>
        <div class="clearfix"> </div>
    </div>

    <script type="text/javascript">
        $('.price_format').simpleMoneyFormat();
    </script>
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ url(' / search ') }}',
                data: {
                    search: $value
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        })
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

    <!-- coupon -->
    <script type="text/javascript">
        $(function() {
            $("#start_coupon").datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy/mm/dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
            $("#end_coupon").datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy/mm/dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
        });
    </script>
    <!-- end coupon  -->
    <script type="text/javascript">
        function ChangeToSlug() {
            var slug;

            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>
    <script src="{!! asset('layout_admin/js/bootstrap.min.js') !!}"></script>
    <script>
        $('#inputName').change(function(event) {
            var _ip = $('#inputName').val();
            if (_ip == 'size') {
                $('.value2').show();
                $('#v2').attr({
                    name: 'value',
                });
                $('.value1').hide();
                $('#v1').attr({
                    name: '',
                });
                $('.value3').hide();
                $('#v3').attr({
                    name: '',
                });
            } else if (_ip == 'color') {
                $('.value1').show();
                $('#v1').attr({
                    name: 'value',
                });
                $('.value2').hide();
                $('#v2').attr({
                    name: '',
                });
                $('.value3').hide();
                $('#v3').attr({
                    name: '',
                });
            } else if (_ip == 'hot') {
                $('.value3').show();
                $('#v3').attr({
                    name: 'value',
                });
                $('.value1').hide();
                $('#v1').attr({
                    name: '',
                });
                $('.value2').hide();
                $('#v2').attr({
                    name: '',
                });
            }
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {

            //     });
            var donut = Morris.Donut({
                element: 'donut',
                resize: true,
                colors: [
                    '#5af542',
                    '#20f1f5',
                    '#f54272',
                    '#dee820',
                    '#3322f2'

                ],
                //labelColor:"#cccccc", // text color
                //backgroundColor: '#333333', // border color
                data: [{
                        label: "Sản phẩm",
                        value: <?php echo $app_product; ?>
                    },
                    {
                        label: "Bài viết",
                        value: <?php echo $app_post; ?>
                    },
                    {
                        label: "Đơn hàng",
                        value: <?php echo $app_order; ?>
                    },

                    {
                        label: "Khách hàng",
                        value: <?php echo $app_customer; ?>
                    }
                ]
            });

        });
    </script>




    <script type="text/javascript">
        $(document).ready(function() {

            chart60daysorder();

            var chart = new Morris.Bar({

                element: 'chart1',
                //option chart
                lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                parseTime: false,
                hideHover: 'auto',
                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']

            });



            function chart60daysorder() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/days-order') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });
            }

            $('.dashboard-filter').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                // alert(dashboard_value);
                $.ajax({
                    url: "{{ url('/dashboard-filter') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        dashboard_value: dashboard_value,
                        _token: _token
                    },

                    success: function(data) {
                        chart.setData(data);
                    }

                });

            });

            $('#btn-dashboard-filter').click(function() {

                var _token = $('input[name="_token"]').val();

                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();

                $.ajax({
                    url: "{{ url('/filter-by-date') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        _token: _token
                    },

                    success: function(data) {
                        chart.setData(data);
                    }
                });

            });

        });
    </script>
    <script src="{!! asset('layout_admin/js/validate.js') !!}"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> -->
    <script type="text/javascript">
        $.validate({

        });
    </script>

    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
            $("#datepicker2").datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
        });
    </script>


    <script type="text/javascript">
        $('.update_quantity_order').click(function() {
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_' + order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();
            // alert(order_product_id);
            // alert(order_qty);
            // alert(order_code);
            $.ajax({
                url: '{{ url(' / update - qty ') }}',

                method: 'POST',

                data: {
                    _token: _token,
                    order_product_id: order_product_id,
                    order_qty: order_qty,
                    order_code: order_code
                },
                // dataType:"JSON",
                success: function(data) {

                    alert('Cập nhật số lượng thành công');

                    location.reload();




                }
            });

        });
    </script>
    <script type="text/javascript">
        $('.order_details').change(function() {
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();

            //lay ra so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function() {
                quantity.push($(this).val());
            });
            //lay ra product id
            order_product_id = [];
            $("input[name='order_product_id']").each(function() {
                order_product_id.push($(this).val());
            });
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                //so luong khach dat
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j == 1) {
                        alert('Số lượng bán trong kho không đủ');
                    }
                    $('.color_qty_' + order_product_id[i]).css('background', '#000');
                }
            }

            if (j == 0) {

                $.ajax({
                    url: '{{ url(' / update - order - qty ') }}',
                    method: 'POST',
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id,
                        quantity: quantity,
                        order_product_id: order_product_id
                    },
                    success: function(data) {
                        alert('đơn hàng đã được xử lý');
                        location.reload();
                    }
                });

            }

        });
    </script>

    <script type="text/javascript">
        $('.comment_duyet_btn').click(function() {
            var comment_status = $(this).data('comment_status');

            var comment_id = $(this).data('comment_id');
            var comment_product_id = $(this).attr('id');
            if (comment_status == 0) {
                var alert = 'Thay đổi thành duyệt thành công';
            } else {
                var alert = 'Thay đổi thành không duyệt thành công';
            }
            $.ajax({
                url: "{{ url('/allow-comment') }}",
                method: "POST",

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_status: comment_status,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(data) {
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">' + alert + '</span>');

                }
            });


        });
        $('.btn-reply-comment').click(function() {
            var comment_id = $(this).data('comment_id');

            var comment = $('.reply_comment_' + comment_id).val();



            var comment_product_id = $(this).data('product_id');


            // alert(comment);
            // alert(comment_id);
            // alert(comment_product_id);

            $.ajax({
                url: "{{ url('/reply-comment') }}",
                method: "POST",

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment: comment,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(data) {
                    $('.reply_comment_' + comment_id).val('');
                    $('#notify_comment').html(
                        '<span class="text text-alert">Trả lời bình luận thành công</span>');

                }
            });


        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(imgPre).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#ful').change(function() {
            readURL(this, '#imgPre');
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url(' / select - feeship ') }}',
                    method: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur', '.fee_feeship_edit', function() {

                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                // alert(feeship_id);
                // alert(fee_value);
                $.ajax({
                    url: '{{ url(' / update - delivery ') }}',
                    method: 'POST',
                    data: {
                        feeship_id: feeship_id,
                        fee_value: fee_value,
                        _token: _token
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });

            });
            $('.add_delivery').click(function() {

                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url(' / insert - delivery ') }}',
                    method: 'POST',
                    data: {
                        city: city,
                        province: province,
                        _token: _token,
                        wards: wards,
                        fee_ship: fee_ship
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });


            });
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ url(' / select - delivery ') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>


    <script type="text/javascript">
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.

        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1', {

            filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('file-browser?_token=' . csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });

        CKEDITOR.replace('ckeditor2', {

            filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('file-browser?_token=' . csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });

        CKEDITOR.replace('ckeditor3', {

            filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('file-browser?_token=' . csrf_token()) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('id4');
    </script>
</body>

</html>
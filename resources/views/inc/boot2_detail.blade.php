    <script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css"></script>
    <script src="{!! asset('web/js/jquery-2.2.3.min.js')!!}"></script>

    <script src="{!! asset('web/js/jquery.simplyscroll.js')!!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="{!! asset('web/js/slick.js')!!}"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="{!! asset('web/js/app.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/validator/validator.js')!!}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

    <script>
        window.addEventListener('load', function() {
            const load = document.querySelector('.loader');
            load.className += " hidden";
        })
    </script>

    @yield('script')
    <!-- Login -->
    <script>
        $('#login-form').validate({
            rules: {

                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }

            },
            messages: {

                email: {
                    required: "Vui lòng nhập email",
                    email: "Vui lòng nhập đúng định dạng email"
                },
                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Vui lòng nhập ít nhất 8 kí tự",
                },



            }
        });
    </script>
    <!-- Regis -->
    <script>
        $('#regis-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5
                },
                sdt: {
                    required: true,
                    number: true,
                    minlength: 9
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                re_password: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"

                }
            },
            messages: {
                name: {
                    required: "vui lòng nhập tên",
                    minlength: "Vui lòng nhập ít nhất 5 ký tự",
                },
                sdt: {
                    required: "Vui lòng nhập số điện thoại",
                    minlength: "Số máy quý khách vừa nhập là số không có thực",
                    number: "Số điện thoại phải là số nguyên dương",

                },
                email: {
                    required: "Vui lòng nhập email",
                    email: "Vui lòng nhập đúng định dạng email",
                },
                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Vui lòng nhập ít nhất 8 kí tự",
                },
                re_password: {
                    required: "Vui lòng nhập lại mật khẩu",
                    minlength: "Vui lòng nhập ít nhất 8 kí tự",
                    equalTo: " Vui lòng nhập đúng mật khẩu ở trên",
                },


            }


        });
    </script>
    <!-- PayForm -->
    <script>
        $("#pay-form").validate({
            rules: {
                shipping_name: {
                    required: true,
                    minlength: 5
                },
                shipping_email: {
                    required: true,
                    email: true
                },
                shipping_phone: {
                    required: true,
                    number: true,
                    minlength: 10
                },
                shipping_notes: {
                    required: false,
                },
                shipping_address: {
                    required: true,
                    minlength: 5
                }

            },
            messages: {
                shipping_name: {
                    required: "Vui lòng nhập tên",
                    minlength: "Vui lòng nhập ít nhất 5 ký tự"
                },
                shipping_email: {
                    required: "Vui lòng nhập email",
                    email: "Email không hợp lệ",

                },
                shipping_phone: {
                    required: "Vui lòng nhập số điện thoại",
                    minlength: "Số máy quý khách vừa nhập là số không có thực",
                    number: "Số điện thoại phải là số nguyên dương",
                },
                shipping_address: {
                    required: 'Vui lòng nhập địa chỉ',
                    minlength: 'Vui lòng nhập ít nhất 5 kí tự'
                },


            }
        });
    </script>


    <script>
        $('#change_info_form').validate({
            ignore: '.ignore',
            errorClass: 'invalid',
            validClass: 'success',
            rules: {
                name: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                email: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                phone: {
                    required: true,
                    equalTo: '#password'
                },
            },
            messages: {
                name: {
                    required: 'Vui lòng nhậphọ và tên của bạn.',
                },
                email: {
                    required: 'Vui lòng nhập email của bạn.',
                },
                phone: {
                    required: 'Vui lòng nhập số điện thoại của bạn.',
                },
            },
            submitHandel: function(form) {
                $.LoadOverlay("show");
                form.submit();
            }
        });
    </script>


    <script>
        $('#change_password_form').validate({
            ignore: '.ignore',
            errorClass: 'invalid',
            validClass: 'success',
            rules: {
                old_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                new_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                },
            },
            messages: {
                old_password: {
                    required: 'Vui lòng nhập mật khẩu hiện tại của bạn.',
                },
                new_password: {
                    required: 'Vui lòng nhập mật khẩu của bạn.',
                },
                confirm_password: {
                    required: 'Vui lòng nhập lại mật khẩu của bạn.',
                },
            },
            submitHandel: function(form) {
                $.LoadOverlay("show");
                form.submit();
            }
        });
    </script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
    <script type="text/javascript">
        $('#fo').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var full = window.location.href;
            var final = full + "&" + formData;
            window.location.href = final;


        })
    </script>
    @yield('payment')
    <script>
        show_comment();

        $('#commentForm').on('submit', function(e) {
            e.preventDefault();
            var url = document.URL;
            var url_arr = url.split('/');
            var id = url_arr[url_arr.length - 1];
            var _token = $('input[name="_token"]').val();
            var name = $('.name').val();
            var comment = $('.comment').val();
            var commentId = $('.commentId').val();
            var pro_id = $('.pro_id').val();
            $.ajax({
                url: '{{url(' / cli / send - comment ')}}',
                method: 'POST',
                data: {
                    name: name,
                    comment: comment,
                    commentId: commentId,
                    pro_id: pro_id,
                    _token: _token
                },
                success: function(data) {
                    toastr.success('add comment success');
                    $('#commentForm').trigger('reset');
                    show_comment();
                    $('#commentId').val(0);


                }

            });


        });

        function add() {
            let dia = document.getElementById('dia');
            dia.classList.add('marl');
        }

        function show_comment() {
            var url = document.URL;
            var url_arr = url.split('/');
            var id = url_arr[url_arr.length - 1];
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url(' / cli / load - comment ')}}',
                method: 'POST',
                data: {
                    id: id,
                    _token: _token
                },
                success: function(data) {
                    $('#binhluan').html(data);
                }
            });
        }

        $(document).on('click', '.reply', function() {
            var commentId = $(this).attr("id");
            $('#commentId').val(commentId);
            $('#name').focus();
        });
    </script>

    <script src="{!! asset('layout_admin/js/validate.js')!!}"></script>


    <!-- HuyDonHang -->
    <script type="text/javascript">
        function huydonhang(myid) {
            var id = myid;
            var lydo = $('.lydohuydon').val();
            var order_status = 3;
            var _token = $('input[name="_token"]').val();
            swal({
                title: "Hủy đơn hàng",
                text: "Bạn có chắc muốn hủy đơn hàng này không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Đồng ý",

                cancelButtonText: "Đóng",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: '../huy-don-hang',
                        method: "post",
                        data: {
                            _token: _token,
                            id: id,
                            lydo: lydo,
                            order_status: order_status
                        },
                        success: function(data) {
                            // alert('Hủy đơn hàng thành công');
                            swal("Đồng ý", "Đơn hàng đã được hủy", "success");
                            // location.reload();
                        }

                    });
                } else {
                    swal("Đóng", "Đơn hàng chưa bị hủy", "error");
                }
            });

        }
    </script>



    <script type="text/javascript">


    </script>

    <script src="{!! asset('web/js/imagezoom.js')!!}"></script>
    <link rel="stylesheet" href="{!! asset('web/css/flexslider.css')!!}" type="text/css" media="screen" />
    <script src="{!! asset('web/js/jquery.flexslider.js')!!}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <script src="{!! asset('web/js/jquery.magnific-popup.js')!!}"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>

    <script type="text/javascript">
        function remove_background(product_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + product_id + '-' + count).css('color', 'grey');
            }
        }
        //hover chuột đánh giá sao
        $(document).on('mouseenter', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            // alert(index);
            // alert(product_id);
            remove_background(product_id);
            for (var count = 1; count <= index; count++) {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });
        //nhả chuột ko đánh giá
        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var rating = $(this).data("rating");
            remove_background(product_id);
            for (var count = 1; count <= rating; count++) {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });

        //click đánh giá sao
        $(document).on('click', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/insert-rating')}}",
                method: "POST",
                data: {
                    index: index,
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    if (data == 'done') {
                        window.location.reload();
                    } else {
                        alert("Lỗi đánh giá");
                    }
                }
            });

        });
    </script>
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var query = $(this).val();

            if (query != '') {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{url('/autocomplete-ajax')}}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });

            } else {

                $('#search_ajax').fadeOut();
            }
        });

        $(document).on('click', '.li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    <script>
        $(function() {
            $('.orderby').change(function() {
                $('#form_order').submit();
            });
        });
    </script>
    <!-- nav smooth scroll -->

    <script src="{!! asset('web/js/amazingslider.js')!!}"></script>
    <script src="{!! asset('web/js/initslider-1.js')!!}"></script>
    <!-- <script>
		$(document).ready(function(){
			function thongbao(){
				$.bootstrapGrowl("đã thêm sản phẩm vào giỏ hàng");
			}
		});
	</script> -->
    <!--   <script>
        
        function bao(){
            swal('Thông báo','Đơn hàng của bạn đã hoàn tất, chúng tôi sẽ giao hàng sớm nhất');
            
        }
    
    </script> -->
    <!-- //nav smooth scroll -->

    <!-- popup modal (for location)-->

    <!-- //popup modal (for location)-->

    <!-- cart-js -->
    <script src="{!! asset('web/js/sweetalert.min.js')!!}"></script>
    <script src="{!! asset('web/js/scroll.js')!!}"></script>
    <script src="{!! asset('web/js/SmoothScroll.min.js')!!}"></script>
    <!-- //smoothscroll -->

    <!-- start-smooth-scrolling -->
    <script src="{!! asset('web/js/move-top.js')!!}"></script>
    <script src="{!! asset('web/js/easing.js')!!}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function() {

            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="{!! asset('web/js/sweetalert.min.js')!!}"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.send_order').click(function() {
                var shipping_email = $('.shipping_email').val();
                var shipping_name = $('.shipping_name').val();
                var shipping_address = $('.shipping_address').val();
                var shipping_phone = $('.shipping_phone').val();
                var shipping_notes = $('.shipping_notes').val();
                var shipping_method = $('.payment_select').val();
                var shipping_address1 = $('.shipping_address1').val();
                var order_fee = $('.order_fee').val();
                var order_coupon = $('.order_coupon').val();
                var _token = $('input[name="_token"]').val();
                if (shipping_name == '' || shipping_email == '' || shipping_address == '' || shipping_phone == '' || shipping_method == '' || shipping_address1 == '') {
                    toastr.warning('làm ơn hoàn tất thông tin trước khi đặt');
                } else {

                    swal({
                            title: "Xác nhận đơn hàng",
                            text: "Bạn có chắc muốn đặt hàng không?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Đặt hàng",

                            cancelButtonText: "Không đặt",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                var shipping_email = $('.shipping_email').val();
                                var shipping_name = $('.shipping_name').val();
                                var shipping_address = $('.shipping_address').val();
                                var shipping_phone = $('.shipping_phone').val();
                                var shipping_notes = $('.shipping_notes').val();
                                var shipping_method = $('.payment_select').val();
                                var shipping_address1 = $('.shipping_address1').val();
                                var order_fee = $('.order_fee').val();
                                var order_coupon = $('.order_coupon').val();
                                var _token = $('input[name="_token"]').val();


                                $.ajax({
                                    url: '{{url(' / confirm - order ')}}',
                                    method: 'POST',
                                    data: {
                                        shipping_email: shipping_email,
                                        shipping_name: shipping_name,
                                        shipping_address: shipping_address,
                                        shipping_phone: shipping_phone,
                                        shipping_address1: shipping_address1,
                                        shipping_notes: shipping_notes,
                                        _token: _token,
                                        order_fee: order_fee,
                                        order_coupon: order_coupon,
                                        shipping_method: shipping_method
                                    },
                                    success: function() {


                                    }
                                });


                                // window.setTimeout(function(){ 
                                //     $('#infomodal').modal('show');
                                // } ,3000);

                            } else {
                                swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                            }



                        });

                }

            });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->

    <!-- for bootstrap working -->
    <script src="{!! asset('web/js/bootstrap.js')!!}"></script>


    <link rel="stylesheet" type="text/css" href="{!! asset('web/css/easy-responsive-tabs.css')!!} " />
    <script src="{!! asset('web/js/easyResponsiveTabs.js')!!}"></script>

    <script>
        $(document).ready(function() {
            //Horizontal Tab
            $('#parentHorizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>

    @yield('paginate')
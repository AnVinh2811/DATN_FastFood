<script src="{!! asset('layout_admin/admin/vendors/jquery/dist/jquery.min.js')!!}"></script>

    <!-- Bootstrap -->
    <script src="{!! asset('layout_admin/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')!!}"></script>
    <!-- FastClick -->
    <script src="{!! asset('layout_admin/admin/vendors/fastclick/lib/fastclick.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/select2/dist/js/select2.full.min.js')!!}"></script>
    <!-- NProgress -->
    <script src="{!! asset('layout_admin/admin/vendors/nprogress/nprogress.js')!!}"></script>
    <!-- Chart.js -->
    <script src="{!! asset('layout_admin/admin/vendors/Chart.js/dist/Chart.min.js')!!}"></script>
    <!-- gauge.js -->
    <script src="{!! asset('layout_admin/admin/vendors/gauge.js/dist/gauge.min.js')!!}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{!! asset('layout_admin/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')!!}"></script>
    <!-- iCheck -->
    <script src="{!! asset('layout_admin/admin/vendors/iCheck/icheck.min.js')!!}"></script>
    <!-- Skycons -->
    <script src="{!! asset('layout_admin/admin/vendors/skycons/skycons.js')!!}"></script>
    <!-- Flot -->
    <script src="{!! asset('layout_admin/admin/vendors/Flot/jquery.flot.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/Flot/jquery.flot.pie.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/Flot/jquery.flot.time.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/Flot/jquery.flot.stack.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/Flot/jquery.flot.resize.js')!!}"></script>
    <!-- Flot plugins -->
    <script src="{!! asset('layout_admin/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/flot-spline/js/jquery.flot.spline.min.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/flot.curvedlines/curvedLines.js')!!}"></script>
    <!-- DateJS -->
    <script src="{!! asset('layout_admin/admin/vendors/DateJS/build/date.js')!!}"></script>



    <!-- JQVMap -->
<!--     <script src="{!! asset('layout_admin/admin/vendors/jqvmap/dist/jquery.vmap.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')!!}"></script> -->
    <!-- bootstrap-daterangepicker -->
    <script src="{!! asset('layout_admin/admin/vendors/moment/min/moment.min.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')!!}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{!! asset('layout_admin/admin/build/js/custom.min.js')!!}"></script>

    <script src="{!!asset('layout_admin/ckeditor/ckeditor.js')!!}"></script>
<!--     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script src="{!! asset('layout_admin/js/simple.money.format.js')!!}"></script>
    <!-- <script src="{!! asset('layout_admin/admin/vendors/morris.js/morris.min.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/raphael/raphael.min.js')!!}"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<!--     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->




    <script src="{!! asset('layout_admin/admin/vendors/jszip/dist/jszip.min.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/pdfmake/build/pdfmake.min.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/pdfmake/build/vfs_fonts.js')!!}"></script>
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="{!! asset('layout_admin/admin/vendors/validator/multifield.js')!!}"></script>
    <script src="{!! asset('layout_admin/admin/vendors/validator/validator.js')!!}"></script>




<!--     <script src="{!! asset('layout_admin/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')!!}"></script> -->





    <!-- <script src="{!! asset('layout_admin/admin/vendors/jquery/dist/jquery.min.js')!!}"></script> -->
    <!-- Bootstrap -->
   <script src="{!! asset('layout_admin/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')!!}"></script>
    <!-- FastClick -->
    <script src="{!! asset('layout_admin/admin/vendors/fastclick/lib/fastclick.js')!!}"></script>
    <!-- NProgress -->
    <script src="{!! asset('layout_admin/admin/vendors/nprogress/nprogress.js')!!}"></script>

   <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
   <script src="{!! asset('layout_admin/admin/build/js/custom.min.js')!!}"></script>
   <script src="{!! asset('layout_admin/js/jquery.min.js')!!}"></script>
    <!-- Custom Theme Scripts -->
    @yield('ui')

    <!--  -->



  <!--   <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
  
  @yield('script')

  @yield('morris')
  @yield('paginate')

<script>
      
        $('.chitiet').click(function(){
        var id=$(this).data("id");
        var _token =$('input[name="_token"]').val();
        $.ajax({
            url:"view-order/"+id,
            method:"POST",
            dataType:"JSON",
            data:{id:id,_token:_token},
            success:function(data){
                $('#kh').html(data.kh);
                $('#ship').html(data.ship);
                $('#detail').html(data.detail);
                $('#in').html(data.in);
                $('#print').html(data.print);
            }
        });
    });
     
        
    </script>
    
  



<!--     @yield('delete') -->
  
 
<script>
        $('.nhan').on('click',function(){
            var value=$('input:checkbox:checked').map(function(){
            return this.value;
        }).get().join(",");

            var _token = $('input[name="_token"]').val();
        if(value==''){
            toastr.warning('chọn sản phẩm cần xóa');
        }else{
        $.ajax({
            url:"{{url('/xoanhieu')}}",
            method:"POST",
            data:{value:value,_token:_token},
            success:function(data){
                window.location.reload();
            }
        });
    }

        });
        
    </script>

   
    
    <script>
        function hideshow(){
            var password = document.getElementById("password1");
            var slash = document.getElementById("slash");
            var eye = document.getElementById("eye");
            
            if(password.type === 'password'){
                password.type = "text";
                slash.style.display = "block";
                eye.style.display = "none";
            }
            else{
                password.type = "password";
                slash.style.display = "none";
                eye.style.display = "block";
            }

        }
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
            $('#search').on('keyup',function(){
                var value = $(this).val();
                $.ajax({
                    type: 'get',
                    url:'{{url('/product/search')}}',
                    data: {
                        search: value
                    },
                    success:function(data){
                        $('#list').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>

<!-- coupon -->
<script type="text/javascript">
   
  $( function() {
    $( "#start_coupon" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy/mm/dd",
        dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
        duration: "slow"
    });
    $( "#end_coupon" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy/mm/dd",
        dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
        duration: "slow"
    });
  } );
 
</script>
<!-- end coupon  -->
<script type="text/javascript">
 
    function ChangeToSlug()
        {
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
    <script src="{!! asset('layout_admin/js/bootstrap.min.js')!!}"></script>
    



<script type="text/javascript">
$(document).ready(function(){
      
        //     });
        var donut = Morris.Donut({
          element: 'donut',
          resize: true,
          colors: [
            '#2A3F54',
            '#20c997',
            '#17a2b8',
            '#dc3545',
            '#dc3545'
            
          ],
          //labelColor:"#cccccc", // text color
          //backgroundColor: '#333333', // border color
          data: [
            {label:"Đơn hàng mới", value:<?php echo $new ?>},
            {label:"Đơn hàng đã bị hủy", value:<?php echo $destroy ?>},
            {label:"Đang vận chuyển", value:<?php echo $move ?>},
           
            {label:"Đơn hàng đã xử lý", value:<?php echo $process ?>} 
          ]
        });
     
});
</script>





<script src="{!! asset('layout_admin/js/validate.js')!!}"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> -->
<script type="text/javascript">
        $.validate({
            
        });
</script>   

    <script type="text/javascript">
   
  $( function() {
    $( "#datepicker" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
        duration: "slow"
    });
    $( "#datepicker2" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
        duration: "slow"
    });
  } );
 
</script>


    <script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        // alert(order_product_id);
        // alert(order_qty);
        // alert(order_code);
        $.ajax({
                url : '{{url('/update-qty')}}',

                method: 'POST',

                data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
                // dataType:"JSON",
                success:function(data){

                    alert('Cập nhật số lượng thành công');
                 
                   location.reload();
                    
              
                    

                }
        });

    });
</script>
    <script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if(parseInt(order_qty)>parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('Số lượng bán trong kho không đủ');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#000');
            }
        }
        
        if(j==0){
          
                $.ajax({
                        url : '{{url('/update-order-qty')}}',
                            method: 'POST',
                            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                            success:function(data){
                                alert('đơn hàng đã được xử lý');
                                location.reload();
                            }
                });
            
        }

    });
</script>

<script type="text/javascript">
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');

        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status==0){
            var alert = 'Thay đổi thành duyệt thành công';
        }else{
            var alert = 'Thay đổi thành không duyệt thành công';
        }
          $.ajax({
                url:"{{url('/allow-comment')}}",
                method:"POST",

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function(data){
                    location.reload();
                   $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');

                }
            });


    });
    $('.btn-reply-comment').click(function(){
        var comment_id = $(this).data('comment_id');

        var comment = $('.reply_comment_'+comment_id).val();

        

        var comment_product_id = $(this).data('product_id');

        
        // alert(comment);
        // alert(comment_id);
        // alert(comment_product_id);
        
          $.ajax({
                url:"{{url('/reply-comment')}}",
                method:"POST",

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function(data){
                    $('.reply_comment_'+comment_id).val('');
                   $('#notify_comment').html('<span class="text text-alert">Trả lời bình luận thành công</span>');

                }
            });


    });
</script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(imgPre).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#ful').change(function () {
            readURL(this, '#imgPre');
        });
    </script>
 


 <script  type="text/javascript">
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
  
        // CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor',{

            filebrowserImageUploadUrl : "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
            filebrowserBrowseUrl : "{{ url('file-browser?_token='.csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });
        CKEDITOR.replace('ckeditor1', {

            filebrowserImageUploadUrl : "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
            filebrowserBrowseUrl : "{{ url('file-browser?_token='.csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });

        

     
    
</script>



$(document).ready(function(e){
	show_cart();
	shopping();
    cart();
    load_comment();
    // total();
	function show_cart(){
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'../show-cart',
            method:'POST',
            data:{_token:_token},
            success:function(data){
                $('#xemnhanh').modal('hide');
                $('#show').html(data);
            }
        });
    }
    function shopping(){
    	var _token = $('input[name="_token"]').val();
    	$.ajax({
    		url:'../shop',
    		method:'POST',
    		data:{_token:_token},
    		success:function(data){
    			$('.shopping').html(data);
    		}
    	});
    }
    function cart(){
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'../giohang',
            method:'POST',
            data:{_token:_token},
            success:function(data){
                $('#visible').html(data);
            }
        });
    }


    $(document).on('click','.add-to-cart-quickview',function(){
                var id = $(this).data('id_product');
                var size=$('input[name=size]:checked').val();
                var hot=$('input[name=hot]:checked').val();
                var soluong=$('.cart_product_sl').val();
                var _token = $('input[name="_token"]').val();
                var sl=$('input[name="sl"]').val();
                if(parseInt(soluong) > parseInt(sl)){
                    toastr.warning("số lượng bạn đặt lớn hơn số sản phẩm mà chúng tôi có, làm ơn đặt số lượng nhỏ hơn" + " "+ sl);
                }else{
                if($("input:radio[name='size']").is(":checked")) {
                    $.ajax({
                        url: '../cart',
                        method: 'POST',
                        data:{id:id,_token:_token,size:size,hot:hot,soluong:soluong},
                            success:function(data){
                            	toastr.success('Đã thêm sản phẩm vào giỏ hàng');
                                show_cart();
                                cart();
                        }
                        

                    });
                }else{
                     toastr.warning('bạn cần phải chọn đầy đủ thông tin trước khi mua hàng');
                }
            }
            });


    // $(".remove-from-cart").click(function (e) {
    //         e.preventDefault();

    //         var ele = $(this);
    //         var _token = $('input[name="_token"]').val();
    //         // if(confirm("bạn có chắc muốn xóa không")) {
    //             $.ajax({
    //                 url: '../remove-from-cart',
    //                 method: "DELETE",
    //                 data: {_token:_token, id: ele.attr("data-id")},
    //                 success: function (response) {
    //                     window.location.reload();

    //                     // alert('đã xóa sản phẩm ra khỏi giỏ hàng');
    //                 }
    //             });
    //         // }
    //     });
    $(document).on('click','.remove-from-cart',function(e){
	 e.preventDefault();

            var ele = $(this);
            var _token = $('input[name="_token"]').val();
            // if(confirm("bạn có chắc muốn xóa không")) {
                $.ajax({
                    url: '../remove-from-cart',
                    method: "DELETE",
                    data: {_token:_token, id: ele.attr("data-id")},
                    success: function (data) {
                    	toastr.success('đã xóa sản phẩm khỏi giỏ hàng');
                        show_cart();
                        shopping();
                        cart();


                        // alert('đã xóa sản phẩm ra khỏi giỏ hàng');
                    }
                });
            // }

     });

    $(document).on('click','.update-cart',function (e) {
           e.preventDefault();

           var ele = $(this);
           var _token = $('input[name="_token"]').val();
           var quantity=ele.parents('tr').find('.quantity').val();
           if(quantity > 0){
            $.ajax({
               url: '../update-cart',
               method: "patch",
               data: {_token:_token, id: ele.attr("data-id"), quantity: ele.parents('tr').find('.quantity').val()},
               success: function (data) {
                 shopping();
                 show_cart();
                 cart();
             
               }
            });
           }else{
            toastr.warning('số lượng không được nhỏ hơn 0');
           }

            
        });


    

       $('#inputName').on('change',function(event){
            var _ip=$('#inputName').val();
            if(_ip =='0'){
                $('.pay').show();
                $('.order').hide();
            }else if(_ip=='1'){
                $('.pay').hide();
                $('.order').show();
            }
         });


        $('.run1').slick({
            lazyLoad: 'progressive', infinite: true, accessibility:false, vertical:false, slidesToShow: 5,  
            slidesToScroll: 1, autoplay:true,  autoplaySpeed:500, speed:1000, arrows:true, 
            centerMode:false,  dots:false,  draggable:true, variableWidth:true,
        });

    
    
        $('.run2').slick({
            lazyLoad: 'progressive', infinite: true, accessibility:false, vertical:false, slidesToShow: 6,  
            slidesToScroll: 1, autoplay:true,  autoplaySpeed:500, speed:1000, arrows:true, 
            centerMode:false,  dots:false,  draggable:true, variableWidth:true,
        });

   
    
        $('.rundt').slick({
            lazyLoad: 'progressive', infinite: true, accessibility:false, vertical:false, slidesToShow: 1,  
            slidesToScroll: 1, autoplay:true,  autoplaySpeed:3000, speed:1000, arrows:true, 
            centerMode:false,  dots:false,  draggable:true, variableWidth:true,
        });






       
            
            function load_comment(){
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'../cli/load-comment',
                    method:"POST",
                    data:{product_id:product_id,_token:_token},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
                });
             }
             $('.send-comment').click(function(){
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment = $('.comment_content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'../cli/send-comment',
                    method:"POST",
                    data:{product_id:product_id,comment_name:comment_name,comment:comment,_token:_token},
                    success:function(data){
                        
                        $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                        load_comment();
                        $('#notify_comment').fadeOut(10000);
                        $('.comment_name').val('');
                        $('.comment').val('');
                    }
                });
             });





             $('.xemnhanh').click(function(){
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:'../quickview',
            method:"POST",
            dataType:"JSON",
            data:{product_id:product_id, _token:_token},
              success:function(data){
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('.product_quickview_price').html(data.product_price);
                $('.product_nho').html(data.product_nho);
                $('.product_vua').html(data.product_vua);
                $('.product_lon').html(data.product_lon);
                $('#product_quickview_image').html(data.product_image);
                $('#product_quickview_gallery').html(data.galary);
                $('#product_quickview_desc').html(data.product_desc);
                $('#product_quickview_content').html(data.product_content);
                $('#product_quickview_value').html(data.product_quickview_value);
                $('#product_quickview_button').html(data.product_button);
                $('input[name="sl"]').val(data.product_soluong);
                $('#size').html(data.product_size);
                
              }
            });
        });
        $(document).on('click','.redirect-cart',function(){
                window.location.href = "../cli/checkout";
            });


        $('.add-to-cart').on('click',function (e){
                e.preventDefault();
              
                var id = $(this).data('id_product');
                var size=$('input[name=size]:checked').val();
                var hot=$('input[name=hot]:checked').val();
                var soluong=$('.cart_product_sl').val();
                var _token = $('input[name="_token"]').val();
                var sl=$('.cart_soluong').val();
                if(parseInt(soluong) > parseInt(sl)){
                    toastr.warning("số lượng bạn đặt lớn hơn số sản phẩm mà chúng tôi có, làm ơn đặt số lượng nhỏ hơn" + " "+ sl);
                }else{
                if($("input:radio[name='size']").is(":checked")) {
                    $.ajax({
                        url: '../cart',
                        method: 'POST',
                        data:{id:id,_token:_token,size:size,hot:hot,soluong:soluong},
                        success:function(data){
                            toastr.success('đã thêm sản phẩm vào giỏ hàng');
                            show_cart();
                            cart();
                            // $("#cart").append('tao la so 1');
                           
                           
                           
                           
                        }

                    });
              }else{
                toastr.warning('bạn cần phải chọn đầy đủ thông tin trước khi mua hàng');
              }
                }
                
            });

       



      

        


        
});




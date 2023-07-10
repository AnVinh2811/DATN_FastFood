<table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th class="text-center"></th>
                          <th>STT</th>
                          <th>Name</th>
                          <th>Hình ảnh</th>
                          <th>Loại sản phẩm</th>
                          <th>Giá</th>
                          <th>Giá khuyển mãi</th>
                          <th>Số lượng</th>
                          <th>Tình trạng</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody id="list" >
                        <?php $i=0; ?>
                        @foreach($pro as $key => $p)
                        <?php $i++ ?>
                        <tr>
                          <td class="text-center"><input type="checkbox" value="{{$p->product_id}}" class="check"></td>
                          <td>{{$i}}</td>
                          <td>{{$p->product_name}}</td>
                          <td><img src="{!! asset('images/'.$p->product_image)!!}" alt="" width="100px" height="100px" ></td>
                          <td>{{$p->category->category_name}}</td>
                          <td>{{$p->product_price}}</td>
                          <td>{{$p->gia_km}}</td>
                          <td>{{$p->soluong}}</td>
                          <td>
                            @if($p->product_status==1)
                              <a href="{{route('huykichhoat',$p->product_id)}}" title="Hiển thị"><i class="glyphicon glyphicon-eye-open success"></i></a>
                            
                            @elseif($p->product_status==0)
                              <a href="{{route('kichhoat',$p->product_id)}}" title="Ẩn"><i class="glyphicon glyphicon-eye-close"></i></a>
                            
                            @endif
                          </td>
                          <td>
                              <a href="{{route('add_img',$p->product_id)}}" title="Thêm thư viện"><i class="glyphicon glyphicon-th"></i></a>
                              <a href="{{route('product_edit',$p->product_id)}}" title="Sửa sản phẩm"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{route('delete_pro',$p->product_id)}}" title="xóa sản phẩm"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                     
                    </table>
                     {!! $pro->links('pagination::bootstrap-4') !!}

                <!--   <div class="Pagination d-flex justify-content-center"> -->
                      
                <!--   </div> -->


@section('paginate')
<script>
    $(document).on('click','.pagination a',function(event){
        event.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        fetch_data(page);
    });
    function fetch_data(page){
        $.ajax({
            url:"{{url('/pagination/fetch_data?page=')}}"+page,
            success:function(data){
                $('#list-product').html(data);
            }
        });
    }
</script>

@endsection

@extends('client/layout_cli')
@section('content')
<div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class=  "w3_short">
                    <li>
                        <a href="{{route('cli_index')}}">Home</a>
                        <i>|</i>
                    </li>
                   <li><a href="{{url('/danh-muc-bai-viet/'.$slug)}}">{{$cate_post}}</a><i>|</i></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2 trang">
            
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                {{$meta_title}}
               </h3>
            <div class="row">
                <!-- product left -->
                <div class="col-lg-12">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="taideptrai">
                            <div class="baophi">
                                @foreach($post_by_id as $key => $p)
                                <div class="">
                                    <div class="">
                                           {!!$p->post_content!!}
                                    </div>
                                </div>
                                @endforeach
                            </div>  
                        </div>
                           
                    </div>
                </div>
               
            </div>
            <div class="post-relate">
                <h2 class="text-center" style="margin-top:40px;color:#ec1c1cb0">BÀI VIẾT LIÊN QUAN</h2>
                 <ul class="lienquan">
                    @foreach($related as $key => $post_relate)
                    <li class="baohet" ><div class="h"><img class="wi img-thumbnail" src="{!!asset('uploads/post/'.$post_relate->post_image)!!}" alt=""></div><div class="baoa"><a class="chubv" href="{{url('/bai-viet/'.$post_relate->post_slug)}}">{{$post_relate->post_title}}</a></div></li>
                    @endforeach
                 </ul>
            </div>
     </div>
 </div>




   

@stop

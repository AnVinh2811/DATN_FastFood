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
                    
                    <li class="breadcrumb-item active" aria-current="page">{{$post_name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                {{$meta_title}}
               </h3>
            <div class="row">
                <div class="agileinfo-ads-display  nen">
                    <div class="wrapper">
                        <div class="baotin">
                            <div class="baophi">
                                 @foreach($post_cate as $key => $p)
                                <div class="flex">
                                    <div class="hinh1">
                                            <a href=""><div class="scale-img">
                                            <img class='img-thumbnail' width="300px" height="200px" src="{!!asset('uploads/post/'.$p->post_image)!!}" alt="">
                                            </div></a>
                                        </div>
                                        <div class="content">
                                    <h4 class="pt-1">
                                        <a class="title_baiviet" href="">{{$p->post_title}}</a>
                                    </h4>
                                    <p ><?=htmlspecialchars_decode($p->post_desc)?></p>
                                    <a   href="{{url('/bai-viet/'.$p->post_slug)}}" class="btn btn-default btn-sm xem">Xem bài viết</a>
                                </div>
                                </div>
                                @endforeach
                            </div>
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                        
                       {!!$post_cate->links()!!}
                      
                      </ul>
                        </div>
                    </div>
                </div>








                <!-- //product left -->
                <!-- product right -->
                <div class=" mt-lg-0 mt-4 p-lg-0 wom">
                    <div class="side-bar p-sm-4 p-3 taichodien">
                        <div class="search-hotel py-2">
                            <h3 class="agileits-sear-head mb-3" >@lang('lang.ca_post')</h3>
                           
                       
                        <div class="range py-2">
                            <div class="w3l-range">
                                <ul>
                                    @foreach($cate_post1 as $ca)
                                    <li class="dau1">
                                       <a class="viet" href="{{$ca->cate_post_slug}}">{{$ca->cate_post_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                     
                    </div>
                    <!-- //product right -->
                </div>
            </div>
        </div>
    </div>
</div>



   

@stop

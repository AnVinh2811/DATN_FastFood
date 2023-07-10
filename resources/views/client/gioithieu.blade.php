@extends('client/layout_cli')
@section('content')
<title>Giới Thiệu</title>

<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{route('cli_index')}}">Home</a>
                    <i>|</i>
                </li>
                <li>@lang('lang.intro')</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact" style="background:#F2BE22; padding-bottom: 150px;">
    <br><!--<br>
    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        @lang('lang.intro')</h3> -->
    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        {{$gioithieu[0]['intro_title']}}
    </h3>
    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3">
        <div class="row wrap-1200">

            <div class="col-md-12">
                <div class="row d-flex justify-space-between">
                    <div class="col-md-6">
                        <span class="tho">
                            {!!$gioithieu[0]['intro_content']!!}</span>
                    </div>
                    <div class="col-md-6 gt">
                        <img class="img-thumbnail gioi" src="{{URL::to('uploads/intro/'.$gioithieu[0]['intro_image'])}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
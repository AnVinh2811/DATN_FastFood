@extends('client/layout_cli')
@section('content')
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{route('cli_index')}}">Home</a>
                        <i>|</i>
                    </li>
                    <li>@lang('lang.contact')</li>
                </ul>
            </div>
        </div>
    </div>
<div class="contact" style="background: #ecd7d1">
       <br><br>
<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                @lang('lang.contact')</h3>
                        <div class="row wrap-1200">
                            @foreach($contact as $key => $cont)
                            <div class="col-md-12">
                                <div class="row d-flex justify-space-between">
                                    <div class="col-md-6 lh">
                                        {!!$cont->info_contact!!}
                                    </div>
                                    <div class="col-md-6">
                                        {!!$cont->info_fanpage!!}
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="row taicho">

                            <div class="col-md-10" style="margin-left:50px;padding-bottom: 30px;">
                            
                                {!!$cont->info_map!!}
                            </div>
                        </div>
             @endforeach
 @stop
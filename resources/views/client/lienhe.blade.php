@extends('client/layout_cli')
@section('content')
<title>Liên hệ</title>
<style>
    a{
        color: #F29727;
    }
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,500);

    .snip1143 {
        font-family: 'Raleway', Arial, sans-serif;
        text-align: center;
        text-transform: uppercase;
        font-weight: 500;
    }

    .snip1143 * {
        box-sizing: border-box;
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
    }

    .snip1143 li {
        display: inline-block;
        list-style: outside none none;
        margin: 0 1.5em;
        overflow: hidden;
    }

    .snip1143 a {
        padding: 0.3em 0;
        color: black;
        position: relative;
        display: inline-block;
        letter-spacing: 1px;
        margin: 0;
        text-decoration: none;
    }

    .snip1143 a:before,
    .snip1143 a:after {
        position: absolute;
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
    }

    .snip1143 a:before {
        top: 100%;
        display: block;
        height: 3px;
        width: 100%;
        content: "";
        background-color: #c0392b;
    }

    .snip1143 a:after {
        padding: 0.3em 0;
        position: absolute;
        top: 100%;
        left: 0;
        content: attr(data-hover);
        color: #F24C3D;
        white-space: nowrap;
    }

    .snip1143 li:hover a,
    .snip1143 .current a {
        transform: translateY(-100%);
    }
</style>
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{route('cli_index')}}">Home</a>
                    <i>|</i>
                </li>
                <li>Liên hệ</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact" style="background:#F2BE22; padding-bottom: 150px;">
    <br><!--<br>
    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        @lang('lang.intro')</h4> -->
    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        Liên hệ chúng tôi
    </h3>
    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3">

        <div class="row">
            <div class="col-md-6 product-men mt-5" id="home">
                <div class="men-thumb-item text-center">
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5178266801163!2d106.69877667469706!3d10.771594989376862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1688992436459!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-md-6 product-men mt-5" id="home">
                <div class="men-thumb-item text-center" style="padding-top: 20%;">
                    <div class="col-md-12 mb-3">
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5178266801163!2d106.69877667469706!3d10.771594989376862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1688992436459!5m2!1svi!2s">
                            <h4>65 Huỳnh Thúc Kháng, Bến Nghé, quận 1, Thành phố Hồ Chí Minh</h4>
                        </a>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h4><span>Phone:</span> <a href="tel://1234567920">+84 817500095</a></h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h4><span>Email:</span> <a href="mailto:info@yoursite.com">0306201354@caothang.edu.vn</a></h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h4><span>Website:</span> <a href="http://127.0.0.1:8000/cli/index">VinaFood.com</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
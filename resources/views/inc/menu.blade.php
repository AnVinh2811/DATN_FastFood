<style>
    .navbar {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 0.5rem 1rem;
    }

    .navbar>.container,
    .navbar>.container-fluid {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .navbar-brand {
        display: inline-block;
        padding-top: 0.3125rem;
        padding-bottom: 0.3125rem;
        margin-right: 1rem;
        font-size: 1.25rem;
        line-height: inherit;
        white-space: nowrap;
    }

    .navbar-brand:hover,
    .navbar-brand:focus {
        text-decoration: none;
    }

    .navbar-nav {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .navbar-nav .nav-link {
        padding-right: 0;
        padding-left: 0;
    }

    .navbar-nav .dropdown-menu {
        position: static;
        float: none;
    }

    .navbar-text {
        display: inline-block;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .navbar-collapse {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .navbar-toggler {
        padding: 0.25rem 0.75rem;
        font-size: 1.25rem;
        line-height: 1;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }

    .navbar-toggler:hover,
    .navbar-toggler:focus {
        text-decoration: none;
    }

    .navbar-toggler:not(:disabled):not(.disabled) {
        cursor: pointer;
    }

    .navbar-toggler-icon {
        display: inline-block;
        width: 1.5em;
        height: 1.5em;
        vertical-align: middle;
        content: "";
        background: no-repeat center center;
        background-size: 100% 100%;
    }

    @media (max-width: 575.98px) {

        .navbar-expand-sm>.container,
        .navbar-expand-sm>.container-fluid {
            padding-right: 0;
            padding-left: 0;
        }
    }

    @media (min-width: 576px) {
        .navbar-expand-sm {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
        }

        .navbar-expand-sm .navbar-nav {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
        }

        .navbar-expand-sm .navbar-nav .dropdown-menu {
            position: absolute;
        }

        .navbar-expand-sm .navbar-nav .nav-link {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }

        .navbar-expand-sm>.container,
        .navbar-expand-sm>.container-fluid {
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
        }

        .navbar-expand-sm .navbar-collapse {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-preferred-size: auto;
            flex-basis: auto;
        }

        .navbar-expand-sm .navbar-toggler {
            display: none;
        }
    }

    @media (max-width: 767.98px) {

        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid {
            padding-right: 0;
            padding-left: 0;
        }
    }

    @media (min-width: 768px) {
        .navbar-expand-md {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
        }

        .navbar-expand-md .navbar-nav {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
        }

        .navbar-expand-md .navbar-nav .dropdown-menu {
            position: absolute;
        }

        .navbar-expand-md .navbar-nav .nav-link {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }

        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid {
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
        }

        .navbar-expand-md .navbar-collapse {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-preferred-size: auto;
            flex-basis: auto;
        }

        .navbar-expand-md .navbar-toggler {
            display: none;
        }
    }

    @media (max-width: 991.98px) {

        .navbar-expand-lg>.container,
        .navbar-expand-lg>.container-fluid {
            padding-right: 0;
            padding-left: 0;
        }
    }

    @media (min-width: 992px) {
        .navbar-expand-lg {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
        }

        .navbar-expand-lg .navbar-nav {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
        }

        .navbar-expand-lg .navbar-nav .dropdown-menu {
            position: absolute;
        }

        .navbar-expand-lg .navbar-nav .nav-link {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }

        .navbar-expand-lg>.container,
        .navbar-expand-lg>.container-fluid {
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
        }

        .navbar-expand-lg .navbar-collapse {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-preferred-size: auto;
            flex-basis: auto;
        }

        .navbar-expand-lg .navbar-toggler {
            display: none;
        }
    }

    @media (max-width: 1199.98px) {

        .navbar-expand-xl>.container,
        .navbar-expand-xl>.container-fluid {
            padding-right: 0;
            padding-left: 0;
        }
    }

    @media (min-width: 1400px) {
        .navbar-expand-xl {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
        }

        .navbar-expand-xl .navbar-nav {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
        }

        .navbar-expand-xl .navbar-nav .dropdown-menu {
            position: absolute;
        }

        .navbar-expand-xl .navbar-nav .nav-link {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }

        .navbar-expand-xl>.container,
        .navbar-expand-xl>.container-fluid {
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
        }

        .navbar-expand-xl .navbar-collapse {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-preferred-size: auto;
            flex-basis: auto;
        }

        .navbar-expand-xl .navbar-toggler {
            display: none;
        }
    }

    .navbar-expand {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
    }

    .navbar-expand>.container,
    .navbar-expand>.container-fluid {
        padding-right: 0;
        padding-left: 0;
    }

    .navbar-expand .navbar-nav {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
    }

    .navbar-expand .navbar-nav .dropdown-menu {
        position: absolute;
    }

    .navbar-expand .navbar-nav .nav-link {
        padding-right: 0.5rem;
        padding-left: 0.5rem;
    }

    .navbar-expand>.container,
    .navbar-expand>.container-fluid {
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
    }

    .navbar-expand .navbar-collapse {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        -ms-flex-preferred-size: auto;
        flex-basis: auto;
    }

    .navbar-expand .navbar-toggler {
        display: none;
    }

    .navbar-light .navbar-brand {
        color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-brand:hover,
    .navbar-light .navbar-brand:focus {
        color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-nav .nav-link {
        color: rgba(0, 0, 0, 0.5);
    }

    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus {
        color: rgba(0, 0, 0, 0.7);
    }

    .navbar-light .navbar-nav .nav-link.disabled {
        color: rgba(0, 0, 0, 0.3);
    }

    .navbar-light .navbar-nav .show>.nav-link,
    .navbar-light .navbar-nav .active>.nav-link,
    .navbar-light .navbar-nav .nav-link.show,
    .navbar-light .navbar-nav .nav-link.active {
        color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-toggler {
        color: rgba(0, 0, 0, 0.5);
        border-color: rgba(0, 0, 0, 0.1);
    }

    .navbar-light .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/4000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    .navbar-light .navbar-text {
        color: rgba(0, 0, 0, 0.5);
    }

    .navbar-light .navbar-text a {
        color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-text a:hover,
    .navbar-light .navbar-text a:focus {
        color: rgba(0, 0, 0, 0.9);
    }

    .navbar-dark .navbar-brand {
        color: #fff;
    }

    .navbar-dark .navbar-brand:hover,
    .navbar-dark .navbar-brand:focus {
        color: #fff;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.5);
    }

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link:focus {
        color: rgba(255, 255, 255, 0.75);
    }

    .navbar-dark .navbar-nav .nav-link.disabled {
        color: rgba(255, 255, 255, 0.25);
    }

    .navbar-dark .navbar-nav .show>.nav-link,
    .navbar-dark .navbar-nav .active>.nav-link,
    .navbar-dark .navbar-nav .nav-link.show,
    .navbar-dark .navbar-nav .nav-link.active {
        color: #fff;
    }

    .navbar-dark .navbar-toggler {
        color: rgba(255, 255, 255, 0.5);
        border-color: rgba(255, 255, 255, 0.1);
    }

    .navbar-dark .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/4000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    .navbar-dark .navbar-text {
        color: rgba(255, 255, 255, 0.5);
    }

    .navbar-dark .navbar-text a {
        color: #fff;
    }

    .navbar-dark .navbar-text a:hover,
    .navbar-dark .navbar-text a:focus {
        color: #fff;
    }

    .ftco-navbar-light {
        background: transparent !important;
        z-index: 3;
    }

    @media (max-width: 991.98px) {
        .ftco-navbar-light {
            background: #000 !important;
            position: relative;
        }
    }

    .ftco-navbar-light .navbar-brand {
        color: #fff;
        font-family: "Josefin Sans", Arial, sans-serif;
    }

    @media (min-width: 768px) {
        .ftco-navbar-light .navbar-brand {
            color: #fff;
        }
    }

    .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
        font-size: 14px;
        padding-top: .9rem;
        padding-bottom: .9rem;
        padding-left: 0;
        padding-right: 0;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 400;
        opacity: 1 !important;
    }

    @media (min-width: 768px) {
        .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            padding-left: 20px;
            padding-right: 20px;
            color: #121618;
        }
    }

    .ftco-navbar-light .navbar-nav>.nav-item>.nav-link:hover {
        color: #fac564;
    }

    .ftco-navbar-light .navbar-nav>.nav-item .dropdown-menu {
        border: none;
        background: #fff;
        -webkit-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
        -moz-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
        box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
    }

    .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator {
        position: relative;
        margin-left: 20px;
        padding-left: 20px;
    }

    @media (max-width: 991.98px) {
        .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator {
            padding-left: 0;
            margin-left: 0;
        }
    }

    .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator:before {
        position: absolute;
        content: "";
        top: 10px;
        bottom: 10px;
        left: 0;
        width: 2px;
        background: rgba(255, 255, 255, 0.05);
    }

    @media (max-width: 991.98px) {
        .ftco-navbar-light .navbar-nav>.nav-item.ftco-seperator:before {
            display: none;
        }
    }

    @media (max-width: 767.98px) {
        .ftco-navbar-light .navbar-nav>.nav-item.cta {
            margin-bottom: 20px;
        }
    }

    .ftco-navbar-light .navbar-nav>.nav-item.cta>a {
        color: #fff;
        border: 1px solid #fac564;
        background: #fac564;
        padding-top: .5rem;
        padding-bottom: .5rem;
        padding-left: 20px;
        padding-right: 20px;
        margin-top: 4px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        -ms-border-radius: 30px;
        border-radius: 30px;
    }

    .ftco-navbar-light .navbar-nav>.nav-item.cta>a span {
        display: inline-block;
        color: #fff;
    }

    .ftco-navbar-light .navbar-nav>.nav-item.cta>a:hover {
        background: #fac564;
        border: 1px solid #fac564;
    }

    .ftco-navbar-light .navbar-nav>.nav-item.cta.cta-colored span {
        border-color: #fac564;
    }

    .ftco-navbar-light .navbar-nav>.nav-item.active>a {
        color: #fac564;
    }

    .ftco-navbar-light .navbar-toggler {
        border: none;
        color: rgba(255, 255, 255, 0.8) !important;
        cursor: pointer;
        padding-right: 0;
        text-transform: uppercase;
        font-size: 16px;
        letter-spacing: .1em;
    }

    .ftco-navbar-light.scrolled {
        position: fixed;
        right: 0;
        left: 0;
        top: 0;
        margin-top: -130px;
        background: transparent !important;
        -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    }

    .ftco-navbar-light.scrolled .nav-item>.nav-link {
        color: #fff !important;
    }

    .ftco-navbar-light.scrolled .nav-item.active>a {
        color: #fac564 !important;
    }

    .ftco-navbar-light.scrolled .nav-item.cta>a {
        color: #fff !important;
        background: #fac564;
        border: none !important;
        padding-top: 0.5rem !important;
        padding-bottom: .5rem !important;
        padding-left: 20px;
        padding-right: 20px;
        margin-top: 6px !important;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        -ms-border-radius: 30px;
        border-radius: 30px;
    }

    .ftco-navbar-light.scrolled .nav-item.cta>a span {
        display: inline-block;
        color: #fff !important;
    }

    .ftco-navbar-light.scrolled .nav-item.cta.cta-colored span {
        border-color: #fac564;
    }

    @media (max-width: 991.98px) {
        .ftco-navbar-light.scrolled .navbar-nav {
            background: none;
            border-radius: 0px;
            padding-left: 0rem !important;
            padding-right: 0rem !important;
        }
    }

    @media (max-width: 767.98px) {
        .ftco-navbar-light.scrolled .navbar-nav {
            background: none;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    }

    .ftco-navbar-light.scrolled .navbar-toggler {
        border: none;
        color: rgba(255, 255, 255, 0.8) !important;
        border-color: rgba(0, 0, 0, 0.5) !important;
        cursor: pointer;
        padding-right: 0;
        text-transform: uppercase;
        font-size: 16px;
        letter-spacing: .1em;
    }

    .ftco-navbar-light.scrolled .nav-link {
        padding-top: 0.9rem !important;
        padding-bottom: 0.9rem !important;
        color: #000 !important;
    }

    .ftco-navbar-light.scrolled .nav-link.active {
        color: #fac564 !important;
    }

    .ftco-navbar-light.scrolled.awake {
        margin-top: 0px;
        -webkit-transition: .3s all ease-out;
        -o-transition: .3s all ease-out;
        transition: .3s all ease-out;
    }

    .ftco-navbar-light.scrolled.sleep {
        -webkit-transition: .3s all ease-out;
        -o-transition: .3s all ease-out;
        transition: .3s all ease-out;
    }

    .ftco-navbar-light.scrolled .navbar-brand {
        color: #fff;
    }

    .navbar-brand {
        font-size: 24px;
        line-height: 1;
    }

    .navbar-brand span {
        font-size: 24px;
        color: #fac564;
    }

    .navbar-brand small {
        text-transform: uppercase;
        font-size: 11px;
        display: block;
        text-align: center;
        color: #fac564;
        letter-spacing: 4px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark" style="background: #0000 !important;
    position: relative;"  id="ftco-navbar">

    <div class="container">
        <a class="navbar-brand" href="{{route('cli_index')}}">
            <img src="{!! asset('web/images/logo.png')!!}" alt="" width="400px" height="100px" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" 
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" style="color: #000;">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item"><a href="{{route('list_pro',['id'=>$cate->first()])}}" class="nav-link" style="font-size: 20px;font-weight: 400; color: #000;">Thực Đơn</a></li>
                <li class="nav-item"><a href="" class="nav-link"> </a></li>
                <li class="nav-item"><a href="{{route('khuyenmai')}}" class="nav-link" style="font-size: 20px;font-weight: 400;color: #000;">Khuyến Mãi</a></li>
                <li class="nav-item"><a href="" class="nav-link"> </a></li>
                <li class="nav-item"><a href="{{route('gioithieu')}}" class="nav-link" style="font-size: 20px;font-weight: 400;color: #000;">Giới Thiệu</a></li>
                <li class="nav-item"><a href="" class="nav-link"> </a></li>
                <li class="nav-item"><a href="{{route('lienhe')}}" class="nav-link" style="font-size: 20px;font-weight: 400;color: #000;">Liên Hệ</a></li>
                <li class="nav-item"><a href="" class="nav-link"> </a></li>
                <?php
                $cus_id = Session::get('customer_id');
                if (isset($cus_id)) { ?>
                    <li class="nav-item"><a href="{{route('profile')}}" class="nav-link"><span class="fas fa-user" style="font-size: 20px;font-weight: 400;padding-top: 4px;color: #000;"></span></a></li>
                <?php } else { ?>
                    <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal"><span class="fas fa-user" style="font-size: 20px;font-weight: 400;padding-top: 4px;color: #000;"></span></a></li>
                <?php } ?>
            </ul>
        </div>
        
    </div>
</nav>
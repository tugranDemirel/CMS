<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{\App\Helper\mHelper::getLanguageCode()}}"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="{{\App\Helper\mHelper::getLanguageCode()}}"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="{{\App\Helper\mHelper::getLanguageCode()}}"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="{{\App\Helper\mHelper::getLanguageCode()}}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    @yield('seo')
    <link rel="canonical" href="{{ url()->current() }}">
    @foreach( \App\Language::where('code', '!=', 'tr') as  $k => $v)
        <link rel="alternate" href="http://127.0.0.1:8000/{{ $v['code'] }}" hreflang="{{$v['code']}}">
    @endforeach

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/img/favicon.png')}}">

    <!-- Font Awesome Icons CSS -->
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
    <!-- Themify Icons CSS -->
    <link rel="stylesheet" href="{{asset('front/css/themify-icons.css')}}">
    <!-- Elegant Font Icons CSS -->
    <link rel="stylesheet" href="{{asset('front/css/elegant-font-icons.css')}}">
    <!-- Elegant Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('front/css/elegant-line-icons.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{asset('front/css/venobox/venobox.css')}}">
    <!-- OWL-Carousel CSS -->
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="{{asset('front/css/slicknav.min.css')}}">
    <!-- Css Animation CSS -->
    <link rel="stylesheet" href="{{asset('front/css/css-animation.min.css')}}">
    <!-- Nivo Slider CSS -->
    <link rel="stylesheet" href="{{asset('front/css/nivo-slider.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">

    <script src="{{asset('front/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="site-preloader-wrap">
    <div class="spinner"></div>
</div><!-- Preloader -->

<header id="header" class="header-section">
    <div class="top-header">
        <div class="container">
            <div class="top-content-wrap row">
                <div class="col-md-8">
                    <ul class="left-info">
                        <li><a href="#"><i class="ti-email"></i>Info@YourDomain.com</a></li>
                        <li><a href="#"><i class="ti-mobile"></i>+(333) 052 39876</a></li>
                        <li>Have any question?</li>
                    </ul>
                </div>
                <div class="col-md-4 d-none d-md-block">
                    <ul class="right-info">
                        @foreach(\App\Language::all() as $k=>$v)
                            <li><a href="{{route('front.lang', ['lang'=>$v['code']])}}">{{ strtoupper($v['code']) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="bottom-content-wrap row">
                <div class="col-md-3">
                    <div class="site-branding">
                        <a href="/"><img src="{{asset('front/img/logo.png')}}" alt="Brand"></a>
                    </div>
                </div>
                <div class="col-md-9 d-none d-md-block text-right">
                    <ul id="mainmenu" class="nav navbar-nav nav-menu">
                        <li class="active"> <a href="/">@lang('general.home')</a></li>
                        <li><a href="#">@lang('general.pages')</a>
                            <ul>
                                @foreach(\App\Page::where('isShow', ACTIVE)->orderBy('orderNumber', 'asc')->get() as $k => $v)
                                <li><a href="{{ route('front.page.index', ['slug'=>\App\LanguageContent::getSlug(PAGE_LANGUAGE, $v['id'])]) }}">{{\App\LanguageContent::getName(PAGE_LANGUAGE, $v['id']) }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#">@lang('general.services')</a>
                            <ul>
                                @foreach(\App\Services::orderBy('orderNumber', 'asc')->get() as $k => $v)
                                    <li><a href="{{ route('front.service.index', ['slug' => \App\LanguageContent::getSlug(SERVICE_LANGUAGE, $v['id'])]) }}">{{ \App\LanguageContent::getName(SERVICE_LANGUAGE, $v['id']) }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('front.blog.index') }}">@lang('general.blog')</a></li>
                        <li> <a href="{{ route('front.contact.index') }}">@lang('general.contact')</a></li>
                    </ul>
                    <a href="#online_offer" class="default-btn">@lang('general.online_offer')</a>
                </div>
            </div>
        </div>
    </div>
</header><!-- /Header Section -->

<div class="header-height"></div>
@yield('content')

<section class="widget-section padding">
    <div class="container">
        <div class="widget-wrap row">
            <div class="col-lg-3 col-md-6 col-sm-6 sm-padding">
                <div class="widget-content">
                    <img src="{{asset('front/img/logo-light.png')}}" alt="logo">
                    <p>We are Education, create your passion and inspiration. And hope success will come for your dream.</p>
                    <ul class="social-icon">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 sm-padding">
                <div class="widget-content">
                    <h3>@lang('general.pages')</h3>
                    <ul class="widget-link">
                        @foreach(\App\Page::where('isShow', ACTIVE)->orderBy('orderNumber', 'asc')->get() as $k => $v)
                            <li><a href="{{ route('front.page.index', ['slug'=>\App\LanguageContent::getSlug(PAGE_LANGUAGE, $v['id'])]) }}">{{\App\LanguageContent::getName(PAGE_LANGUAGE, $v['id']) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 sm-padding">
                <div class="widget-content">
                    <h3>@lang('general.services')</h3>
                    <ul class="widget-link">
                        @foreach(\App\Services::where('isHome', ACTIVE)->orderBy('orderNumber', 'asc')->get() as $k => $v)
                            <li><a href="{{ route('front.service.index', ['slug'=>\App\LanguageContent::getSlug(SERVICE_LANGUAGE, $v['id'])]) }}">{{\App\LanguageContent::getName(SERVICE_LANGUAGE, $v['id']) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 sm-padding">
                <div class="widget-content">
                    <h3>@lang('general.recent_blog')</h3>
                    <ul class="widget-link">
                        <li><a href="#">Wordpress Development</a></li>
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">Basic Photoshop</a></li>
                        <li><a href="#">Mastaring Php</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 sm-padding">
                <div class="widget-content">
                    <h3>@lang('general.newsletter')</h3>
                    <div class="subscribe-wrap">
                        <form action="#" class="subscribe-form">
                            <input type="email" name="email" id="subs-email" class="form-input" placeholder="@lang('general.your_email')">
                            <button type="submit" class="submit"><i class="ti-email"></i></button>
                            <div class="clearfix"></div>
                            <div id="subscribe-result">
                                <p class="subscription-success"></p>
                                <p class="subscription-error"></p>
                            </div>
                        </form>
                    </div><!-- /.subscribe_wrap -->
                </div>
            </div>
        </div>
    </div>
</section><!-- ./Widget Section -->

<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 sm-padding">
                <div class="copyright">&copy; 2018 Venox Powered by AlexaTheme</div>
            </div>
            <div class="col-md-6 sm-padding">
                <ul class="footer-social">
                    <li><a href="#">&copy; {{ date('Y') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!-- /Footer Section -->

<a data-scroll href="#header" id="scroll-to-top"><i class="arrow_up"></i></a>

<!-- jQuery Lib -->
<script src="{{ asset('front/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('front/js/vendor/bootstrap.min.js') }}"></script>
<!-- Tether JS -->
<script src="{{asset('front/js/vendor/tether.min.js')}}"></script>
<!-- Imagesloaded JS -->
<script src="{{asset('front/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
<!-- OWL-Carousel JS -->
<script src="{{ asset('front/js/vendor/owl.carousel.min.js') }}"></script>
<!-- isotope JS -->
<script src="{{ asset('front/js/vendor/jquery.isotope.v3.0.2.js') }}"></script>
<!-- Smooth Scroll JS -->
<script src="{{ asset('front/js/vendor/smooth-scroll.min.js') }}"></script>
<!-- venobox JS -->
<script src="{{ asset('front/js/vendor/venobox.min.js') }}"></script>
<!-- ajaxchimp JS -->
<script src="{{ asset('front/js/vendor/jquery.ajaxchimp.min.js') }}"></script>
<!-- Counterup JS -->
<script src="{{ asset('front/js/vendor/jquery.counterup.min.js') }}"></script>
<!-- waypoints js -->
<script src="{{ asset('front/js/vendor/jquery.waypoints.v2.0.3.min.js') }}"></script>
<!-- Slick Nav JS -->
<script src="{{ asset('front/js/vendor/jquery.slicknav.min.js') }}"></script>
<!-- Nivo Slider JS -->
<script src="{{ asset('front/js/vendor/jquery.nivo.slider.pack.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('front/js/vendor/wow.min.js') }}"></script>
<!-- Contact JS -->
<script src="{{ asset('front/js/contact.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('front/js/main.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('swal'))
    <script>
        Swal({{ session('swal') }});

    </script>
@endif
@yield('js')
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $page_title }}</title>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-3224360-6']);
        _gaq.push(['_trackPageview']);
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://www.fortressminers.com",
            "logo": "https://www.fortressminers.com/images/logo/favicon.png"
        }
    </script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="{{ env('SITE_NAME') }}" />
    <meta name="keywords" content="{{ env('SITE_NAME') }}" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cryptocoins-icons@2.9.0/webfont/cryptocoins.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cryptocoins-icons@2.9.0/webfont/cryptocoins-colors.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/lobibox/css/lobibox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nice-select.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dropify.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}" />
</head>
<body>
    <!-- preloader Start -->
    <!-- preloader Start -->
    <!--<div id="preloader" style="background: black" style="display: none">-->
    <!--    <div id="status">-->
    <!--        <img class="rounded-circlel" src="images/hedge_logo_big.png" style="width: 200px; height: 200px" id="preloader_image" alt="loader">-->
    <!--    </div>-->
    <!--</div>-->
   <!--  <div class="cursor"></div> -->
    <!-- Top Scroll Start -->
    <a href="javascript:void(0)" id="return-to-top"> <i class="fas fa-angle-double-up"></i></a>
  <!--  Top Scroll End -->
    <!-- cp navi wrapper Start -->
    @include('visitor.index.layouts.mobile-nav')
    <div class="container">
        <center>
            <div id="google_translate_element"></div>
            <script type="text/javascript">
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                }
            </script>

            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </center>
    </div>
    <div class="cp_navi_main_wrapper inner_header_wrapper dashboard_header_middle float_left">
        <div class="container-fluid  d-flex justify-content-between">
              <div class="cp_logo_wrapper">
                <a href="/">
                     <img src="{{ asset('images/logo/fortress.png?ref=1') }}" alt="{{ env('SITE_NAME') }}" style="width: 200px;height: 150px;padding: 0;margin: 0;">
                    <!-- <h4 class="text-white" style="font-weight: 600">{{ env('SITE_NAME_SHORT') }}</h4> -->
                </a>
            </div>
            <!-- mobile menu area start -->
            <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="cd-dropdown-wrapper">
                                <a class="house_toggle inner_toggle" href="#0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                        <g>
                                            <g>
                                                <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#004165" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <!-- .cd-dropdown -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .cd-dropdown-wrapper -->
            </header>
            <div class="cp_navigation_wrapper d-none d-md-flex justify-content-end">
                <div class="top_header_right_wrapper d-flex" style="width: max-content !important">
                    <div class="header_btn d-flex align-items-center">
                        <ul>
                            <li>
                                <a href="/register"> register </a> </li>
                            <li>
                                <a href="/login"> login </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
                    <ul class="main_nav_ul">
                        <li>

                        </li>
                        <li><a href="/about-us" class="gc_main_navigation">about us</a></li>
                        <li><a href="/how-it-works" class="gc_main_navigation">how it works</a></li>
                    </ul>
                </div>
                <!-- mainmenu end -->
            </div>
        </div>
    </div>

    <!-- navi wrapper End -->
    <!-- inner header wrapper start -->
    <div class="page_title_section dashboard_title d-lg-none" style="background:#03151d">

        <div class="page_header">
            <div class="container">
                <div class="row small">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                       <a href="/login">
                        <button class="btn btn-sm btn-outline-warning py-2 px-3 px-md-5 mx-2">
                           LOGIN
                       </button>
                       </a>
                       <a href="/register">
                        <button class="btn btn-sm btn-light py-2 px-3 px-md-5 mx-2">
                            REGISTER
                        </button>
                       </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navi wrapper End -->
    <!-- slider wrapper start-->

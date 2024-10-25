<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/lobibox/css/lobibox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/meanmenu.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/boxicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/fonts/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/odometer.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/nice-select.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/magnific-popup.min.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('visitors/assets/css/responsive.css') }}">

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleria@1.0.2/css/jquery.rippleria.min.css">
	<title>Aionprimecorporation </title>
	<link rel="icon" type="image/png" href="{{ asset('visitors/assets/img/favicon.png') }}">
</head>
<body>
	<div class="loader">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="spinner">
					<div class="double-bounce1"></div>
					<div class="double-bounce2"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="left">
						<ul>
							<!--<li> -->
       <!--                         <i class='bx bx-location-plus'></i>-->
       <!--                         <a href="#">-->
       <!--                             504 White St . Dawsonville, New York-->
       <!--                         </a>-->
       <!--                     </li>-->
							<li>
                                <i class='bx bx-mail-send'></i>
                                <a href="mailto:support@Aionprimecorporation.com">
                                    <span>support@Aionprimecorporation.com</span>
                                </a>
                            </li>
                            <!--<a href="http://free-website-translation.com/" id="ftwtranslation_button" hreflang="en" title="" style="border:0;"><img src="http://free-website-translation.com/img/fwt_button_en.gif" id="ftwtranslation_image" alt="Free Website Translator" style="border:0;"/></a> <script type="text/javascript" src="http://free-website-translation.com/scripts/fwt.js" /></script>-->
                            <div id="ytWidget"></div><script src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=en&widgetTheme=light&autoMode=true" type="text/javascript"></script>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="navbar-area sticky-top">
		<div class="mobile-nav">
			<a href="/" class="logo">
				<!--<img src="{{ asset('images/FOCAL8.png') }}" style="width: 100px; height: 100px" alt="Logo">-->
				<h4>{{ env('SITE_NAME') }}</h4>
			</a>
		</div>
		@include('visitor.focal.layouts.mobile-nav')
	</div>
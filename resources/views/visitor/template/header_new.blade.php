<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="loader-wrap" style="display: none">
        <div class="preloader" style="display: none"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <!-- Main Header -->
    <header class="main-header header-style-one">
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
				<div class="inner">
                    <div class="top-left">
                        <div class="text"><span>Too Little!</span> Receiving < $5 / Day Investing? <a href="/register">Start Today</a> </div>
                    </div>
                    <div class="top-right">
                        <ul class="contact-info">
                            <li><i class="flaticon-clock"></i>Office Hrs: Today 9.00am to 6.00pm</li>
                            <li style="display: none"><a href="tel:{{ env("SITE_NUMBER") }}"><i class="flaticon-phone"></i>{{ env("SITE_NUMBER") }}</a></li>
                        </ul>
                        <div class="language" style="display: none">
                            <span class="flaticon-global"></span>
                            <form action="#" class="language-switcher">
                                <select class="selectpicker">
                                    <option value="1">English</option>
                                    <option value="1">French</option>
                                    <option value="1">Spanish</option>
                                    <option value="1">Bengli</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="/"><img src="assets/images/logo.png" alt=""></a></div>
                    </div>
                    <!--Nav Box-->
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="assets/images/icons/icon-bar.png" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class=""><a href="/">Home</a></li>
                                    <li class="dropdown"><a href="#">Company</a>
                                        <ul>
                                            <li class=""><a href="/about-us">About Us</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="/register">Join Us</a></li>
                                    <li class=""><a href="/login">Login</a></li>
                                    
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        
                        <div class="navbar-right-info">
                            <button type="button" class="theme-btn search-toggler"><span class="flaticon-search"></span></button>
                            <!--Sidemenu Navigation Toggler-->
                            <div class="sidemenu-nav-toggler"><img src="{{ asset('assets/images/icons/icon-bar.png') }}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="/"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a></div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="{{ asset('assets/images/icons/icon-bar.png') }}" alt=""></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                            <!-- Main Menu End-->
                            
                            <div class="navbar-right-info">
                                <button type="button" class="theme-btn search-toggler"><span class="flaticon-search"></span></button>
                                <!--Sidemenu Navigation Toggler-->
                                <div class="sidemenu-nav-toggler"><img src="{{ asset('assets/images/icons/icon-bar.png') }}" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="{{ asset('assets/images/logo.png') }}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<!--Social Links-->
				<div class="social-links">
					<ul class="clearfix">
						<li><a href="https://t.me/Aionprimecorporation"><span class="fab fa-telegram"></span></a></li>
						<li><a href="https://instagram.com/fortress_miners_company"><span class="fab fa-instagram"></span></a></li>
						<li><a href="https://youtube.com/channel/UCf--qIxoUbOAmpJmHq9RMXQ"><span class="fab fa-youtube"></span></a></li>
					</ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <!-- End Main Header -->

    <!-- Hidden Sidebar -->
    <section class="hidden-sidebar close-sidebar">
        <div class="wrapper-box">
            <div class="hidden-sidebar-close"><span class="flaticon-remove"></span></div>
            <div class="logo"><a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a></div>
            <div class="content">
                <div class="about-widget-two sidebar-widget">
                    <h3>Smart Investment Platform</h3>
                </div>
                <!-- News Widget -->
                <div class="news-widget sidebar-widget">
                    <div class="widget-title">News & Updates</div>
                    <div class="post-wrapper">
                        <div class="image"><a href="/"><img src="{{ asset('assets/images/resource/news-1.jpg') }}" alt=""></a></div>
                        <div class="category">Business Plans</div>
                        <h4><a href="#">How to Manage Business’s <br>Online Reputation</a></h4>
                    </div>
                    <div class="post-wrapper">
                        <div class="image"><a href="/"><img src="{{ asset('assets/images/resource/news-2.jpg') }}" alt=""></a></div>
                        <div class="category">Marketing Stratergy</div>
                        <h4><a href="#">Inside our Daily Routines as a <br>Good Consultant</a></h4>
                    </div>
                </div>
                <!-- Newsletter Widget -->
                <div class="newsletter-widget">
                    <div class="widget-title">Newsletter Subscription</div>
                    <form action="#">
                        <input type="email" placeholder="Enter Email Address">
                        <button class="theme-btn btn-style-one"><span class="btn-title">Subscribe Us</span></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="#">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                            <input type="submit" value="Search Now!" class="theme-btn">
                        </fieldset>
                    </div>
                </form>
                <br>
                <h3>Recent Search Keywords</h3>
                <ul class="recent-searches">
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Idea</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Growth</a></li>
                    <li><a href="#">Plan</a></li>
                </ul>
            </div>
            
        </div>
    </div>


@include('visitor.index.layouts.header')

    <style>
        /*video {*/
        /*    left: 50%;*/
        /*    position: absolute;*/
        /*    top: 50%;*/
        /*    transform: translate(-50%, -50%);*/
        /*}*/
    </style>

    <div class="slider-area float_left">
        <div class="banner_img_top">
            <img src="images/banner.png" alt="img">
        </div>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active banner-slide" style="background: linear-gradient(#0a161b, #0a161bc9), url('./images/cover4.jpg')">
                    <div class="carousel-captions caption-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                    <div class="content">

                                        <h2 data-animation="animated bounceInUp" class="text-warning">Often Have Small</h2>

                                        <h3 data-animation="animated bounceInUp">Invest Your Money  <br>
For Future</h3>

                                        <div class="slider_btn float_left">
                                            <ul>
                                                <li data-animation="animated bounceInLeft">
                                                    <a href="/register">start now</a>
                                                </li>
                                                <li data-animation="animated bounceInLeft d-none d-md-flex">
                                                    <a href="#plans">view plans</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center slider_main_img_wrapper_cont" >
                                    <div class="slider_main_img_wrapper">
                                        <img class="rounded-circle bg-white pb-1" src="images/cover.jpg" alt="slider_img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item banner-slide" style="background: linear-gradient(#0a161b, #0a161bc9), url('./images/cover2.jpg')">
                    <div class="carousel-captions caption-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                    <div class="content">

                                        <h2 data-animation="animated bounceInUp" class="text-warning">Often Have Small</h2>

                                        <h3 data-animation="animated bounceInUp">Invest Your Money  <br>
For Future</h3>

                                        <div class="slider_btn float_left">
                                            <ul>
                                                <li data-animation="animated bounceInLeft">
                                                    <a href="/register">start now</a>
                                                </li>
                                                <li data-animation="animated bounceInLeft d-none d-md-flex">
                                                    <a href="#plans">view plans</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center slider_main_img_wrapper_cont">
                                    <div class="slider_main_img_wrapper">
                                        <img class="rounded-circle bg-white pb-1" src="images/cover1.jpg" alt="slider_img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider wrapper End -->
    <!--about us wrapper start -->
    <div class="about_us_wrapper float_left">
        <div class="container">
            <div class="row" style="margin-bottom: 20px; margin-top: -70px;">
                <div class="col-12 text-light">
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                            {
                            "symbols": [
                            {
                                "proName": "FOREXCOM:SPXUSD",
                                "title": "S&P 500"
                            },
                            {
                                "proName": "FOREXCOM:NSXUSD",
                                "title": "Nasdaq 100"
                            },
                            {
                                "proName": "FX_IDC:EURUSD",
                                "title": "EUR/USD"
                            },
                            {
                                "proName": "BITSTAMP:BTCUSD",
                                "title": "BTC/USD"
                            },
                            {
                                "proName": "BITSTAMP:ETHUSD",
                                "title": "ETH/USD"
                            }
                            ],
                            "showSymbolLogo": false,
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "displayMode": "adaptive",
                            "locale": "en"
                        }
                            </script>
                        </div>
                    </div>
            </div>
            <div class="row">

                <div class="col-md-12 col-lg-6 col-sm-12 col-12">
                    <div class="about_img_wrapper">
                        <img src="images/cover12.jpg" alt="About" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-sm-12 col-12">
                    <div class="about_content_wrapper">
                        <div class="sv_heading_wraper">
                            <h4>who we are</h4>
                            <h3>Welcome to {{ env('SITE_NAME') }}</h3>

                        </div>
                        <div class="welcone_savehiyp float_left">
                            <p>Put your investing ideas into action with full range of investments. Enjoy real benefits and rewards on your accrue investing.</p>
                            <div class="welcome_save_inpvate_wrapper">
                                <ul>
                                    <li class="purple_inovate"><a href="#"><i class="flaticon-check-box"></i> We Innovate </a></li>
                                    <li class="blue_inovate"><a href="#"><i class="flaticon-check-box"></i> Licenced & Certified </a></li>
                                    <li class="green_inovate"><a href="#"><i class="flaticon-check-box"></i>Saving & Investments </a></li>
                                </ul>
                            </div>
                            <div class="about_btn float_left">
                                <ul>
                                    <li>
                                        <a href="#">get more</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about us wrapper end -->


    <!--investment plan wrapper start -->
    <div class="investment_plans float_left">
        <div class="investment_overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark">
                        <h4> our plans </h4>
                        <h3> Our Investment Plans </h3>

                    </div>
                </div>
                @foreach($plans as $plan)
                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
                    <div class="investment_box_wrapper float_left height_box">
                        <div class="investment_icon_circle green_info_circle">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="investment_border_wrapper green_border_wrapper"></div>
                        <div class="investment_content_wrapper green_content_wrapper">
                            <h1><a href="#">{{ $plan['name'] }} plan</a></h1>
                            <p>{{ round($plan['interest_rate']) }}% daily for {{ $plan['duration'] }} days
                                <br> Min deposit: ${{ round($plan['minimum_amount']) }}
                                <br> Max deposit: ${{ round($plan['maximum_amount']) }}
                                <br> Compound Available</p>
                        </div>
                        <div class="about_btn plans_btn green_plan_btn">
                            <ul>
                                <li>
                                    <a href="/register">invest</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--investment plan wrapper end -->
    <!--calculator plan wrapper start -->
    <div class="calculator_wrapper float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">
                        <h4> Market Overview </h4>
                        <h3>available crypto assets based on the market capitalization. </h3>

                    </div>
                </div>
                <div class="col-12" align="center">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container d-flex justify-content-center align-content-center">
                        <div class="tradingview-widget-container__widget"></div>
                        <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by TradingView</div> -->
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                        {
                        "width": 1000,
                        "height": 490,
                        "defaultColumn": "overview",
                        "screener_type": "crypto_mkt",
                        "displayCurrency": "USD",
                        "colorTheme": "dark",
                        "locale": "en",
                        "isTransparent": false
                    }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>
    <div class="calculator_wrapper float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">
                        <h4> Crypto  calculator </h4>
                        <!--<h3> How Much Can You Save With Plans? </h3>-->

                    </div>
                </div>

                <!--Widget-->
                <div class='col-12 d-flex justify-content-center align-items-center'>

                    <div style="width: 100%; height:auto;">
                        <div style="padding:0px; margin:0px; width: 100%;">
                            <!-- Crypto Converter ⚡ Widget --><crypto-converter-widget shadow symbol live background-color="#383a59" border-radius="0.60rem" fiat="united-states-dollar" crypto="bitcoin" amount="1" decimal-places="2"></crypto-converter-widget><script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js"></script><!-- /Crypto Converter ⚡ Widget -->
                        </div>
                    </div>
                </div>

                              <!--/Widget-->

                <div class="col-lg-4 col-md-12 col-sm-12 col-12 calc d-none">
                    <div class="calculator_portion float_left">
                        <div class="caluclator_text_wrapper">
                            <p>deposit amount : <i class="fas fa-info-circle"></i></p>
                            <p class="dollar_wrap"><i class="fa fa-dollar-sign"></i>
                                <input type="text" id="investmentAmount" />
                            </p>
                        </div>
                        <div class="caluclator_text_wrapper">
                            <p>Daily Returns : <i class="fas fa-info-circle"></i></p>
                            <p class="dollar_wrap"><i class="fa fa-dollar-sign"></i>
                                <input type="text" id="investmentAmountSIP" />
                            </p>
                        </div>

                        <div class="caluclator_text_wrapper">
                            <p>Duration : <i class="fas fa-info-circle"></i></p>
                            <select class="custom-select" id="investmentYears">
                                @foreach($plans as $plan)
                                <option value="{{ $plan->duration }}">{{ $plan->duration }} days</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="about_btn calc_btn float_left" onclick="CalCommission(); return false;">
                            <ul>
                                <li>
                                    <a href="#">calculate profit</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 calc d-none">
                    <div class="mutualfunds-calculator">
                        <div class="calculator">
                            <div class="graph-area">
                                <span class="mf-yAxis">Investment Value</span>
                                <svg width="480" height="350" id="graph" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 480 355" class="mf-chart">

                                    <defs>
                                        <pattern id="grid" x="10" y="10" width="480" height="88" patternUnits="userSpaceOnUse">
                                            <line x1="0" y1="0" x2="100%" y2="0" stroke-width="1" shape-rendering="crispEdges" stroke="#bdbdbd"></line>
                                        </pattern>
                                    </defs>
                                    <rect width="480" height="355" style="fill:#0a161b;"></rect>
                                    <g>
                                        <path d="M 5,330
            C 5,330
            300,257.5
            475,170" id="path1" fill="none" stroke="#bdbdbd" stroke-width="5px" stroke-linecap="round" class="anim-path" style="transition: stroke-dashoffset 2s ease-in-out; stroke-dasharray: 522.957, 522.957; stroke-dashoffset: 0px; display: inline;"></path>
                                        <path d="M 5,330
            C 5,330
            300,257.5
            475,20" fill="none" id="path2" stroke="#dba622" stroke-width="5px" stroke-linecap="round" class="anim-path" style="transition: stroke-dashoffset 2s ease-in-out; stroke-dasharray: 572.872, 572.872; stroke-dashoffset: 0px; display: inline;"></path>
                                    </g>
                                    <g class="mf-circles" style="">
                                        <circle cx="472" cy="22" r="8" fill="#dba622" stroke="#dba622" stroke-width="3px"></circle>
                                        <circle cx="472" cy="170" r="8" fill="#bdbdbd" stroke="#bdbdbd" stroke-width="3px"></circle>
                                    </g>
                                </svg>
                                <div class="mf-xAxis">

                                    <span class="mf-xAxis-end" id="years_selected">25 Years</span>
                                </div>
                                <div class="labels funds_label" style="display: block;">
                                    <div class="chart-label">
                                        <span class="amt" id="directFund"><i class="fa fa-rupee-sign"></i>1.98 Cr</span>
                                        <span class="sub">total returns</span>
                                    </div>
                                    <div class="chart-label label-regular">
                                        <span class="amt" id="regularFund"><i class="fa fa-rupee-sign"></i>1.64 Cr</span>
                                        <span class="sub">investment amounts</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc-amt calc_ind_1_2">
                        <p class="calc-price" id="returnAmount">Rs. 34.06 L</p>
                        <p>extra returns for you </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--calculator plan wrapper end -->
    <!-- global community wrapper start -->
    <div class="global_community_wrapper index2_global_community_wrapper  float_left">
        <div class="container">
            <div class="row">
                <div class="global_comm_wraper index2_global_comm_wrapper">
                    <h1>We Were Always Thinking Global Community</h1>
                    <p>{{ env('SITE_NAME') }} is not limited to one circle, we think globally, we are all over the world. Our assets are been distributed all over the world, through our numerous third parties.</p>
                </div>
                <div class="zero_balance_wrapper">
                    <div class="zero_commisition">
                        <h1>Zero
Commissions</h1>
                        <h4>No hidden charges*</h4>
                    </div>
                    <div class="start_invest_wrap">
                        <h1>start invest now</h1>
                        <div class="about_btn zero_btn  float_left">
                            <ul>
                                <li>
                                    <a href="#">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global community wrapper end -->

    <!-- works wrapper start -->
    <div class="works_wrapper float_left">
        <div class="work_banner_wrapper">
            <!--<img src="images/cover2.jpg" alt="img">-->
            <!--<div class="img_overlay"></div>-->
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/B_6WSIGW4DQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="howwork_banner_wrapper index2_homwork_banner_wrapper">
            <div class="vedio_link_wrapper">
                <div class="work_content_wrap">
                    <h1>How It Works</h1>
                    <ul class="work_checklist_wrapper">
                        <li>
                            <a href="#"><i class="fas fa-dollar-sign"></i>get deposit</a>
                        </li>
                        <li><a href="#"><i class="far fa-money-bill-alt"></i> utilize money</a></li>
                        <li><a href="#"><i class="fas fa-plus"></i> give interest</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <!-- works wrapper end -->
    <!--our services wrapper start -->
    <div class="our_services_wrapper float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">
                        <h4> services</h4>
                        <h3>our features</h3>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper service_box feature_box float_left">
                        <div class="investment_icon_circle parpal_color">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="investment_border_wrapper"></div>
                        <div class="investment_content_wrapper">
                            <h1><a href="#">We're Certified</a></h1>
                            <p>Our Company is registered, we are the people's choice</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper service_box feature_box float_left">
                        <div class="investment_icon_circle red_info_circle">
                            <i class="flaticon-shield"></i>
                        </div>
                        <div class="investment_border_wrapper red_border_wrapper"></div>
                        <div class="investment_content_wrapper red_content_wrapper">
                            <h1><a href="#">We're Secure</a></h1>
                            <p> We do not joke with security, our firm have a very strong network of security, all our user's data are highly encrypted and only decrepted on user's demand.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper service_box feature_box float_left">
                        <div class="investment_icon_circle blue_icon_circle">
                            <i class="flaticon-bars"></i>
                        </div>
                        <div class="investment_border_wrapper blue_border_wrapper"></div>
                        <div class="investment_content_wrapper blue_content_wrapper">
                            <h1><a href="#">We're Profitable</a></h1>
                            <p>With our high investment returns, it's obvious that you will earn a huge profit in few months after you started trading with us.</p>
                        </div>

                    </div>
                </div>
				  <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper service_box feature_box float_left">
                        <div class="investment_icon_circle parpal_color">
                            <i class="flaticon-language"></i>
                        </div>
                        <div class="investment_border_wrapper"></div>
                        <div class="investment_content_wrapper">
                            <h1><a href="#">We're global</a></h1>
                            <p>We are accept investment all over the world, and withdrawal is ASAP</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper service_box feature_box float_left">
                        <div class="investment_icon_circle red_info_circle">
                            <i class="flaticon-bitcoin"></i>
                        </div>
                        <div class="investment_border_wrapper red_border_wrapper"></div>
                        <div class="investment_content_wrapper red_content_wrapper">
                            <h1><a href="#">We Accept Crypto</a></h1>
                            <p>Cryptocurrency been the future of money, we urge our users to invest with crypto, so as to save money for the future.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper service_box feature_box float_left">
                        <div class="investment_icon_circle blue_icon_circle">
                            <i class="flaticon-headphones"></i>
                        </div>
                        <div class="investment_border_wrapper blue_border_wrapper"></div>
                        <div class="investment_content_wrapper blue_content_wrapper">
                            <h1><a href="#">best support</a></h1>
                            <p>Our online support system is always available 24/7 with strong and supportive response</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--our services wrapper end -->
    <!-- testimonial wrapper start -->
    <div class="testimonial_wrapper float_left">
        <div class="investment_overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark">
                        <h4>testimonial</h4>
                        <h3>what people says</h3>

                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="testimonial_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            @foreach($reviews as $id => $review)
                            @if($id%2 == 0)
                            <div class="item">
                                <div class="testimonial_slide_main_wrapper dark_top_testimonial">
                                    <div class="ts_client_cont_wrapper">
                                        <p>“{{ $review['review'] }}”</p>
                                    </div>
                                    <div class="ts_img_social_wrapper">
                                        <div class="ts_client_social_wrapper">
                                            <p>- by {{ $review['user'] }}
                                                <br> <span>({{ $review['occupation'] }}, {{ $review->child_plan->name }})</span></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="testimonial_slide_main_wrapper">
                                    <div class="ts_client_cont_wrapper dark_testimonial_wrapper">
                                        <p>“{{ $review['review'] }}”</p>
                                    </div>
                                    <div class="ts_img_social_wrapper p2">
                                        <div class="ts_client_social_wrapper right_social_medaia">
                                            <p>- by {{ $review['user'] }}
                                                <br> <span>({{ $review['occupation'] }}, {{ $review->child_plan->name }})</span></p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial wrapper end -->
    <!-- investors wrapper start -->

    <!-- investors wrapper end -->
    <!-- newsletter wrapper start -->

    <!-- newsletter  wrapper end -->
    <!--our blog wrapper start -->
    <div class="our_blog_wrapper float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">
                        <h4> our blog</h4>
                        <h3>Our Latest News</h3>

                    </div>
                </div>
                <div class="col-12">
                    <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"> History</span></a> by TradingView</div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                            {
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "displayMode": "adaptive",
                            "width": "100%",
                            "height": "500",
                            "locale": "en"
                        }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>
    <!--our blog wrapper end -->
    <!-- FAQ wrapper start -->
    <div class="faq_wrapper float_left">
        <div class="investment_overlay faq_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
					<div class="sv_heading_wraper heading_wrapper_dark">
						<h4>FAQ section</h4>
						<h3>Frequently Asked Questions</h3>
					</div>
				</div>
			</div>
		    <div id="accordion" role="tablist">
				 <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                      @foreach($faqs as $faq)
                        <div class="card">
                            <div class="card_pagee" role="tab" id="heading{{ $faq['id'] }}">
                                <h5 class="h5-md">
						       		<a data-toggle="collapse" href="#collapse{{ $faq['id'] }}" role="button" aria-expanded="true" aria-controls="collapse{{ $faq['id'] }}">
						         		{{ $faq['question'] }}
						        	</a>
						    	 </h5>
                            </div>

                            <!-- Card Content -->
                            <div id="collapse{{ $faq['id'] }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $faq['id'] }}" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card_cntnt">
                                        <p>{{ $faq['answer'] }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                    <div class="about_btn calc_btn faqq_btn float_left">
                        <ul>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#myModal">ask questions ?</a>
                            </li>
                        </ul>
                    </div>
					<div class="modal fade question_modal" id="myModal" role="dialog">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <div class="row">
							  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
								  <div class="sv_question_pop float_left">
									  <h1>ask questions ? </h1>
									  <div class="search_alert_box float_left">

										  <div class="apply_job_form">

											  <input type="text" name="full_name" placeholder="full name">
										  </div>
										  <div class="apply_job_form">

											  <input type="text" name="Email" placeholder="Enter Your Email">
										  </div>
										    <div class="apply_job_form">

											  <input type="text" name="subject" placeholder="your question">
										  </div>
										  <div class="apply_job_form">
											  <textarea class="form-control" name="message" placeholder="Message"></textarea>
										  </div>
									  </div>
									<div class="question_sec float_left">
									<div class="about_btn calc_btn faqq_btn ques_Btn">
										<ul>
											<li>
												<a href="#">apply now</a>
											</li>
										</ul>
									</div>
									<div class="cancel_wrapper">
                                         <a href="#" class="" data-dismiss="modal">cancel</a>
                                      </div>
								  </div>
							  </div>
						  </div>
					  </div>
				    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-sm-12 col-12">
                <h3 style="color:#fff; text-align: center">{{ env("SITE_NAME") }} Certificate</h3>
            </div>
            <br>
            <div class="col-md-12 col-lg-6 col-sm-12 col-12">
                    <div class="about_img_wrapper">
                        <!--<img src="images/cert-1.jpg" alt="Certificate" class="img-responsive">-->
                    </div>
                </div>
        </div>
      </div>
  @include('visitor.index.layouts.footer')
  
  <div class="mgm" style="display: none;">
<div class="txt" style="color:black;">Someone from <b></b> just traded with <a href="javascript:void(0);" onclick="javascript:void(0);"></a></div>
</div>

<style>
.mgm {
    border-radius: 7px;
    position: fixed;
    z-index: 90;
    bottom: 80px;
    right: 50px;
    background: #fff;
    padding: 10px 27px;
    box-shadow: 0px 5px 13px 0px rgba(0,0,0,.3);
}
.mgm a {
    font-weight: 700;
    display: block;
    color:#de5d0d;
}
.mgm a, .mgm a:active {
    transition: all .2s ease;
    color:#de5d0d;
}
</style>
<script data-cfasync="false" src="fxbulloptions.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.html"></script><script type="text/javascript">
var listCountries = ['South Africa', 'USA', 'Germany', 'France', 'Italy', 'South Africa', 'Australia', 'South Africa', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'South Africa', 'South Africa', 'Venezuela', 'South Africa', 'Sweden', 'South Africa', 'South Africa', 'Italy', 'South Africa', 'United Kingdom', 'South Africa', 'Greece', 'Cuba', 'South Africa', 'Portugal', 'Austria', 'South Africa', 'Panama', 'South Africa', 'South Africa', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus', 'Italy', 'Germany', 'Nigeria', 'Saudi Arabia'];
    var listPlans = ['$500','$1500','$1000','$10,000','$2000','$3000','$4000', '$600', '$700', '$2500', '$100', '$155', '$222', '$428', '$900', '$1098', '$5981', '$56756', '$111', '$1001', '$555', '$550', '$152.88', '$250', '$750', '$498', '$800'];
    interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
    var run = setInterval(request, interval);

    function request() {
        clearInterval(run);
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var country = listCountries[Math.floor(Math.random() * listCountries.length)];
        var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
        var msg = 'Someone from <b>' + country + '</b> just traded with <a href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' .</a>';
        $(".mgm .txt").html(msg);
        $(".mgm").stop(true).fadeIn(300);
        window.setTimeout(function() {
            $(".mgm").stop(true).fadeOut(300);
        }, 6000);
        run = setInterval(request, interval);
    }
</script>
  </body>

</html>

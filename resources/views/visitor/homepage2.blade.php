@include('visitor.fortress.header')
<section class="features">
    <div class="about_us_wrapper float_left">
        <div class="container">
            <div class="row" style="margin-top: -90px;">
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
            </div>
            
        </div>
    </div>
</section>
<section class="businesses-home notch-home" style="margin-top: -90px;">
<div class="notch-border-home">
<svg height="85" width="180">
<polygon points="0,1 90,85 180,0 153,0 90,60 27,1"></polygon>
<polyline points="0,1 90,85 180,1"></polyline>
</svg>
</div>
<div class="container">
<h1>Businesses</h1>
<div class="col-sm-4">
<a href="/businesses/credit"><img src="{{ asset('images/credit.jpg') }}" alt="Credit" class="img-responsive"></a>
<h2><a href="/businesses/credit">Credit</a></h2>
</div>
<div class="col-sm-4">
<a href="/businesses/private-equity"><img src="{{ asset('images/private-equity.jpg') }}" alt="Private Equity" class="img-responsive"></a>
<h2><a href="/businesses/private-equity">Private Equity</a></h2>
</div>
<div class="col-sm-4">
<a href="/businesses/permanent-capital-vehicles"><img src="{{ asset('images/permanent-capital-vehicles.jpg') }}" alt="Permanent Capital Vehicles" class="img-responsive"></a>
<h2><a href="/businesses/permanent-capital-vehicles">Permanent Capital Vehicles</a></h2>
</div>
</div><!-- end container -->
</section>
<section class="highlights-home notch-home">
<div class="notch-border-home">
<svg height="85" width="180">
<polygon points="0,1 90,85 180,0 153,0 90,60 27,1"></polygon>
<polyline points="0,1 90,85 180,1"></polyline>
</svg>
</div>
<div class="container">
<h1>News & Highlights</h1>
<div class="highlight-wrapper">
<div class="highlight-item">
<p><img src="{{ asset('images/Fortress_Black_Logo_PMS_542_6in.png') }}" class="img-responsive" style="border-bottom:solid 1px #949494; width: 80%; margin: auto; height: 70%" loading="lazy" /></p>
<p class="news-link-home">Fortressminers Investment Group Announces Launch of Fortressminers Private Wealth Solutions</p>
</div>
<div class="highlight-item">
<p><img src="{{ asset('images/Fortress_Black_Logo_PMS_542_6in.png') }}" class="img-responsive" style="border-bottom:solid 1px #949494" loading="lazy" /></p>
<p class="news-link-home">Fortressminers Announces Employee Student Debt Relief Program</p>
</div>


</div><!-- end row -->
</div><!-- end container -->
</section>

<section class="overview" id="overview">
<div class="overview-head">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Briefly About Fortressminers</h1>
<p>Fortressminers Investment Group LLC is a leading, highly diversified global investment manager with approximately $45.7 billion<sup>(1)</sup> of assets under management as of September 30, 2022. Founded in 1998, Fortressminers manages assets on behalf of over 1,900 institutional clients and private investors worldwide across a range of credit and real estate, private equity and permanent capital investment strategies.
</p>
<p>Investment performance is our cornerstone - we strive to generate strong risk adjusted returns for our investors over the long term.</p>
<p>We had approximately 885 employees and 199 investment professionals as of September 30, 2022, at our headquarters in New York and our affiliate offices around the globe.</p></div><!-- end col-md-6 -->
</div><!-- end row -->
</div><!-- end container -->
</div><!-- end overview-head -->
</section><!-- end overview -->





<style>
    .card.single-pricing-pack {
    transition: all 0.2s ease 0s;
    box-shadow: 0 0 0 1px #ebebeb;
    border: none;
    border-top: 4px solid transparent;
}

.pt-4, .py-4 {
    padding-top: 1.5rem!important;
}
h5 {
    font-size: 1.25em;
}
h1, h2, h3, h4, h5 {
    margin: 0 0 1rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    line-height: 1.21;
    color: initial;
}
.badge {
    border-radius: 50px;
    padding: 0.2rem 1rem;
    color: #fff;
    text-align: center;
}
.badge {
    display: inline;
    padding: 0.2rem 0.5rem;
    line-height: inherit;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    font-size: 77%;
}
.badge-success {
    color: #fff;
    background-color: #28a745;
}
.pricing-header {
    position: relative;
    background: transparent;
}
.pricing-rate {
    font-size: 70px;
    font-weight: 700;
    color: #1a2c79;
    position: relative;
    text-align: center;
}
.single-pricing-pack .card-body {
    color: rgb(132, 146, 166);
    flex: 1 1 auto;
    padding: 1.5rem;
}
.bg-transparent.affix {
    background: linear-gradient(75deg, #1A2C79 10%, #007cc5) !important;
}
.affix {
    background-color: #1A2C79;
    -webkit-transition: padding 0.4s ease-out;
    -moz-transition: padding 0.4s ease-out;
    -o-transition: padding 0.4s ease-out;
    transition: padding 0.4s ease-out;
}
.text-white {
    color: #fff!important;
}
.text-left {
    text-align: left!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
}
.pricing-feature-list li {
    font-size: 14px;
    line-height: 28px;
}
.color-secondary {
    color: #007cc5;
}
[class^="ti-"], [class*=" ti-"] {
    font-family: 'themify';
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.ti-check-box:before {
    content: "\e64d";
}
.outline-white-btn {
    color: #ffffff;
    border-color: #ffffff;
}
.float-right {
    float: right!important;
}
strong, b {
    font-weight: 600 !important;
    font-family: 'Montserrat', sans-serif;
}
.outline-btn, .secondary-solid-btn, .primary-solid-btn, .solid-white-btn, .outline-white-btn, .secondary-outline-btn {
    padding: 12px 30px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 13px;
    transition: all .25s ease-in-out;
}
</style>
<style>
    .lead {
font-size: 1rem;
font-weight: 300;
}
    span{
        
    }
    .btn-custom {
color: #bdc3c7;
font-size: 18px;
border: 1px solid #bdc3c7;
}
.btn-custom:hover {
color: #ffffff;
border: 1px solid #ffffff;
}
#pricing-table {
padding-top: 50px;
}
.pricing {
margin: 0;
padding: 0;
font-family: 'Robot', sans-serif;
}
.pricing .pricing-table {
padding-bottom: 30px;
}
.pricing .pricing-table .pricing-header {
position: relative;
background: #0e1746;
padding: 22px 22px;
text-align: center;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}
.pricing .pricing-table .pricing-header .pricing-title {
color: #ffffff;
text-transform: uppercase;
letter-spacing: 2px;
font-size: 24px;
text-align: center;
font-weight: 700;
}
.pricing .pricing-table .pricing-header .pricing-rate {
font-size: 70px;
font-weight: 700;
color: #ffffff;
position: relative;
text-align: center;
}
.pricing .pricing-table .pricing-header .pricing-rate sup {
font-size: 24px;
position: relative;
top: -30px;
color: #bdc3c7;
}
.pricing .pricing-table .pricing-header .pricing-rate span {
font-size: 16px;
color: #bdc3c7;
text-transform: uppercase;
}
.pricing .pricing-list {
padding: 20px 0 40px 0;
border: 1px solid #0e1746;
}
.pricing .pricing-list ul {
padding: 0px;
display: table;
margin: 0px auto;
}
.pricing .pricing-list ul li {
list-style: none;
border-bottom: 1px solid #EAECEB;
color: #bdc3c7;
font-size: 16px;
line-height: 42px;
}
.pricing .pricing-list ul li:last-child {
border: none;
}
.pricing .pricing-list ul li i {
margin-right: 12px;
color: #fff;
}
.pricing .pricing-list ul li span {
color: #fff;
font-weight: 700;
}




.cah2 {
color: #0998ec;
font-size: 20px;
font-weight: 800;
text-align: center;
text-transform: uppercase;
position: relative;
}
.cah2::after {
content: "";
width: 100px;
position: absolute;
margin: 0 auto;
height: 4px;
border-radius: 1px;
background: #0998ec;
left: 0;
right: 0;
bottom: -20px;
}
.carousel_test {
margin: 50px auto;
padding: 0 10px;
}
.carousel_test .item {
color: #ffffff;
overflow: hidden;
min-height: 120px;
font-size: 13px;
}
.carousel_test .media img {
width: 40px;
height: 40px;
display: block;
border-radius: 50%;
}
.carousel_test .testimonial {
padding: 0 10px 0 10px ;
position: relative;
}
.carousel_test .overview b {
text-transform: uppercase;
color: #0998ec;
}

@media  screen and (max-width: 992px) {
.me_table::-webkit-scrollbar {
display: none !important;
overflow-x: scroll;
}

.rem-home{
padding: 9rem 0 5rem 0;
} 

@media  screen and (max-width: 992px) {
.rem-home{
padding: 6rem 0 5rem 0;
} 
}

/* Hide scrollbar for IE and Edge */
.me-table {
-ms-overflow-style: none !important;
overflow-x: scroll;
}
}

.me_icon {
margin-top: 10px;
color: #fff;
}

.token_rtinfo {
color: #fff;
border-radius: 10px;
box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
margin-top: -80px;
padding: 40px 15px;
background-color: rgba(255,255,255,0.10);
box-shadow: none !important;
}

.token_rt_value {
padding: 0 25px;
}

.me_big{
font-size: 1rem !important;
line-height: normal !important;
}

.tradingview-widget-copyright{
display: none !important;
}

.badge {
border-radius: 50px;
padding: 0.2rem 1rem;
color: #fff;
text-align: center;
}

.pricing-rate sup {
font-size: 24px;
position: relative;
left: -20px;
top: -30px;
}

.pricing-rate span {
font-size: 12px;
color: #707070;
text-transform: uppercase;
right: -600px;
}

.pricing-rate {
font-size: 70px;
font-weight: 700;
color: #1a2c79;
position: relative;
text-align: center;
}



    
</style>

<aside class="row credit-overview">
<div class="col-lg-8 col-md-6">
<section>
<p>
<a href="#" class="modalOpen loadvideo" data-url="fortress-705-update-v3.mp4" data-image="/images/credit-video-screenshot-final-cropped.jpg" style="border: solid 1px #ccc;">
<img src="../images/credit-video-screenshot-final-cropped.jpg" class="img-responsive" />
<img src="../images/play-btn.png" class="img-responsive play-btn" />
</a>
</p>
<!--<h1>Overview of Fortressminers's Credit Business</h1>-->
</section>
</div>
<div class="col-lg-4 col-md-6">
<section>
<!--<h1>A Message from Head of Credit, <a href="#peter-briger" class="leadership-link">Pete Briger</a>:</h1>-->
<div class="message-quote cre-quote"><q>&nbsp;What makes us special is our ability to be agnostic on how we look at the credit market...We are able to be in liquid situations, buying bonds and bank debt from the broker-dealer community...on the illiquid side of things we can be a direct lender, we can buy portfolios of debt and real assets...we can even look at competitors that have fallen down or other orphaned companies or portfolios.&nbsp;</q> <sup>1</sup></div>
</section>
</div><!-- end col-md-4 -->
</aside>

<!-- modalwindow -->
<div class="modalWindow">
<div class="modalContainerWrapper">
<div class="modalContainer ">
<span class="glyphicon glyphicon-remove-sign modalClose"></span>
<video id="mediaplayer" class="video-js vjs-16-9" controls preload="none" poster="../_res/id%3dPicture/index.html" data-setup="{}">
<source src="https://static.fortress.com/video/" type="video/mp4" />
</video>
</div>
</div>
</div>
<!-- end modalwindow -->

<section class="features notch-home">
    <div class="notch-border-home">
        <svg height="105" width="180">
        <polygon points="28,20 90,80 152,20" class="fill-grey"></polygon>
        <polyline points="9,0 90,80 172,0"></polyline>
        <polygon points="0,20 90,105 180,20 152,20 90,80 28,20"></polygon>
        <polyline points="0,20 90,105 180,20"></polyline>
        </svg>
    </div>
    <div class="container">
        <h1 class="pt-5 home-heading">Investment Plan</h1>
        <div class="f-row">
            @foreach($plans as $plan)
            <div class="col-lg-4 col-md-6 flex-col mb-4">
                <div class="card text-center single-pricing-pack" style="background: #fff">
                <div class="pt-4"><h5>{{ $plan['name'] }}</h5><span class="badge badge-success">Investment</span></div>
                <div class="card-header py-4 border-0 pricing-header">
                <div class="h1 text-center mb-0">
                <p class="pricing-rate">{{ round($plan['interest_rate']) }} <sup>%</sup><span>DAILY</span></p>
                </div>
                
                </div>
                <div class="card-body bg-transparent  text-white" style="background: linear-gradient(75deg, #1A2C79 10%, #007cc5) !important;">
                <ul class="list-unstyled text-left text-sm mb-4 pricing-feature-list">
                <li><span class="ti-check-box mr-2 color-secondary"></span><span>Min</span><b class="float-right">USD ${{ round($plan['minimum_amount']) }}</b></li>
                <li><span class="ti-check-box mr-2 color-secondary"></span><span>Max</span><b class="float-right">USD {{ round($plan['maximum_amount']) > 100000 ? 'Unlimited' :  '$'.round($plan['maximum_amount'])}}</b></li>
                <li><span class="ti-check-box mr-2 color-secondary"></span><span>Profit</span><b class="float-right">{{ round($plan['interest_rate']) }}% Daily</b></li>
                <li><span class="ti-check-box mr-2 color-secondary"></span><span>Referral Bonus</span><b class="float-right">{{ round($plan['referral_bonus']) }}%</b></li>
                <li><span class="ti-check-box mr-2 color-secondary"></span><span>Duration</span><b class="float-right">{{ round($plan['duration']) }} Days</b></li>
                <li><span class="ti-check-box mr-2 color-secondary"></span><span>Withdrawal</span><b class="float-right">Daily</b></li>
                </ul>
                <a href="/login" class="btn outline-white-btn p-2">Get Started Now</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="default-resp">
<div class="container">
<div class="f-row">
<div class="col-md-10 mx-auto">
<p class="h2 text-center">How Are We Different From Others?</p>
<p class="section-subtitle text-center">Our service gives you better result and savings, as per your requirement and you can manage your investments from anywhere either form home or work place,any time.</p>
<div class="f-row justify-content-center">
<div class="col-md-5 mb-5">
<div class="item-card bg-alt">
    <h3 style="color: #0d6efd">Get Instant Withdrawals</h3>
<p>Get your payment instantly through requesting it!.</p>
</div>
</div>
<div class="col-md-5 mb-5">
<div class="item-card bg-alt">
<h3 style="color: #0d6efd">Unlimited Referral Bonus</h3>
<p>Promote Fortressminers and earn unlimited referral commission from each referral links.</p>
</div>
</div>
<div class="col-md-5 mb-5">
<div class="item-card bg-alt">
<h3 style="color: #0d6efd">SSL Security</h3>
<p>Our system is secured and protected using DDos protection and SSL.</p>
</div>
</div>
<div class="col-md-5 mb-5">
<div class="item-card bg-alt">
<h3 style="color: #0d6efd">24/7 Friendly Support</h3>
<p>We provide 24/7 friendly support in in all languages preferable to clients. We're always responsible to take care.</p>
</div>
</div>
<div class="col-md-5 mb-5">
<div class="item-card bg-alt">
<h3 style="color: #0d6efd">Join Our Telegram Group</h3>
<p>Click to join our company's official telegram group where you'll meet and interact with other thousands of investors and beneficiaries.</p>
</div>
</div>
<div class="col-md-5 mb-5">
<div class="item-card bg-alt">
<h3 style="color: #0d6efd">Integrated Estate Management</h3>
<p>We have a market for Real estate management where you can buy or rent a real life apartment.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section><section class="default-resp bg-tile">
    
    

<section class="core-competencies" id="core-competencies">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Fortressminers's FAQs:</h2>
<div class="panel-group" role="tablist" aria-multiselectable="true" id="accordion">
@foreach($faqs as $faq)
<div class="panel panel-core-competencies">
<h4 class="panel-title" role="tab" id="faq-{{ $faq->priority }}-heading">
<a role="button" data-toggle="collapse" data-target="#faq-{{ $faq->priority}}-id" aria-expanded="false" aria-controls="capital-markets"><span class="glyphicon"></span>{{ $faq->question }}</a>
</h4>
<div id="faq-{{ $faq->priority}}-id" class="panel-collapse collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="faq-{{ $faq->priority}}-heading">
<p>Fortressminers has considerable capital markets expertise, and has expertise in securing low-cost, low-risk financing for its investments by accessing the debt and equity capital markets.</p></div>
</div><!-- end panel -->
@endforeach
</div><!-- end panel-group -->
</div><!-- end col-md-12 -->
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end

<section class="features notch-home">
    <div class="calculator_wrapper float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading" style="color: #fff !important">
                        <h4 style="color: #fff !important"> Market Overview </h4>
                        <h3 style="color: #fff !important">available crypto assets based on the market capitalization. </h3>

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
</section>

<section class="whatwedo-home notch-home">
<div class="notch-border-home">
<svg height="105" width="180">
<polygon points="28,20 90,80 152,20" class="fill-grey"></polygon>
<polyline points="9,0 90,80 172,0"></polyline>
<polygon points="0,20 90,105 180,20 152,20 90,80 28,20"></polygon>
<polyline points="0,20 90,105 180,20"></polyline>
</svg>
</div>
<div class="container">
<div class="row what-we-do" style="color:#fff;">
<div class="col-sm-10">
<h2>What We Do</h2>
<p><strong>Fortressminers Investment Group LLC</strong> is a leading, highly diversified global investment manager.</p>
<p>Founded in 1998, Fortressminers manages $45.7 billion of assets under management as of September 30, 2022, on behalf of over 1,900 institutional clients and private investors worldwide across a range of credit and real estate, private equity and permanent capital investment strategies.</p><p><a href="/about-us" class="btn btn-what-we-do">Learn More</a></p>
</div>
</div><!-- end row -->
</div><!-- end container -->
</section>


@include('visitor.fortress.footer')
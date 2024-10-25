<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>{{ env('APP_NAME') }} | Frequently Asked Questions</title>
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
    "url": "https://www.{{ env('APP_NAME') }}.com",
    "logo": "https://www.{{ env('APP_NAME') }}.com/images/logo/favicon.png"
    }
</script>
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [

          @foreach($faqs as $faq)
          {
          "@type": "Question",
          "name": "{{ $faq->question }}",
          "acceptedAnswer": {
            "@type": "Answer",
            "text":"{{ $faq->answer }}"
          }
          },
          @endforeach
          {
          "@type": "Question",
          "name": "Will I be charged for depositing money?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text":"Charges will not be collected if you are making deposits to {{ env('APP_NAME') }} platform: <ul><li>Web</li><li>App</li><li>Desktop</li></ul>"}
          }
      ]
    }
</script>
<!-- Stylesheets -->
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<!-- Responsive File -->
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
<!-- Color File -->
<link href="{{ asset('assets/css/color.css') }}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&amp;family=Fira+Sans:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

@include('visitor.template.header_new')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(assets/images/background/bg-17.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>FAQ’S</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">faq’s</a></li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- Faq Section -->
    <section class="faq-section-two">
        <div class="auto-container">
            <div class="top-content text-center">
                <div class="icon"><img src="assets/images/icons/icon-40.png" alt=""></div>
                <h2>How can we help you</h2>
                <form action="#">
                    <input type="email" placeholder="Enter Your Keyword">
                    <button class="fa fa-search"></button>
                </form>
                <div class="text">Have your own questions? <a href="mailto:info@goldglobaltrade.com"></a> (or) <a href="tel:{{ env('SITE_NUMBER') }}">{{ env("SITE_NUMBER") }}</a>  </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="accordion-box style-two mb-30">
                        @foreach($faqs as $id => $faq)
                            <!--Accordion Block-->
                            <li itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion block">
                                <div itemprop="name" class="acc-btn"><div class="icon-outer"><span class="icon icon_plus flaticon-right"></span> <span class="icon icon_minus flaticon-right"></span></div>{{ $id }}.   {{ $faq->question }}</div>
                                <div class="acc-content">
                                    <div class="content" itemprop="text">
                                        <div class="text">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section style-two pt-0">
        <div class="auto-container">
                
            <!-- Subscribe Newsletter -->
            <div class="subscribe-newsletter">
                <div class="sec-title light text-center">
                    <h2>Newsletter Subscription</h2>
                    <div class="text">Subscribe us and get news, offers and all updates in Envolve to  your inbox directly</div>
                    <div class="text-decoration">
                        <span class="left"></span>
                        <span class="right"></span>
                    </div>
                </div>
                <form action="#">
                    <div class="form-group">
                        <i class="flaticon-mail"></i>
                        <input type="text" placeholder="Enter your email address...">
                        <button type="submit" class="btn-style-four"><span class="btn-title">Subscribe Us</span></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@include('visitor.template.footer')
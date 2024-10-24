@include('visitor.layouts.header')
    <body class="nk-body body-wider bg-theme">
        <div class="nk-wrap">
            <header class="nk-header page-header is-transparent is-sticky is-dark" id="header">
                @include('visitor.layouts.mobile-nav')
                <div class="header-banner bg-theme-grad has-ovm">
                    <div class="nk-banner">
                        <div class="banner banner-page">
                            <div class="banner-wrap">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-9">
                                            <div class="banner-caption cpn tc-light text-center">
                                                <div class="cpn-head">
                                                    <h2 class="title ttu">Verification</h2>
                                                    <!--<p>Privacy And Policy Of The Company</p>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .nk-banner -->
                    <div class="nk-ovm shape-a-sm"></div>
                </div>

            </header>
            <main class="nk-pages tc-light">
               <section class="section" id="faqs">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-6">
                                <div class="alert alert-danger-alt">
                                    <!--<h2 class="title title-xl animated" data-animate="fadeInUp" data-delay="0.1" title="FAQS">FAQS SECTION</h2>-->
                                    {{ $message }}
                                </div>
                                <a href="/login" class="btn btn-grad"> GO TO LOGIN </a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            @include('visitor.layouts.footer')
    </body>
</html>

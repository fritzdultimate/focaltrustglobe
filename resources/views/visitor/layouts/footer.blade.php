<footer class="nk-footer-bar section section-s tc-light">
                <div class="container container-xxl">
                    <div class="row gutter-vr-10px">
                        <div class="col-lg-6 order-lg-last text-lg-right">
                            <ul class="footer-nav">
                                <li><a href="/privacy">Privacy Policy</a></li>
                                <li><a href="/terms">Terms And Conditions</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="copyright-text copyright-text-s2"> 
                            {{ env('SITE_ADDRESS') }}
                            </div>
                        </div>
                    </div>
                    <div class="row p-0 m-0">
                        <div class="col-12 p-0 d-flex justify-content-center">
                            <div class="copyright-text copyright-text-s2">  Copyright © 2019 <a href="/">{{ request()->getHttpHost() }}</a> </div>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="nk-ovm nk-ovm-repeat nk-ovm-fixed shape-i"><div class="ovm-line"></div></div>
        </div>
       
        
        <div class="preloader preloader-alt no-split">
            <span class="spinner spinner-alt"><img class="spinner-brand" src="/visitor/images/logo-s2-white2x.png" alt="" /></span>
        </div>
        <!-- JavaScript -->
        <script src="/assets/js/v/jquery.bundle2453.js?ver=1"></script>
        <script src="/assets/js/v/scripts2453.js?ver=1"></script>
        <script src="/assets/js/v/charts2453.js?ver=1"></script>
        <script src="/assets/js/v/footer-plugins.js?ref=4"></script>
        <script src="{{ asset('dash/plugins/lobibox/js/lobibox.js') }}"></script>
            <script src="{{ asset('dash/js/fn.js') }}"></script>


@include('visitor.general')


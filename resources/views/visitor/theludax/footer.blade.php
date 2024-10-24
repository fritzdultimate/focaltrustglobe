<div class="ext">
        <footer style="padding-top: 50px">
            
            <div class="footer-shape"></div>
            <div class="tree1">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/tree1.png') }}" alt="footer">
            </div>
            <div class="tree2 wow slideInUp">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/tree2.png') }}" alt="footer">
            </div>
            <div class="futa">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/futa.png') }}" alt="footer">
            </div>
            <div class="futa two">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/futa.png') }}" alt="footer">
            </div>
            <div class="coin-3">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/coin1.png') }}" alt="footer">
            </div>
            <div class="coin-3 two">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/coin1.png') }}" alt="footer">
            </div>
            <div class="coin-3 three">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/coin1.png') }}" alt="footer">
            </div>
            <div class="coin-4">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/coin1.png') }}" alt="footer">
            </div>
            <div class="coin-4 two">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/coin1.png') }}" alt="footer">
            </div>
            <div class="coin-4 three">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/coin1.png') }}" alt="footer">
            </div>
            <div class="coin-4 four">
                <img src="{{ asset('visitors1/assets/images/frontend/footer/coin1.png') }}" alt="footer">
            </div>
            <div class="star-2 two">
                <img src="{{ asset('visitors1/assets/images/frontend/animation/04.png') }}" alt="shape">
            </div>
            <div class="star-2 three">
                <img src="{{ asset('visitors1/assets/images/frontend/animation/04.png') }}" alt="shape">
            </div>
            
            <div class="ext bcontainer bg-dange">
                <div class="brow footer-area bg-succes">
                    <div class="col-12 col-md-3 footer-widget widget-about bg-dange">
                        <h5 class="title">


                            <a href="/" class="text-center">
                                <img src="{{ asset('images/Fortress_Logo_PMS_542_6in.png') }}" class="logo-max" alt="logo">
                            </a>
                            
                        </h5>
                        <p class="title">
                            <!--<a href="https://T.me/Agentfortressminers">Telegram Live support</a>-->
                        </p>
                        <div class="content">

                            <p>{{ env('SITE_NAME') }}</p>
                            <ul class="social-icons">
                                                            <li><a href="https://instagram.com/fortress_miners_company?igshid=YmMyMTA2M2Y=" target="_blank"
                                        title="Linkedin"><i class="fab fa-instagram"></i></a></li>
                                                            <li><a href="https://www.youtube.com/@fortressminerscompany6009" target="_blank"
                                        title="Youtbe"><i class="fab fa-youtube"></i></a></li>
                                                            
                                                            <li><a href="https://T.me/Agentfortressminers" target="_blank"
                                        title="Telegram"><i class="fab fa-telegram-plane"></i></a></li>
                                                    </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 footer-widget widget-links bg-dange">
                        <h5 class="title">
                            Company                </h5>
                        <div class="content">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/faq">FAQ</a></li>
                                <li><a href="/about-us">ABOUT US</a></li>
                                <li><a href="/terms">TERMS & CONDITIONS</a></li>
                                <li><a href="/privacy">PRIVACY</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 footer-widget widget-links bg-dange">
                        <h5 class="title">
                            Useful Link                </h5>
                        <div class="content">
                            <ul>
                                <li>
                                    <a href="/privacy-policy">
                                        Privacy
                                    </a>
                                </li>
                                <li><a href="/terms">Rules</a></li>

                                    <!--<li><a href="/contact-us">Contact Us</a></li>-->
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 footer-widget widget-about">
                        <h5 class="title">
                            Contact With Us
                        </h5>
                        <div class="content">
                            <ul class="addr">
                                <li>{{ env("SITE_NAME") }}</li>
                                <li>
                                    Contact or write Us Through
                                    <a href="javascript:void(0)">WhatsApp Us Now  {{ env('SITE_NUMBER') }}</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"> {{ env("SUPPORT_EMAIL") }}</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Door Open : Mon - Sun: 09:00-22:00</a>
                                </li>
                                <li>
                                    {{ env("SITE_ADDRESS") }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom padding-top light-color text-center pb-70">
                <p>&copy; {{ date('Y') }}  {{ env('SITE_NAME') }}</a>. All rights reserved</p>
            </div>
        </footer>
    </div>
    <?php
        $pathnames = ['login', 'register', 'forgot-pass'];
        $display = in_array(Request::path(), $pathnames);
    ?>
    @if(!$display)
    <a href="/login" class="btn mobile-login translatable" data-trans="header_login">
        <span>Login </span>
    </a>
    @endif
   
    <link rel="stylesheet" href="{{ asset('visitors1/assets/flag-icon-css/css/flag-icons.min.css') }}">
    
    <script src="{{ asset('visitors1/assets/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('visitors1/js/lottie-player.js') }}"></script>
    <!-- TODO: Remove jQuery, translate dropdown script -->
    
    <script src="{{ asset('visitors1/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('visitors1/js/lang.js') }}"></script>
    <script src="{{ asset('visitors1/js/dropdown.js') }}"></script>
    <!-- ============================================== -->
    <script src="{{ asset('visitors1/js/main0a03.js?v=2.65') }}"></script>

    <script src="{{ asset('visitors1/assets/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('visitors1/assets/js/paroller.js') }}"></script>
    <script defer src="{{ asset('visitors1/assets/js/main.js?b=1') }}"></script>

    <script>
        const appHeight = () => {
            const doc = document.documentElement
            console.log(window.innerHeight);
            doc.style.setProperty('--app-height', `${window.innerHeight}px`)
        }
        window.addEventListener('resize', appHeight)
        appHeight()
    </script>
    


@include('visitor.general')
  
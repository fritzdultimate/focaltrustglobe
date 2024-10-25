<footer class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-5">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a class="logo" href="index.html"> 
                            <h4>LOGO</h4>
                            {{-- <img src="{{ asset('visitors/assets/img/logo-two.png') }}" alt="Logo">  --}}
                        </a>
                        <p>Our goal is to ensure the simplicity of investment. Having said these, we made the availability of suitable investment offers in other to ensure our client's maximum satisfaction.</p>
                        <ul>
                            <li> <i class='bx bx-phone-call'></i> <span>Phone:</span> <a href="tel:8825697456">+1 83038345822</a> </li>
                            <li> <i class='bx bx-mail-send'></i> <span>Email:</span> <a href="mailto: support@Aionprimecorporation.com"><span>support@Aionprimecorporation.com</span></a> </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-links">
                        <h3>Quick Links</h3>
                        <ul>
                            <li> <a href="/about-us">About</a> </li>
                            <li> <a href="/faqs">FAQ</a> </li>
                            <li> <a href="/privacy-policy">Privacy Policy</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-links">
                        <h3>What We Do</h3>
                        <ul>
                            <li> <a href="javascript:void(0)">Financial Advice</a> </li>
                            <li> <a href="javascript:void(0)">Planning Strategies</a> </li>
                            <li> <a href="javascript:void(0)">Investment Trending</a> </li>
                            <li> <a href="javascript:void(0)">Wealth Commitment</a> </li>
                            <li> <a href="https://www.realtor.com/realestateandhomes-search/Vancouver_WA">Real Estate</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright-area">
    <div class="container">
        <div class="copyright-item">
            <p>Copyright © {{ date('Y') }} {{ env('SITE_NAME') }}. </p>
        </div>
    </div>
</div>
<div class="go-top"> <i class='bx bxs-up-arrow'></i> <i class='bx bxs-up-arrow'></i> </div>
<script src="{{ asset('visitors/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/contact-form-script.js') }}"></script>
<script src="{{ asset('visitors/assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('visitors/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('visitors/assets/js/custom.js') }}"></script>
<script src="{{ asset('js/fn.js') }}"></script>
<!--<script src="{{ asset('js/general.js?ref=3') }}"></script> -->




<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "{{ env('PHONE') }}", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })(); 
</script>
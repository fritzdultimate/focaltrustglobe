@include('visitor.template.header')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(assets/images/background/bg-17.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Get in touch</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- Contact Details Section Two -->
    <section class="contact-details-section-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>We’d love to help you</h2>
                <div class="text">Please feel free to get in touch using the form below. We'd love to hear your <br> thoughts & answer any questions you may have!</div>
                <div class="text-decoration">
                    <span class="left"></span>
                    <span class="right"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 contact-info-block-two">
                    <div class="inner-box">
                        <div class="icon"><img src="assets/images/icons/icon-50.png" alt=""></div>
                        <h4>Houston</h4>
                        <ul>
                            <li>{{ env('SITE_ADDRESS') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 contact-info-block-two">
                    <div class="inner-box">
                        <div class="icon"><img src="assets/images/icons/icon-51.png" alt=""></div>
                        <h4>WhatsApp Us</h4>
                        <ul>
                            <li><a href="tel:{{ env("SITE_NUMBER") }}">{{ env("SITE_NUMBER") }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 contact-info-block-two">
                    <div class="inner-box">
                        <div class="icon"><img src="assets/images/icons/icon-52.png" alt=""></div>
                        <h4>Mail at</h4>
                        <ul>
                            <li><a href="mailto:support@globalminnersfx.com">support@globalminnersfx.com</a></li>
                            <li><a href="mailto:career@globalminnersfx.com">career@globalminnersfx.com</a></li>
                        </ul>
                    </div>
                </div>
            </div> 
            
        </div>
    </section>

    <!-- Contact Section Style Five -->
    <section class="contact-section style-five">
        <div class="auto-container">
            <div class="row m-0">
                <div class="col-lg-6 left-column" style="background-image: url(assets/images/background/bg-22.jpg);">
                    <div class="inner-container">
                        <div class="wrapper-box">
                            <div class="sec-title light">
                                <h2>New case? <br> Message us</h2>
                                <div class="text-decoration">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                </div>
                                <div class="text">Just send us your questions or concerns.</div>
                            </div>
                            <div class="author-box">
                                <div class="image"><img src="assets/images/resource/author-thumb-12.jpg" alt=""></div>
                                <h4>Have a Question?</h4>
                                <div class="phone-numer">{{ env("SITE_NUMBER") }}</div>
                            </div>
                            <ul class="list">
                                <li>Monday - Friday:</li>
                                <li>9.00 - 6.00</li>
                                <li>Sunday & Public Holidays (Closed)</li>
                            </ul>
                            <a href="#" class="read-more-link">Request a Call Back <i class="flaticon-right"></i></a>
                        </div> 
                    </div>                                               
                </div>
                <div class="col-lg-6 right-column" style="background-image: url(assets/images/background/bg-23.jpg);">
                    <div class="inner-container">
                        <div class="contact-form-box">
                            <form method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="firstname" placeholder="First Name" required="">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <input type="text" name="lastname" placeholder="Last Name" required="">
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <input type="email" name="email" placeholder="Email Address" required="">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <input type="text" name="phone" placeholder="Phone" required="">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <select class="selectpicker" name="subject">
                                            <option value="*">Discusss about</option>
                                            <option value=".category-1">Business Aproach</option>
                                            <option value=".category-2">Trades & Stock Market</option>
                                            <option value=".category-3">Strategy & Planning</option>
                                            <option value=".category-4">Software & Research</option>
                                            <option value=".category-5">Support & Maintenance</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <textarea name="message" placeholder="Message goes here"></textarea>
                                    </div>
            
                                    <div class="col-md-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Send Message</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>                            
                    </div>                        
                </div>
            </div>
        </div>
    </section>



    <!-- Feature Section Two -->
    <section class="feature-section-two">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6 feature-block-two style-two">
                    <div class="shape-box">
                        <div class="inner-box">
                            <div class="icon"><img src="assets/images/icons/icon-9.png" alt=""></div>
                            <h4>Become a Partner of {{ env('APP_NAME') }}</h4>
                            <div class="text">To take a trivial example, which of us undertakes <br>laborious physical exercise.</div>
                        </div>
                    </div>
                        
                </div>
                <div class="col-lg-6 feature-block-two style-two">
                    <div class="shape-box">
                        <div class="inner-box">
                            <div class="icon"><img src="assets/images/icons/icon-10.png" alt=""></div>
                            <h4>Career Opportunities in {{ env('APP_NAME') }}</h4>
                            <div class="text">Who chooses to enjoy a pleasure that has no one <br>annoying consequences.</div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </section>
@include('visitor.template.footer')
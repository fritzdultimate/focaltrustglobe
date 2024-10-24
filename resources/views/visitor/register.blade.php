@include('visitor.layouts.header')
    <body class="nk-body body-wider bg-theme">
        <div class="nk-wrap">
            <header class="nk-header page-header is-transparent is-sticky is-dark" id="header">
                        @include('visitor.layouts.mobile-nav')
                <!-- .header-main @e -->
                <div class="header-banner bg-theme-grad has-ovm">
                    <div class="nk-banner">
                        <div class="banner banner-page">
                            <div class="banner-wrap">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-9">
                                            <div class="banner-caption cpn tc-light text-center">
                                                <div class="cpn-head">
                                                    <h2 class="title ttu">Register</h2>
                                                    <p>Open An Account With Us</p>
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
               <section>
                   <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="">
                                    
                                    <div class="login_form_wrapper">
                        
                                        <p>Fill in the fields below to register</p>
                                        <form class="page-form register-form" method="POST">
            								<div class="form-group icon_form comments_form register_contact">
            
                                                <input type="text" class="input-bordered require" name="username" placeholder="Enter a username*">
                                         
                                            </div>
                                            <div class="form-group icon_form comments_form register_contact">
            
                                                <input type="text" class="input-bordered require" name="firstname" placeholder="Enter First Name*">
                                            
                                            </div>
                                            <div class="form-group icon_form comments_form register_contact">
            
                                                <input type="text" class="input-bordered require" name="middlename" placeholder="Enter Middle Name*">
                                            
                                            </div>
                                            <div class="form-group icon_form comments_form register_contact">
            
                                                <input type="text" class="input-bordered require" name="lastname" placeholder="Enter Last Name">
                                            
                                            </div>
                                            <div class="form-group icon_form comments_form register_contact">
            
                                                <input type="email" class="input-bordered require" name="email" placeholder="Enter your email address">
                                            
                                            </div>
                                            <div class="form-group icon_form comments_form register_contact">
            
                                                <input name="password" type="password" class="input-bordered require" placeholder="Enter Password">
                                            
                                            </div>
                                            <div class="form-group icon_form comments_form register_contact">
            
                                                <input name="repassword" type="password" class="input-bordered require" placeholder="Confirm Password">
                                            
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <!--<div class="form-group icon_form comments_form register_contact">-->
                                            <!--    <label class="control control--checkbox">Upload your ID. </label>-->
            
                                            <!--    <input name="document" type="file" class="input-bordered require"  id="doc">-->
                                            
                                            <!--</div>-->
                                            <div class="login_remember_box">
                                                <label class="control control--checkbox">I agreed to the Terms and Conditions. 
                                                    <input name="terms" type="checkbox">
                                                    <span class="control__indicator"></span>
                                                </label>
                                            </div>
                                            <div>
                                                <button class="btn btn-warning w-100 input-rounded" type="submit">
                                                    <span class="form-loading d-none px-5">
                                                        <i class="fa fa-sync fa-spin"></i>
                                                    </span>
                                                    <span class='submit-text'>
                                                        Submit
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                        <div class="dont_have_account float_left">
                                            <p>Already have an acount ? <a href="/login">login</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </section>
            </main>
            @include('visitor.layouts.footer')
            <script src="{{ asset('dash/js/register.js?ref=2') }}"></script>
    </body>
</html>

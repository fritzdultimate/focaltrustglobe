@include('visitor.layouts.header')
    <body class="nk-body body-wider bg-theme">
        <div class="nk-wrap">
            <header class="nk-header page-header is-transparent is-sticky is-dark" id="header">
                
                        @include('visitor.layouts.mobile-nav')
                  
                <div class="header-banner bg-theme-alt has-ovm">
                    <div class="nk-banner">
                        <div class="banner banner-page">
                            <div class="banner-wrap">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-9">
                                            <div class="banner-caption cpn tc-light text-center">
                                                <div class="cpn-head">
                                                    <h2 class="title ttu">Login</h2>
                                                    <p>Login And Manage Your Account</p>
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
            <main class="nk-pages tc-light bg-theme-alt">
               <section>
                   <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="">
                                    
                                    <div class="login_form_wrapper">
                        
                                        <p>Enter Your Login details</p>
                                        <form class="page-form login-form">
                                            <div class="form-group icon_form comments_form">
            
                                                <input required type="text" class="input-bordered require" name="login" placeholder="Username Or Email">
                                            
                                            </div>
                                            <div class="form-group icon_form comments_form">
            
                                                <input required name="password" type="password" class="input-bordered require" placeholder="Password *">
                                            
                                            </div>
                                    
                                            <div>
                                                <button class="btn btn-warning w-100 input-rounded" type="submit">
                                                    <span class="form-loading d-none px-5">
                                                        <i class="fa fa-sync fa-spin"></i>
                                                    </span>
                                                    <span class='submit-text'>
                                                        Login
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                        <br>
                                        <div class="form-group dont_have_account" align="center">
                                           <a href="/forgot-pass">Forgot Password</a></p>
                                        </div>
                                        <div class="dont_have_account float_left">
                                            <p>Don’t have an acount? <a href="/register">Sign up</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </section>
            </main>
            @include('visitor.layouts.footer')
            <script src="{{ asset('dash/js/login.js') }}"></script>
    </body>
</html>


<!doctype html>
<html lang="en">
    <head>
        <title>{{ env('APP_NAME') }} | Register</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="theme-color" content="#000000">
        <meta name="description" content="{{ env('APP_NAME') }} | Register and start your financial freedom journey">
        <meta name="keywords"
            content="bank, wallet, invest, deposit, send, receive, withdraw" />
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('app_assets/css/style.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body>
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>

    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Register now</h1>
            <h4>Create an account</h4>
        </div>
        <div class="section mb-5 p-2">
            <form class="register-form">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="E.g Jon" name="username">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Your e-mail" name="email">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Your Firstname" name="firstname">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="middlename">Middlename</label>
                                <input type="text" class="form-control" id="middlename" placeholder="Your Middlename" name="middlename">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Your Lastname" name="lastname">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" id="password1" autocomplete="off" placeholder="Your password" name="password">
                                <i class="eye-input" id="pass-eye1">
                                    <ion-icon id="toggler1" name="eye"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password2">Password Again</label>
                                <input type="password" class="form-control" id="password2" autocomplete="off" placeholder="Type password again" name="repassword">
                                <i class="eye-input" id="pass-eye2">
                                    <ion-icon id="toggler2" name="eye"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheckb1" name="terms">
                                <label class="form-check-label" for="customCheckb1">
                                    I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                                        conditions</a>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="form-button-group transparent">
                    <button type="submit" class="form-button btn btn-primary btn-block btn-lg">Register</button>

                    <button class="btn btn-primary btn-block btn-lg form-loading d-none" type="button" disabled>
                        <span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>
                            Loading...
                    </button>
                </div>



            </form>
        </div>

    </div>

    <div id="toast-15" class="toast-box toast-top bg-danger">
        <div class="in">
            <div class="text" id="error-message">
                ...
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
    </div>

    <div id="toast-16" class="toast-box toast-top bg-success">
        <div class="in">
            <div class="text" id="success-message">
                ...
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
    </div>

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{ asset('app_assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="{{ asset('app_assets/js/plugins/splide/splide.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('app_assets/js/base.js') }}" defer></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <script src="{{ asset('dash/js/fns.js?ref=16') }}"></script>
    <script src="{{ asset('dash/js/register.js?ref=23') }}"></script>

    <style>
        .form-group .eye-input {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #958d9e;
    height: 38px;
    font-size: 22px;
    position: absolute;
    right: -10px;
    bottom: 0;
    width: 32px;
    opacity: 0.5;
    /* display: none; */
}
    </style>

    <script>
        document.querySelector('#pass-eye1').addEventListener('click', (event) => {
            isoff = document.querySelector('#toggler1').name == 'eye' ? false : true;

            if(isoff) {
                document.querySelector("#password1").type = 'password';
                document.querySelector('#toggler1').name = 'eye'
            } else {
                document.querySelector("#password1").type = 'text';
                document.querySelector('#toggler1').name = 'eye-off'
            }
        })

        document.querySelector('#pass-eye2').addEventListener('click', (event) => {
            isoff = document.querySelector('#toggler2').name == 'eye' ? false : true;

            if(isoff) {
                document.querySelector("#password2").type = 'password';
                document.querySelector('#toggler2').name = 'eye'
            } else {
                document.querySelector("#password2").type = 'text';
                document.querySelector('#toggler2').name = 'eye-off'
            }
        })
    </script>

    </body>
</html>

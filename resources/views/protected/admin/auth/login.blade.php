
<!doctype html>
<html lang="en">
    <head>
        <title>{{ env('APP_NAME') }} | Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="theme-color" content="#000000">
        <meta name="description" content="{{ env('APP_NAME') }} | Login and start your financial freedom journey!">
        <meta name="keywords"
            content="deposit, wallet, app, money, send, receive, withdraw, invest" />
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
            <h1>Admin Authentication</h1>
            <h4>Fill in your admin secret phrase</h4>
        </div>
        <div class="section mb-5 p-2">

            <form class="login-form">
                <div class="card mt-20" style="margin-top: 50px;">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Secret Phrase</label>
                                <textarea class="form-control" id="email1" name="phrase"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-button-group  transparent mb-5">
                    <button type="submit" class="form-button btn btn-primary btn-block btn-lg">Visit Admin</button>

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
    <script src="{{ asset('dash/js/admin.login.js?ref=1') }}"></script>


    <script>
        
    </script>

    </body>
</html>

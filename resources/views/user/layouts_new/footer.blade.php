<!-- App Bottom Menu -->
<div class="appBottomMenu">
        <a href="/dashboard" class="item" id="HomeItemTab">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Dashboard</strong> 
            </div>
        </a>
        <a href="/user/transactions" class="item" id="TransactionItemTab">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Transactions</strong>
            </div>
        </a>
        <a href="/user/my/offers" class="item" id="SavingsItemTab">
            <div class="col">
                <ion-icon name="alarm-outline"></ion-icon>
                <strong>Offer</strong>
            </div>
        </a>
        <a href="/user/referrals-list" class="item" id="CardItemTab">
            <div class="col">
                <ion-icon name="people-outline"></ion-icon>
                <strong>Referrals</strong>
            </div>
        </a>
        <a href="/user/settings" class="item" id="SettingItemTab">
            <div class="col">
                <ion-icon name="settings-outline"></ion-icon>
                <strong>Settings</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->
    <script>
        let pathname = location.pathname;
        if(pathname == '/dashboard') {
            HomeItemTab.classList.add('active');
        } else if(pathname == '/user/transactions') {
            TransactionItemTab.classList.add('active');
        } else if(pathname == '/user/my/offers') {
            SavingsItemTab.classList.add('active');
        } else if(pathname == '/user/referrals-list') {
            CardItemTab.classList.add('active');
        } else if(pathname == '/user/settings') {
            SettingItemTab.classList.add('active')
        } else if(pathname.startsWith('/user/transaction')) {
            TransactionItemTab.classList.add('active')
        }
        console.log(location)
    </script>

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img src="{{$user_settings->profile_image_url ? asset($user_settings->profile_image_url) : asset('app_assets/img/sample/avatar/avatar1.png') }}" alt="image" class="imaged  w36" style="height: 36px">
                        </div>
                        <div class="in">
                            <strong>{{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}</strong>
                            <div class="text-muted">{{ $user_settings->current_kyc_leve }}</div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                    <!-- balance -->
                    <div class="sidebar-balance">
                        <div class="listview-title">Balance</div>
                        <div class="in">
                            <h1 class="amount">{{ get_currency_symbol($user_settings->currency) }}  {{ currency_conversion($user_settings->currency, ($user->deposit_balance + $user->referral_bonus + $user->currently_invested) ) }}</h1>
                        </div>
                    </div>
                    <!-- * balance -->

                    <!-- action group -->
                    <div class="action-group">
                        <a href="#" class="action-button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="add-outline"></ion-icon>
                                </div>
                                Deposit
                            </div>
                        </a>
                        <a href="#" class="action-button" data-bs-toggle="modal" data-bs-target="#withdrawalActionSheet">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="arrow-down-outline"></ion-icon>
                                </div>
                                Withdraw
                            </div>
                        </a>
                        <a href="#" class="action-button" data-bs-toggle="modal" data-bs-target="#reinvestmentActionSheet">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="refresh-outline"></ion-icon>
                                </div>
                                Re-invest
                            </div>
                        </a>
                        <a href="#" class="action-button" data-bs-toggle="modal" data-bs-target="#promoActionSheet">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="ribbon-outline"></ion-icon>
                                </div>
                                Promo
                            </div>
                        </a>
                    </div>
                    <!-- * action group -->

                    <!-- others -->
                    <div class="listview-title mt-1">Others</div>
                    <ul class="listview flush transparent no-line image-listview">
                        @if($user->is_admin)
                        <li>
                            <a href="/v1/admin/statistics" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="settings-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Admin Panel
                                </div>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="/user/crypto/wallet" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Wallets
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/user/settings" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="settings-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Settings
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="user/savings/create" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Offers
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:support@globalminnersfx.com" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Support
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/user/logout" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * others -->
                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->



    <!-- iOS Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1"><img src="{{ asset('app_assets/img/icon/192x192.png') }}" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Finapp</strong> on your iPhone's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- * iOS Add to Home Action Sheet -->


    <!-- Android Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1">
                            <img src="{{ asset('app/img/icon/192x192.png') }}" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Finapp</strong> on your Android's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Android Add to Home Action Sheet -->



    <div id="cookiesbox" class="offcanvas offcanvas-bottom cookies-box" tabindex="-1" data-bs-scroll="true"
        data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">We use cookies</h5>
        </div>
        <div class="offcanvas-body">
            <div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non lacinia quam. Nulla facilisi.
                <a href="#" class="text-secondary"><u>Learn more</u></a>
            </div>
            <div class="buttons">
                <a href="#" class="btn btn-primary btn-block" data-bs-dismiss="offcanvas">I understand</a>
            </div>
        </div>
    </div>

    <div class="gtranslate_wrapper"></div>
    <script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","flag_style":"3d","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
  

    <style>
        #chat-application, #gt_float_wrapper {
            margin-bottom: 39px !important;
        }

        #gt_float_wrapper {
            margin-bottom: 30px !important;
        }
    </style>

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

    <script>
        // Add to Home with 2 seconds delay.
        // AddtoHome("2000", "once");
    </script>

</body>
</html>
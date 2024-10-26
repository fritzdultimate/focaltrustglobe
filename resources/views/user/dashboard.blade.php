@include('user.layouts_new.header')
<style>
    /* Helpers */
    .is-hidden {
        display: none !important;
    }

    .is-desktop {
        display: block;
    }

    @media (max-width: 768px) {
        .is-mobile {
            display: block !important;
        }
    }

    .announcement {
        --base-font: inherit;
        --small-font: 0.75rem;
        --normal-font: 1rem;
        --medium-font: 1.25rem;
        --primary-color: #FA003F;
        --secondary-color: #fff;
        --base-padding: 0.5rem;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background: var(--primary-color);
        font-family: var(--base-font-dev), sans-serif;
        /* padding: var(--base-padding); */
        /* margin-top: 40px; */
    }

    /* Removes the announcement on Print */
    @media print {
        .announcement {
            display: none;
        }
    }

    .announcement .text {
        padding: 0 1rem;
        color: var(--secondary-color);
    }

    @media (max-width: 768px) {
        .announcement .text {
            padding-bottom: var(--base-padding);
        }
    }

    @media (min-width: 768px) {
        .announcement {
            flex-direction: row;
        }
    }



    .announcement #timer {
        /* font-weight: bold; */
        background: var(--secondary-color);
        color: var(--primary-color);
        padding: var(--base-padding);
        /* margin-left: 1rem; */
        width: 100%;
        text-align: center;
        border: 1px dashed var(--secondary-color);
        margin-right: 2.5rem;
        line-height: 1.3;
    }

    /* Style the close button (span) */
    .announcement .close {
        cursor: pointer;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        padding: 0;
        background: var(--secondary-color);
        color: var(--primary-color);
        height: 30px;
        width: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
    }

    @media (min-width: 769px) {
        .announcement .close {
            top: 0;
            transform: translateX(-50%);
            border-radius: 50%;
            left: inherit;
            right: 0.5rem;
            background: var(--secondary-color);
            color: var(--primary-color);
        }
    }

    .announcement .tooltip {
        position: relative;
        display: inline-block;
        color: var(--secondary-color);
        opacity: 1;
        line-height: inherit;
        font-size: inherit;
        z-index: inherit;
    }

    .announcement .tooltip .tooltiptext {
        background-color: #555;
        color: #fff;
        width: 170px;
        font-size: smaller;
        /* font-weight: bold; */
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        margin-left: -75px;
        z-index: 1;
    }
</style>
    <!-- App Capsule -->
    <div id="appCapsule">
        
        @if($highest_promo_duration_date)
            <div class="announcement">
                <span class="close">&#x2715;</span>
                <br>
                <div class="text">
                    <span class="is-deskto">
                        <strong>PROMOTION</strong>: Click on promo to enjoy massive interest
                    </span>
                </div>
                <div style="width: 100%">
                    <span id="timer" style="width: 100%" class="is-desktop"></span>
                </div>
            </div>

            <script>
                document.querySelector('.close').addEventListener('click', (e) => {
                    document.querySelector('.announcement').style.display = 'none';
                })
                // Countdown Timer
            function countDown() {
                // Set the date we're counting down to
                var countDownDate = new Date("{{ $highest_promo_duration_date }}").getTime();

                // Update the count down every 1 second
                var x = setInterval(function () {
                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor(
                        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                    );
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    document.getElementById('timer').innerHTML =
                        days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's ';

                    // If the count down is over, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById('timer').innerHTML = 'EXPIRED';
                    }
                }, 1000);
            }
            countDown();
            </script>
         @endif

        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Balance</span>
                        <h1 class="total">{{ get_currency_symbol($user_settings->currency) }} {{ currency_conversion($user_settings->currency, $user->currently_invested + $user->deposit_balance + $user->referral_bonus) }}</h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#referralActionSheet">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Deposit</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawalActionSheet">
                            <div class="icon-wrapper">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#reinvestmentActionSheet">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="refresh-outline"></ion-icon>
                            </div>
                            <strong>Re-invest</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#promoActionSheet">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="ribbon-outline"></ion-icon>
                            </div>
                            <strong>Promo</strong>
                        </a>
                    </div>

                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->

        @include('user.action-sheet')

        @if($user_settings->current_kyc_leve !== 'tier 3')
        <div class="section mt-4">
            <div class="goals">
                <!-- item -->
                <div class="item">
                    <div class="in">
                        <div>
                            <h4>Deposit limit</h4>
                            <p>Your daily limit progress</p>
                        </div>
                        <div class="price">{{ get_currency_symbol($user_settings->currency)  }} {{ currency_conversion($user_settings->currency, $today_deposits) }}</div>
                    </div>
                    <div class="progress text-center">
                        <div class="progress-bar text-center" role="progressbar" style="width: {{  ($today_deposits/($user_settings->current_kyc_leve == 'tier 1' ? ($admin_settings->daily_deposit_limit_level_1/100) : ($admin_settings->daily_deposit_limit_level_2/100))) }}%;" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"> {{  ($today_deposits/($user_settings->current_kyc_leve == 'tier 1' ? ($admin_settings->daily_deposit_limit_level_1/100) : ($admin_settings->daily_deposit_limit_level_2/100))) }}%</div>
                    </div>
                </div>
                <!-- * item -->

                <!-- item -->
                <div class="item">
                    <div class="in">
                        <div>
                            <h4>Withdrawal limit</h4>
                            <p>Your daily limit progress</p>
                        </div>
                        <div class="price">{{ get_currency_symbol($user_settings->currency)  }} {{ currency_conversion($user_settings->currency, $user->today_withdrawals) }}</div>
                    </div>
                    <div class="progress text-center">
                        <div class="progress-bar text-center" role="progressbar" style="width: {{  ($user->today_withdrawals/($user_settings->current_kyc_leve == 'tier 1' ? ($admin_settings->daily_withdrawal_limit_level_1/100) : ($admin_settings->daily_withdrawal_limit_level_2/100))) }}%;" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"> {{  ($user->today_withdrawals/($user_settings->current_kyc_leve == 'tier 1' ? ($admin_settings->daily_withdrawal_limit_level_1/100) : ($admin_settings->daily_withdrawal_limit_level_2/100))) }}%</div>
                    </div>
                </div>
                <!-- * item -->
            </div>
        </div>
        @endif

        @include('user.stats')

        @include('user.transaction-list')



        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                Copyright © {{ env('SITE_NAME') }} {{ date('Y') }}. All Rights Reserved.
            </div>
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->
@include('user.layouts_new.general-scripts')
<script src="{{ asset('dash/js/transactions.js?ref=1') }}"></script>
@include('user.layouts_new.footer')

<!-- Stats -->
<div class="section">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="stat-box">
                        <div class="title">Account balance <small><strong style="font-weight: bold; color:">(withdrawable)</strong></small> </div>
                        <div class="value text-success">{{ get_currency_symbol($user_settings->currency) }} {{ currency_conversion($user_settings->currency, $user->deposit_balance) }}</div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="stat-box">
                        <div class="title">Invested Funds <small><strong style="font-weight: bold; color:">(unwithdrawable)</strong></small></div>
                        <div class="value text-warning">{{ get_currency_symbol($user_settings->currency) }} {{ currency_conversion($user_settings->currency, $user->currently_invested) }}</div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="stat-box">
                        <div class="title">Referral Bonus <small><strong style="font-weight: bold; color:">(withdrawable)</strong></small></div>
                        <div class="value text-success">{{ get_currency_symbol($user_settings->currency) }} {{ currency_conversion($user_settings->currency, $user->referral_bonus) }}</div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="stat-box">
                        <div class="title">Total Withdrawn</div>
                        <div class="value text-danger">{{ get_currency_symbol($user_settings->currency) }} {{ currency_conversion($user_settings->currency, $user->total_withdrawn) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->
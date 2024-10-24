    @include('user.dialogbox.error-modal')
    @include('user.dialogbox.success-modal')
    @include('user.dialogbox.iconed-button-inline')
    @include('user.dialogbox.enter-pin-dialogbox')
        <!-- Referral Action Sheet -->
        <div class="modal fade action-sheet" id="referralActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Referral Details</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <label class="label">Referral Code</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder=""
                                            value="{{ 'https://fortressminers.com/register?ref=' .  $user->name}}" id="accountNumberInput">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Total Member referred</label>
                                    <div class="input-group mb-2">
                                        {{ $total_referred }}
                                    </div>
                                </div>


                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                        data-bs-dismiss="modalv" id="copyAccountNumberBtn">Copy Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Referral Action Sheet -->

        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Deposit</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content" id="modalContentSavings">
                            <form class="deposit-form">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2d">Plan</label>
                                        <select class="form-control custom-select" id="account2d" name="child_plan_id">
                                            <option>Choose wallet</option>
                                            @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ ucfirst($plan->name) }} ({{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $plan->minimum_amount) }} - {{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $plan->maximum_amount) }}) </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2d">Wallet</label>
                                        <select class="form-control custom-select" id="account2d" name="user_wallet_id">
                                            <option>Choose wallet</option>
                                            @foreach($wallets as $wallet)
                                                <option class="plan_investment_wrapper" value="{{ $wallet->id }}" data-symbol="{{ $wallet->admin_wallet->currency_symbol }}" data-wallet="{{ $wallet->id }}">{{ ucfirst($wallet->admin_wallet->currency) }} ({{ substr($wallet->admin_wallet->currency_address, 0, 12) }}......{{ substr($wallet->admin_wallet->currency_address, -10, 10) }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addonb1">{{ get_currency_symbol($user_settings->currency) }}</span>
                                        <input type="text" class="form-control" placeholder="Enter an amount" name="amount">
                                    </div>

                                    <div class="form-group basic">
                                    <label class="label">Transaction Pin <small style="font-size: 6px;">(4 digits)</small></label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control"
                                         name="pin">
                                    </div>
                                </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg deposit-btn form-button">Deposit</button>

                                    <button class="btn btn-primary btn-block btn-lg form-loading d-none" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>
                                         Loading...
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center" style="padding: 10px; margin-bottom: 5px; display:none" id="createSavingsGoalPan">
                            <p>You have not created any wallet</p>
                            
                            <div class="form-group basic">
                                <a href="/user/crypto/wallet" class="btn btn-primary btn-block btn-lg">Create wallet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Deposit Action Sheet -->

        <!-- Withdrawal Action Sheet -->
        <div class="modal fade action-sheet" id="withdrawalActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Withdraw money</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form class="withdrawal-form">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2">Currency</label>
                                        <select class="form-control custom-select" id="account2" name="user_wallet_id">
                                            <option> Choose wallet </option>
                                            @foreach($wallets as $wallet)
                                                <option value="{{ $wallet->id }}">{{ ucfirst($wallet->admin_wallet->currency) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2">Withdraw from</label>
                                        <select class="form-control custom-select" id="account2" name="asset">
                                            <option> Choose Asset </option>
                                            <option value="deposit_balance">Account balance</option>
                                            <option value="referral_bonus">Referral bonus</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="text11">To</label>
                                        <input type="text" class="form-control" id="text11"
                                            placeholder="Wallet address" name="account_number">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div> -->

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">{{ get_currency_symbol($user_settings->currency) }}</span>
                                        <input type="number" class="form-control" placeholder="0.00"
                                         name="amount">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Note (optional)</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control"
                                         name="note">
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <label class="label">Transaction Pin</label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control"
                                         name="pin">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg send-btn form-button withdrawal-btn"
                                    value="submit">Withdraw</button>


                                    <button class="btn btn-primary btn-block btn-lg form-loading d-none" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>
                                         Loading...
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Withdrawal Action Sheet -->

        <!-- Reinvestment Action Sheet -->

        <div class="modal fade action-sheet" id="reinvestmentActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Re-invest money</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content" id="modalContentSavings">
                            <form class="reinvest-form">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2d">Plan</label>
                                        <select class="form-control custom-select" id="account2d" name="child_plan_id">
                                            <option>Choose wallet</option>
                                            @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ ucfirst($plan->name) }} ({{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $plan->minimum_amount) }} - {{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $plan->maximum_amount) }}) </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2d">Wallet</label>
                                        <select class="form-control custom-select" id="account2d" name="user_wallet_id">
                                            <option>Choose wallet</option>
                                            @foreach($wallets as $wallet)
                                                <option value="{{ $wallet->id }}">{{ ucfirst($wallet->admin_wallet->currency) }} ({{ substr($wallet->admin_wallet->currency_address, 0, 12) }}......{{ substr($wallet->admin_wallet->currency_address, -10, 10) }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addonb1">{{ get_currency_symbol($user_settings->currency) }}</span>
                                        <input type="text" class="form-control" placeholder="Enter an amount" name="amount">
                                    </div>

                                    <div class="form-group basic">
                                    <label class="label">Transaction Pin <small style="font-size: 6px;">(4 digits)</small></label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control"
                                         name="pin">
                                    </div>
                                </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg create-savings-btn form-button reinvest-btn">Re-invest</button>

                                    <button class="btn btn-primary btn-block btn-lg form-loading d-none" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>
                                         Loading...
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center" style="padding: 10px; margin-bottom: 5px; display:none" id="createSavingsGoalPan">
                            <p>You have not created any wallet</p>
                            
                            <div class="form-group basic">
                                <a href="/user/crypto/wallet" class="btn btn-primary btn-block btn-lg">Create wallet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- * Reinvestment Action Sheet -->

        <!-- Promo Action Sheet -->
        <div class="modal fade action-sheet" id="promoActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Special Offer</h5>
                    </div>
                    <div class="modal-body">
                        @if($user->on_promo)
                        <div class="action-sheet-content" id="modalContentSavings">
                            <form class="promotion-form">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2d">Plan</label>
                                        <select class="form-control custom-select" id="account2d" name="child_plan_id">
                                            <option>Choose plan</option>
                                            @foreach($promotion_plans as $plan)
                                            <option value="{{ $plan->id }}">{{ ucfirst($plan->name) }} ({{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $plan->minimum_amount) }} - {{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $plan->maximum_amount) }}) </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2d">Wallet</label>
                                        <select class="form-control custom-select" id="account2d" name="user_wallet_id">
                                            <option>Choose wallet</option>
                                            @foreach($wallets as $wallet)
                                                <option value="{{ $wallet->id }}">{{ ucfirst($wallet->admin_wallet->currency) }} ({{ substr($wallet->admin_wallet->currency_address, 0, 12) }}......{{ substr($wallet->admin_wallet->currency_address, -10, 10) }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addonb1">{{ get_currency_symbol($user_settings->currency) }}</span>
                                        <input type="text" class="form-control" placeholder="Enter an amount" name="amount">
                                    </div>

                                    <div class="form-group basic">
                                    <label class="label">Transaction Pin <small style="font-size: 6px;">(4 digits)</small></label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control"
                                         name="pin">
                                    </div>
                                </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg promotion-btn form-button">Deposit</button>

                                    <button class="btn btn-primary btn-block btn-lg form-loading d-none" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>
                                         Loading...
                                    </button>
                                </div>
                            </form>
                        </div>
                        @else
                        <div class="text-center" style="padding: 10px; margin-bottom: 5px;" id="createSavingsGoalPan">
                            <p>You do not have any offer yet!</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- * Promo Action Sheet -->

        <div id="toast-15" class="toast-box toast-top bg-success">
            <div class="in">
                <div class="text" id="toast-content">
                    Text copied
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
        </div>

        <!-- <script src="{{ asset('dash/js/deposit.js') }}"></script> -->

        <script>
            copyAccountNumberBtn.addEventListener('click', (e) => {
                let copyText = document.getElementById("accountNumberInput");

                copyText.select();
                copyText.setSelectionRange(0, 99999);

                navigator.clipboard.writeText(copyText.value);
                document.querySelector('#toast-content').innerHTML = 'Referral link copied!';
                toastbox('toast-15')
            })
        </script>
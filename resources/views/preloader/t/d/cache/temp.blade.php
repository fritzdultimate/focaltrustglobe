
@include('user.layouts_new.header')
<style>
    .copy-btn:hover {
        /* background: blue; */
        color: blue;
        /* border-radius: 50px; */
    }
</style>
<!-- App Header -->
<div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Transaction Details
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" class="full-height">

        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="">
                        <iconify-icon style="font-size: 40px; margin-right: 8px;" icon="cryptocurrency-color:{{ $transaction->wallet->admin_wallet->currency_symbol }}"></iconify-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">{{ ucfirst($transaction->type) }} Details</h3>
                <br>
                <div>
                    <h4 class="text-center" style="color: #7c7981;">Amount</h4>
                    <div class="text-center" style="color: #37343c;"><span style="font-size: 32px; font-weight: bold;" id="main-crypto-rate">fetching... price</span><small style="font-weight: 700;" id="main-crypto-symbol"></small></div>
                </div>
                @if($transaction->type == 'deposit' && $transaction->status == 'pending')
                    <div class="text-center text-warning">
                        <ion-icon class="font-size: 20px" fill="text-warning" name="time-outline"></ion-icon>
                        <span>{{ $transaction->status }}</span>
                    </div>
                @elseif($transaction->type == 'deposit' && $transaction->status == 'accepted')
                    <div class="text-center text-success">
                        <ion-icon class="font-size: 20px" name="checkmark-outline"></ion-icon>
                        <span>{{ $transaction->status }}</span>
                    </div>
                @endif
                <br>
                @if($transaction->type == 'deposit' && $transaction->status == 'pending')
                    <div class="alert alert-danger mb-1" role="alert">
                        Copy the <span style="font-weight:bolder">"To"</span> wallet address, and deposit exactly the <span style="font-weight:bolder">"Input Value"</span> as indicated below:
                    </div>
                @endif
                @if($transaction->type == 'withdrawal' && $transaction->status !== 'denied')
                    <div class="text-center">
                        <a href="mailto:support@focaltrustglobe.org" class="text-warning text-center" style="font-size: 13px;">Why hasn't my withdrawal arrived?</a>
                    </div>
                @endif
                @if($transaction->type == 'deposit' && $transaction->status == 'pending')
                    <div class="text-center">
                        <a href="mailto:support@focaltrustglobe.org" class="text-warning" style="font-size: 13px;">Why hasn't my deposit confirmed?</a>
                    </div>
                @endif
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Status</strong>
                    <span class="text-{{ $transaction->status == 'pending' ? 'warning' : ($transaction->status == 'accepted' ? 'success' : 'danger')}}">{{ $transaction->status }}</span>
                </li>
                <li>
                    <strong>Input Value</strong>
                    <h3 class="m-0 currency-price" data-amount="{{ currency_conversion_no_format($user_settings->currency, $transaction->amount, 'USD') }}" data-symbol="{{ $transaction->wallet->admin_wallet->currency_symbol }}">fetching... price</h3>
                </li>
                <li>
                    <strong>From</strong>
                    @if($transaction->type == 'withdrawal')
                        <span>
                            <span style="font-size: 10px">
                                {{ substr($transaction->wallet->admin_wallet->currency_address, 0, 14). '.....' . substr($transaction->wallet->admin_wallet->currency_address, -14, 14) }} 
                            </span>
                            <ion-icon data-copy-name="Wallet address" data-copy-text="{{ $transaction->wallet->admin_wallet->currency_address }}" class="font-size: 20px" name="copy-outline"></ion-icon>
                        </span>
                    @else
                        <span>{{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}</span>
                    @endif
                </li>
                <li>
                    <strong>To</strong>
                    @if($transaction->type == 'withdrawal')
                        <span>{{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}</span>
                    @else
                        <span>
                            <span style="font-size: 10px">
                                {{ substr($transaction->wallet->admin_wallet->currency_address, 0, 14). '.....' . substr($transaction->wallet->admin_wallet->currency_address, -14, 14) }} 
                            </span>
                            <ion-icon data-copy-name="Wallet address" data-copy-text="{{ $transaction->wallet->admin_wallet->currency_address }}" class="copy-btn" name="copy-outline"></ion-icon>
                        </span>
                    @endif
                </li>
                <li>
                    <strong>Hash</strong>
                    <span><span style="font-size: 10px"> {{ substr($transaction->transaction_hash, 15, 4). '-' . substr($transaction->transaction_hash, -20, 4) }}</span> <ion-icon data-copy-name="Hash" data-copy-text="{{ substr($transaction->transaction_hash, 15, 4). '-' . substr($transaction->transaction_hash, -20, 4) }}" class="copy-btn" name="copy-outline"></ion-icon></span>
                </li>
                <li>
                    <strong>Transaction Hash</strong>
                    <span><span style="font-size: 10px"> {{ substr($transaction->transaction_hash, 0, 12) . "........" . substr($transaction->transaction_hash, -10, 10) }}</span> <ion-icon data-copy-name="Transaction hash" data-copy-text="{{ $transaction->transaction_hash }}" class="copy-btn" name="copy-outline"></ion-icon></span>
                </li>
                <li>
                    <strong>Age</strong>
                    <span class="transaction-age" data-date="{{ $transaction->created_at }}" style="font-size: 13px; font-weight: bold">calculating age...</span>
                </li>
                <li>
                    <strong>Output</strong>
                    <span>{{ $transaction->status !== 'accepted' ? 0 : rand(2, 6) }}</span>
                </li>
                <li>
                    <strong>Block Confirmation</strong>
                    <span>{{ $transaction->status !== 'accepted' ? 0 : rand(2,3) }}</span>
                </li>
                <li>
                    <strong>Block ID</strong>
                    <span>{{ number_format($transaction->id * 111, 0) }}</span>
                </li>
                <li>
                    <strong>Position</strong>
                    <span>{{ number_format($transaction->id * 15, 0) }}</span>
                </li>
                <li>
                    <strong>Witness</strong>
                    <span>Yes</span>
                </li>
                <li>
                    <strong>RBF</strong>
                    <span>Yes</span>
                </li>
                <li>
                    <strong>Coinbase</strong>
                    <span>No</span>
                </li>
                <li>
                    <strong>Locktime</strong>
                    <span>0</span>
                </li>
                <li>
                    <strong>Version</strong>
                    <span>1</span>
                </li>
                <li>
                    <strong>Fee</strong>
                    <h3 class="m-0">{{ get_currency_symbol($user_settings->currency)  }}0.00</h3>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0 transaction-amount">{{ get_currency_symbol($user_settings->currency)  }}  {{ currency_conversion($user_settings->currency, $transaction->amount) }}</h3>
                </li>
                <li>
                    <strong>Date</strong>
                    <span>{{ date_format(date_create($transaction->created_at), 'M d, Y H:i A') }}</span>
                </li>
            </ul>


        </div>

        <div id="toast-15" class="toast-box toast-top bg-success">
            <div class="in">
                <div class="text" id="copied-message">
                    Text copied
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
        </div>
    </div>
    <!-- * App Capsule -->
@include('user.layouts_new.general-scripts')
@include('user.layouts_new.footer')
<script>
    [...document.querySelectorAll('.copy-btn')].forEach((e) => {
        e.addEventListener('click', (el) => {
            // e.classList.replace()
            e.name = 'checkmark-outline';
            e.style.color = 'blue';

            // Copy the text
            navigator.clipboard.writeText(e.dataset.copyText);
            document.getElementById("copied-message").innerHTML = e.dataset.copyName + '  copied to clipboard!';
            toastbox('toast-15')
            setTimeout(()=>{
                e.name = 'copy-outline';
                e.style.color = 'black';
            }, 1000)
        })
    })

    async function fetchCurrencyRate() {
        let rate_el = document.querySelector('.currency-price');
        let selectedWalletRate = await tocrypto(rate_el.dataset.symbol);
        totalAmount = selectedWalletRate * rate_el.dataset.amount;

        rate_el.innerHTML = totalAmount.toFixed(9) + " " + rate_el.dataset.symbol.toUpperCase();

        document.querySelector("#main-crypto-rate").innerHTML = totalAmount.toFixed(6);
        document.querySelector("#main-crypto-symbol").innerHTML = rate_el.dataset.symbol.toUpperCase();
    }

    let transaction_date_el = document.querySelector('.transaction-age');
    let created_at = new Date(transaction_date_el.dataset.date);
    console.log(transaction_date_el.dataset.date)

    setInterval(()=> {
        let now = new Date();
        let date_diff = now - created_at.getTime();
        let new_date = new Date(date_diff);
        let secs = Math.abs(Math.floor(date_diff / 1000));
        let mins = Math.abs(Math.floor(secs / 60));
        let hour = Math.abs(Math.floor(mins / 60));

        let time = '';
        if(Math.floor((((date_diff/1000)/60)/60)/24) > 0) {
            let s_var = Math.floor((((date_diff/1000)/60)/60)/24) > 1 ? 'days' : 'day';
            time = `${Math.floor((((date_diff/1000)/60)/60)/24)} ${s_var}`;
        } else if(Math.floor(((date_diff/1000)/60)/60) > 0) {
            time = ` ${Math.floor(((date_diff/1000)/60)/60)}hr ${new_date.getMinutes()}m ${new_date.getSeconds()}s`;
        } else if(new_date.getMinutes() > 0 && (Math.floor(((date_diff/1000)/60)/60) == 0)) {
            time = `${new_date.getMinutes()}m ${new_date.getSeconds()}s`
        } else {
            time = `${new_date.getSeconds()}s`
        }

        document.querySelector('.transaction-age').innerHTML = time;
    }, 1000)

    window.addEventListener('load', () => {
        fetchCurrencyRate();
    })
</script>
